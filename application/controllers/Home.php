<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('meta_model');
    $this->load->model('products_model');
    $this->load->model('galery_model');
    $this->load->model('category_products_model');
  }
  public function index()
  {
    $meta                     = $this->meta_model->get_meta();
    $minigold                 = $this->products_model->product_minigold();
    $antam                    = $this->products_model->product_antam();
    $slider                   = $this->galery_model->slider();
    $kota                     = $this->category_products_model->kota_home();

    $data = array(
      'title'                 => $meta->title . ' - ' . $meta->tagline,
      'keywords'              => $meta->title . ' - ' . $meta->tagline . ',' . $meta->keywords,
      'deskripsi'             => $meta->description,
      'minigold'              => $minigold,
      'antam'                 => $antam,
      'slider'                =>  $slider,
      'kota'                  => $kota,
      'content'               => 'front/home/index_home'
    );
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
}
