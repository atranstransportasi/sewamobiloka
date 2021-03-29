<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('berita_model');
    $this->load->model('category_products_model');
    $this->load->model('meta_model');
  }
  public function index()
  {
    $meta                     = $this->meta_model->get_meta();
    $category                 = $this->category_products_model->get_category_products();
    // End Listing Berita dengan paginasi
    $data = array(
      'title'                 => 'Berita - ' . $meta->title,
      'deskripsi'             => 'Berita - ' . $meta->description,
      'keywords'              => 'Berita - ' . $meta->keywords,
      'category'              => $category,
      'content'               => 'front/category/index_category'
    );
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
}
