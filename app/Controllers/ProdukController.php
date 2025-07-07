<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProdukController extends BaseController
{
    protected $product; 

    function __construct()
    {
        $this->product = new ProductModel();
    }

    public function index()
    {
        $product = $this->product->findAll();
        $data['product'] = $product;

        return view('v_produk', $data);
    }
    public function soldProduk()
    {
        $sold_produk = $this->product->getSoldProducts();
        $data['sold_produk'] = $sold_produk;
        return view('sold_produk', $data);
    }
    public function create()
{
    $dataFoto = $this->request->getFile('foto');

    $dataForm = [
        'nama' => $this->request->getPost('nama'),
        'harga' => $this->request->getPost('harga'),
        'jumlah' => $this->request->getPost('jumlah'),
        'created_at' => date("Y-m-d H:i:s")
    ];

    if ($dataFoto->isValid()) {
        $fileName = $dataFoto->getRandomName();
        $dataForm['foto'] = $fileName;
        $dataFoto->move('img/', $fileName);
    }

    $this->product->insert($dataForm);

    return redirect('produk')->with('success', 'Data Berhasil Ditambah');
} 

public function edit($id)
{
    $dataProduk = $this->product->find($id);

    $dataForm = [
        'nama' => $this->request->getPost('nama'),
        'harga' => $this->request->getPost('harga'),
        'jumlah' => $this->request->getPost('jumlah'),
        'updated_at' => date("Y-m-d H:i:s")
    ];

    if ($this->request->getPost('check') == 1) {
        if ($dataProduk['foto'] != '' and file_exists("img/" . $dataProduk['foto'] . "")) {
            unlink("img/" . $dataProduk['foto']);
        }

        $dataFoto = $this->request->getFile('foto');

        if ($dataFoto->isValid()) {
            $fileName = $dataFoto->getRandomName();
            $dataFoto->move('img/', $fileName);
            $dataForm['foto'] = $fileName;
        }
    }

    $this->product->update($id, $dataForm);

    return redirect('produk')->with('success', 'Data Berhasil Diubah');
}

public function delete($id)
{
    $dataProduk = $this->product->find($id);

    if ($dataProduk['foto'] != '' and file_exists("img/" . $dataProduk['foto'] . "")) {
        unlink("img/" . $dataProduk['foto']);
    }

    $this->product->delete($id);

    return redirect('produk')->with('success', 'Data Berhasil Dihapus');
}

public function download()
{
		//get data from database
    $product = $this->product->findAll();

		//pass data to file view
    $html = view('v_produkPDF', ['product' => $product]);

		//set the pdf filename
    $filename = date('y-m-d-H-i-s') . '-produk';

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();

    // load HTML content (file view)
    $dompdf->loadHtml($html);

    // (optional) setup the paper size and orientation
    $dompdf->setPaper('A4', 'potrait');

    // render html as PDF
    $dompdf->render();

    // output the generated pdf
    $dompdf->stream($filename);
}

public function category()
{
    $category = $this->request->getGet('category');
    $role = session()->get('role');

    if ($category) {
        $product = $this->product
            ->where('LOWER(category)', strtolower($category))
            ->findAll();
    } else {
        $product = $this->product->findAll();
    }

    $data = [
        'product' => $product,
        'selectedCategory' => $category ?? '',
        'role' => $role,
    ];

    // Tampilkan view berdasarkan peran user
    if ($role === 'guest') {
        return view('v_homeUser', $data);
    } else {
        return view('v_home', $data);
    }
}


public function search()
{
    $keyword = $this->request->getGet('keyword');
    $role = session()->get('role');

    if ($keyword) {
        $product = $this->product
            ->like('nama', $keyword)
            ->findAll();
    } else {
        $product = $this->product->findAll();
    }

    $data = [
        'product' => $product,
        'selectedCategory' => '', // kosongkan filter category
        'role' => $role,
        'searchKeyword' => $keyword,
    ];

    // Tampilkan ke view yang sesuai role
    if ($role === 'guest') {
        return view('v_homeUser', $data);
    } else {
        return view('v_home', $data);
    }
}

}