<?php

namespace App\Controllers;

// use App\Models\Product_model;


class Main extends BaseController
{
    // protected $ProductModel;

    // public function __construct()
    // {
    //     $this->ProductModel = new Product_model();
    // }

    public function index()
    {
        // $data = [
        //     'data_reviews' => $this->ReviewModel->findAll(),
        //     'set' => $this->Set_dashboardModel->find(1)
        // ];

        return view('Pages/User/home');
    }

    public function tanaman()
    {
        $data = [
            // 'data_products' => $this->ProductModel->findAll(),
            // 'set' => $this->Set_dashboardModel->find(1)
        ];

        return view('Pages/User/tanaman', $data);
    }

    public function article()
    {
        // $data = [
        //     'data_products' => $this->ProductModel->findAll(),
        //     'set' => $this->Set_dashboardModel->find(1)
        // ];

        return view('Pages/User/article');
    }

    public function cara()
    {
        // $data = [
        //     'data_products' => $this->ProductModel->findAll(),
        //     'set' => $this->Set_dashboardModel->find(1)
        // ];

        return view('Pages/User/cara');
    }
}
