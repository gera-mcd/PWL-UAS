<?php

namespace App\Controllers;

use App\Models\ProductModel; 

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
}
