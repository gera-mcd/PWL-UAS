<?php

namespace App\Controllers;

use App\Models\ProductModel; 
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;

class Home extends BaseController
{    
    protected $product;

    public function __construct()
    {
        $this->product = new ProductModel();
    }
    
    public function index()
    {
        $role = session()->get('role');
        $category = $this->request->getGet('category');
        $productModel = new ProductModel();

       if ($role === 'admin') {
            if ($category) {
                $products = $productModel->where('category', $category)->findAll();
            } else {
                $products = $productModel->findAll();
            }
            return view('v_home', ['product' => $products, 'selectedCategory' => $category]);
        } else {
            if ($category) {
                $products = $productModel->where('category', $category)->findAll();
            } else {
                $products = $productModel->findAll();
            }
            return view('v_homeUser', ['product' => $products, 'selectedCategory' => $category]);
        }
    }

public function infoPesanan()
    {
        helper('number');
        $username = session()->get('username');
        $transactionModel = new TransactionModel();
        $transactionDetailModel = new TransactionDetailModel();

        $buy = $transactionModel->where('username', $username)->findAll();

        $product = [];
        foreach ($buy as $transaction) {
            $builder = $transactionDetailModel->builder();
            $builder->select('transaction_detail.*, product.nama, product.harga, product.foto');
            $builder->join('product', 'product.id = transaction_detail.product_id');
            $builder->where('transaction_detail.transaction_id', $transaction['id']);
            $product[$transaction['id']] = $builder->get()->getResultArray();
        }

        return view('v_infopesanan', [
            'username' => $username,
            'buy' => $buy,
            'product' => $product
        ]);
    }

}
