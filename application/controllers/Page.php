<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
    //main page - home page
    public function index()
    {
        $data = [
            'title'     => 'Page',
            'deskripsi' => 'Page',
            'keywords'  => 'Page',
            'content'   => 'front/page/index_page'
        ];
        $this->load->view('front/layout/wrapp', $data, FALSE);
    }
    public function cara_order()
    {
        $data = [
            'title'     => 'Cara Order',
            'deskripsi' => 'Cara Order',
            'keywords'  => 'Cara Order',
            'content'   => 'front/page/order_page'
        ];
        $this->load->view('front/layout/wrapp', $data, FALSE);
    }
    public function syarat_ketentuan()
    {
        $data = [
            'title'     => 'Syarat dan Ketentuan Sewa',
            'deskripsi' => 'Syarat dan Ketentuan Sewa',
            'keywords'  => 'Reseller',
            'content'   => 'front/page/syarat_ketentuan'
        ];
        $this->load->view('front/layout/wrapp', $data, FALSE);
    }
}
