<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TransaksiController extends BaseController
{
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
}
