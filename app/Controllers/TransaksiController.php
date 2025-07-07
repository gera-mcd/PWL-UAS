<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use GuzzleHttp\Client;
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;


class TransaksiController extends BaseController
{
    protected $cart;
    protected $client;
    protected $apiKey;
    protected $transaction;
    protected $transaction_detail;

    function __construct()
    {
        helper('number');
        helper('form');
        $this->cart = \Config\Services::cart();
        $this->client = new \GuzzleHttp\Client();
        $this->apiKey = env('COST_KEY');
        $this->transaction = new TransactionModel();
        $this->transaction_detail = new TransactionDetailModel();
    }
    public function index()
    {
        $session = session();
        $keranjang = $session->get('cart') ?? [];
        $data['keranjang'] = $keranjang;
        return view('v_keranjang', $data);
    }

    public function addToCart($productId)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }

        $session = session();
        $cart = $session->get('cart') ?? [];

        if (isset($cart[$productId])) {
            $cart[$productId]['jumlah'] += 1;
        } else {
            $cart[$productId] = [
                'id' => $product['id'],
                'nama' => $product['nama'],
                'harga' => $product['harga'],
                'foto' => $product['foto'],
                'jumlah' => 1,
                'weight' => $product['weight'] ?? 0,
            ];
        }

        $session->set('cart', $cart);

        return redirect()->to('/keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }
    public function update()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        $jumlah = $this->request->getPost('jumlah');

        if ($jumlah && is_array($jumlah)) {
            foreach ($jumlah as $productId => $qty) {
                if (isset($cart[$productId])) {
                    $cart[$productId]['jumlah'] = max(1, (int)$qty);
                }
            }
        }

        $session->set('cart', $cart);

        return redirect()->to('/keranjang')->with('success', 'Keranjang berhasil diperbarui');
    }

    public function remove($productId)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            $session->set('cart', $cart);
        }

        return redirect()->to('/keranjang')->with('success', 'Produk berhasil dihapus dari keranjang');
    }

    public function clear()
    {
        $session = session();
        $session->remove('cart');

        return redirect()->to('/keranjang')->with('success', 'Keranjang berhasil dikosongkan');
    }
    public function checkout()
    {
        helper('number');
        $session = session();
        $cart = $session->get('cart') ?? [];

        $items = [];
        $total = 0;
        $totalWeight = 0;

        foreach ($cart as $item) {
            $items[] = [
                'id' => $item['id'] ?? null,
                'name' => $item['nama'],
                'price' => $item['harga'],
                'qty' => $item['jumlah'],
                'weight' => $item['weight'] ?? 0,
                'options' => [
                    'foto' => $item['foto'] ?? null
                ]
            ];
            $total += $item['harga'] * $item['jumlah'];
            $totalWeight += ($item['weight'] ?? 0) * $item['jumlah'];
        }

        $data['items'] = $items;
        $data['total'] = $total;
        $data['totalWeight'] = $totalWeight;

        return view('v_checkout', $data);
    }
    public function getLocation()
{
		//keyword pencarian yang dikirimkan dari halaman checkout
    $search = $this->request->getGet('search');

    $response = $this->client->request(
        'GET', 
        'https://rajaongkir.komerce.id/api/v1/destination/domestic-destination?search='.$search.'&limit=50', [
            'headers' => [
                'accept' => 'application/json',
                'key' => $this->apiKey,
            ],
        ]
    );

    $body = json_decode($response->getBody(), true); 
    return $this->response->setJSON($body['data']);
}


    public function getCost()
    {
        try {
            $destination = $this->request->getGet('destination');
            $weight = $this->request->getGet('weight') ?? 1000;

            if (!$destination || !$weight) {
                return $this->response->setStatusCode(400)->setJSON(['error' => 'Parameter tidak lengkap']);
            }

            $response = $this->client->request(
                'POST',
                'https://rajaongkir.komerce.id/api/v1/calculate/domestic-cost',
                [
                    'multipart' => [
                        ['name' => 'origin', 'contents' => '58931'],
                        ['name' => 'destination', 'contents' => $destination],
                        ['name' => 'weight', 'contents' => $weight],
                        ['name' => 'courier', 'contents' => 'jnt:jne:lion:sicepat:ninja']
                    ],
                    'headers' => [
                        'accept' => 'application/json',
                        'key' => $this->apiKey
                    ]
                ]
            );

            $body = json_decode($response->getBody(), true);

            if (!isset($body['data'])) {
                return $this->response->setStatusCode(500)->setJSON([
                    'error' => 'Data tidak ditemukan',
                    'response' => $body
                ]);
            }

            return $this->response->setJSON($body['data']);
        } catch (\Throwable $e) {
            return $this->response->setStatusCode(500)->setJSON([
                'error' => $e->getMessage()
            ]);
        }
    }
    public function buy()
    {
        if ($this->request->getPost()) {
            $dataForm = [
                'username' => $this->request->getPost('username'),
                'total_harga' => $this->request->getPost('total_harga'),
                'alamat' => $this->request->getPost('alamat'),
                'ongkir' => $this->request->getPost('ongkir'),
                'status' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];

            $this->transaction->insert($dataForm);

            $last_insert_id = $this->transaction->getInsertID();

            $session = session();
            $cart = $session->get('cart') ?? [];

            foreach ($cart as $value) {
                $dataFormDetail = [
                    'transaction_id' => $last_insert_id,
                    'product_id' => $value['id'],
                    'jumlah' => $value['jumlah'],
                    'diskon' => 0,
                    'subtotal_harga' => $value['jumlah'] * $value['harga'],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ];

                $this->transaction_detail->insert($dataFormDetail);
            }

            $session->remove('cart');

            return redirect()->to(base_url());
        }
    }
}

