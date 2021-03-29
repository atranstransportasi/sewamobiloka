<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kota extends CI_Controller
{
    //load data
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_products_model');
    }
    //Index Category
    public function index()
    {
        $category_products                  = $this->category_products_model->get_category_products();
        //Validasi

        $data = [
            'title'                         => 'Kota',
            'category_products'             => $category_products,
            'content'                       => 'front/kota/index_kota'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }
}
