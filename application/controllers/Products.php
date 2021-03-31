
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->library('pagination');
    $this->load->model('meta_model');
    $this->load->model('products_model');
    $this->load->model('pengaturan_model');
    $this->load->model('transaksi_model');
    $this->load->model('category_products_model');
    $this->load->helper('string'); //Memanggil Helper String
  }
  //main page - Berita
  public function index()
  {
    $meta                               = $this->meta_model->get_meta();
    $config['base_url']                 = base_url('admin/products/index/');
    $config['total_rows']               = count($this->products_model->total_row());
    $config['per_page']                 = 6;
    $config['uri_segment']              = 4;
    //Membuat Style pagination untuk BootStrap v4
    $config['first_link']               = 'First';
    $config['last_link']                = 'Last';
    $config['next_link']                = 'Next';
    $config['prev_link']                = 'Prev';
    $config['full_tag_open']            = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']           = '</ul></nav></div>';
    $config['num_tag_open']             = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']            = '</span></li>';
    $config['cur_tag_open']             = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']            = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']            = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']          = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']            = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']          = '</span>Next</li>';
    $config['first_tag_open']           = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close']         = '</span></li>';
    $config['last_tag_open']            = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']          = '</span></li>';
    //Limit dan Start
    $limit                              = $config['per_page'];
    $start                              = ($this->uri->segment(4)) ? ($this->uri->segment(4)) : 0;
    //End Limit Start
    $this->pagination->initialize($config);
    $products = $this->products_model->get_products($limit, $start);
    $listcategory_products = $this->category_products_model->get_category_products();
    // End Listing Product dengan paginasi
    $data = array(
      'title'                           => 'Produk',
      'deskripsi'                       => 'Produk' . $meta->description,
      'keywords'                        => 'Produk' . $meta->keywords,
      'products'                        => $products,
      'listcategory_products'           => $listcategory_products,
      'pagination'                      => $this->pagination->create_links(),
      'content'                         => 'front/product/index_product'
    );
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
  // Produk - Category
  public function category_products($id)
  {
    $category_products                  = $this->category_products_model->read($id);
    $category_product_id                = $category_products->id;
    $listcategory_products              = $this->category_products_model->get_category_products();
    // Listing Berita Dengan Pagination
    $this->load->library('pagination');
    $config['base_url']                 = base_url('products/category_products/' . $id . '/index/');
    $config['total_rows']               = count($this->products_model->total_category_products($category_product_id));
    $config['per_page']                 = 6;
    $config['uri_segment']              = 5;
    //Membuat Style pagination untuk BootStrap v4
    $config['first_link']               = 'First';
    $config['last_link']                = 'Last';
    $config['next_link']                = 'Next';
    $config['prev_link']                = 'Prev';
    $config['full_tag_open']            = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']           = '</ul></nav></div>';
    $config['num_tag_open']             = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']            = '</span></li>';
    $config['cur_tag_open']             = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']            = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']            = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']          = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']            = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']          = '</span>Next</li>';
    $config['first_tag_open']           = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close']         = '</span></li>';
    $config['last_tag_open']            = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']          = '</span></li>';
    //Limit dan Start
    $limit                              = $config['per_page'];
    $start                              = ($this->uri->segment(5)) ? ($this->uri->segment(5)) : 0;
    //End Limit Start
    $this->pagination->initialize($config);
    $products                           = $this->products_model->product_category($category_product_id, $limit, $start);
    // End Listing Berita
    $data = array(
      'title'                           => 'Kota ' . $category_products->category_product_name,
      'deskripsi'                       => 'Kota - ',
      'keywords'                        => 'Kota - ',
      'pagination'                      => $this->pagination->create_links(),
      'products'                        => $products,
      'listcategory_products'           => $listcategory_products,
      'category_product_id'             => $category_product_id,
      'content'                         => 'front/product/index_product'
    );
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
  //main page - detail Produk
  public function detail($product_slug = NULL)
  {
    if (!empty($product_slug)) {
      $product_slug;
    } else {
      redirect(base_url('products'));
    }
    $meta                               = $this->meta_model->get_meta();
    $products                           = $this->products_model->read($product_slug);
    $listcategory_products              = $this->category_products_model->get_category_products();
    $user_id                            = $products->user_id;
    $related_products                   = $this->products_model->related_product($user_id);
    $data = array(
      'title'                           => 'Produk',
      'deskripsi'                       => 'Produk - ' . $meta->description,
      'keywords'                        => 'Produk - ' . $meta->keywords,
      'products'                        => $products,
      'related_products'                => $related_products,
      'listcategory_products'           => $listcategory_products,
      'content'                         => 'front/product/detail_product'
    );
    $this->add_count($product_slug);
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
  // This is the counter function..
  function add_count($product_slug)
  {
    // load cookie helper
    $this->load->helper('cookie');
    // this line will return the cookie which has slug name
    $check_visitor = $this->input->cookie(urldecode($product_slug), FALSE);
    // this line will return the visitor ip address
    $ip = $this->input->ip_address();
    // if the visitor visit this article for first time then //
    //set new cookie and update article_views column  ..
    //you might be notice we used slug for cookie name and ip
    //address for value to distinguish between articles  views
    if ($check_visitor == false) {
      $cookie = array(
        "name"                        => urldecode($product_slug),
        "value"                       => "$ip",
        "expire"                      =>  time() + 7200,
        "secure"                      => false
      );
      $this->input->set_cookie($cookie);
      $this->products_model->update_counter(urldecode($product_slug));
    }
  }
  //   Data Transaksi Order
  public function order($id)
  {
    $product                          = $this->products_model->product_detail($id);
    //Validasi

    $this->form_validation->set_rules(
      'user_title',
      'Title',
      'required',
      array(
        'required'                    => 'Anda harus memilih %s',
      )
    );

    $this->form_validation->set_rules(
      'user_name',
      'Nama Lengkap',
      'required',
      array(
        'required'                    => '%s Harus Diisi',
      )
    );
    $this->form_validation->set_rules(
      'user_email',
      'Email',
      'required',
      array(
        'required'                    => '%s Harus Diisi',
      )
    );
    $this->form_validation->set_rules(
      'user_phone',
      'No. Handphone',
      'required',
      array(
        'required'                    => '%s Harus Diisi',
      )
    );
    $this->form_validation->set_rules(
      'alamat_jemput',
      'Alamat Penjemputan',
      'required',
      array(
        'required'                    => '%s Harus Diisi',
      )
    );
    if ($this->form_validation->run() === FALSE) {
      $data = [
        'title'                       => 'Booking Sewa Mobil',
        'deskripsi'                   => 'Sewa Mobil Online',
        'product'                     => $product,
        'content'                     => 'front/product/order_product'
      ];
      $this->load->view('front/layout/wrapp', $data, FALSE);
    } else {

      $total_price = $this->input->post('product_price') * $this->input->post('product_qty');

      $data  = [
        'user_id'                     => $this->input->post('user_id'),
        'kode_transaksi'              => $this->input->post('kode_transaksi'),
        'product_name'                => $this->input->post('product_name'),
        'kota'                        => $this->input->post('kota'),
        'product_size'                => $this->input->post('product_size'),
        'product_price'               => $this->input->post('product_price'),
        'total_price'                 => $total_price,
        'product_qty'                 => $this->input->post('product_qty'),
        'user_title'                  => $this->input->post('user_title'),
        'user_name'                   => $this->input->post('user_name'),
        'user_email'                  => $this->input->post('user_email'),
        'user_phone'                  => $this->input->post('user_phone'),
        'alamat_jemput'               => $this->input->post('alamat_jemput'),
        'tanggal_jemput'               => $this->input->post('tanggal_jemput'),
        'jam_jemput'                  => $this->input->post('jam_jemput'),
        'permintaan_khusus'           => $this->input->post('permintaan_khusus'),
        'type_transaksi'              => 'Jual',
        'status_read'                 => 0,
        'date_created'                => time()
      ];
      $insert_id = $this->transaksi_model->create($data);
      //Kirim Email
      $this->_sendEmail($insert_id, 'order');
      $this->session->set_flashdata('message', 'Pesanan Anda telah Terkirim');
      redirect(base_url('products/order_success/' . md5($insert_id)), 'refresh');
    }
  }
  private function _sendEmail($insert_id)
  {
    $email_order = $this->pengaturan_model->email_order();
    $transaksi  = $this->transaksi_model->detail_transaksi($insert_id);
    $meta = $this->meta_model->get_meta();

    $config = [

      'protocol'     => "$email_order->protocol",
      'smtp_host'   => "$email_order->smtp_host",
      'smtp_port'   => $email_order->smtp_port,
      'smtp_user'   => "$email_order->smtp_user",
      'smtp_pass'   => "$email_order->smtp_pass",
      'mailtype'     => 'html',
      'charset'     => 'utf-8',
    ];
    $this->load->library('email', $config);
    $this->email->initialize($config);

    $this->email->set_newline("\r\n");

    $this->email->from("$email_order->smtp_user", ' Order ' . $transaksi->kode_transaksi);
    $this->email->to($this->input->post('user_email'));
    $this->email->cc($email_order->cc_email);


    $this->email->subject('Order ' . $transaksi->kode_transaksi . '');
    $this->email->message('
    
    
    

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=320, initial-scale=1" />
  <title>Airmail Invoice</title>
  <style type="text/css">

 
    #outlook a {
      padding: 0;
    }


    .ReadMsgBody {
      width: 100%;
    }

    .ExternalClass {
      width: 100%;
    }


    .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
      line-height: 100%;
    }



    body, table, td, p, a, li, blockquote {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }


    table, td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }


    img {
      -ms-interpolation-mode: bicubic;
    }



    html,
    body,
    .body-wrap,
    .body-wrap-cell {
      margin: 0;
      padding: 0;
      background: #ffffff;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 14px;
      color: #464646;
      text-align: left;
    }

    img {
      border: 0;
      line-height: 100%;
      outline: none;
      text-decoration: none;
    }

    table {
      border-collapse: collapse !important;
    }

    td, th {
      text-align: left;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 14px;
      color: #464646;
      line-height:1.5em;
    }

    b a,
    .footer a {
      text-decoration: none;
      color: #464646;
    }

    a.blue-link {
      color: blue;
      text-decoration: underline;
    }

 

    td.center {
      text-align: center;
    }

    .left {
      text-align: left;
    }

    .body-padding {
      padding: 24px 40px 40px;
    }

    .border-bottom {
      border-bottom: 1px solid #D8D8D8;
    }

    table.full-width-gmail-android {
      width: 100% !important;
    }


    .header {
      font-weight: bold;
      font-size: 16px;
      line-height: 16px;
      height: 16px;
      padding-top: 19px;
      padding-bottom: 7px;
    }

    .header a {
      color: #464646;
      text-decoration: none;
    }


    .footer a {
      font-size: 12px;
    }
  </style>

  <style type="text/css" media="only screen and (max-width: 650px)">
    @media only screen and (max-width: 650px) {
      * {
        font-size: 16px !important;
      }

      table[class*="w320"] {
        width: 320px !important;
      }

      td[class="mobile-center"],
      div[class="mobile-center"] {
        text-align: center !important;
      }

      td[class*="body-padding"] {
        padding: 20px !important;
      }

      td[class="mobile"] {
        text-align: right;
        vertical-align: top;
      }
    }
  </style>

</head>
<body style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
 <td valign="top" align="left" width="100%" style="background: #ffffff;">
 <center>
   <table class="w320 full-width-gmail-android" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
        <td width="100%" height="48" valign="top">           
              <table class="full-width-gmail-android" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                  <td class="header center" width="100%" >
                    <a href="' . $meta->link . '" style="color:#ffffff;">
                    <img class="left" width="auto" height="30" src="' . base_url('assets/img/logo/' . $meta->logo) . '" alt="Sewamobiloka">
                    </a>
                  </td>
                </tr>
              </table>
        </td>
      </tr>
    </table>

    <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
      <tr>
        <td align="center">
          <center>
            <table class="w320" cellspacing="0" cellpadding="0" width="600">
              <tr>
                <td class="body-padding mobile-padding">

                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td class="left" style="padding-bottom:20px; text-align:left;">
                      <b>Invoice:</b> ' . $transaksi->kode_transaksi . '
                    </td>
                  </tr>
                  <tr>
                    <td class="left" style="padding-bottom:40px; text-align:left;">
                    <span style="font-size:20px;"> Hi <b>' . $transaksi->user_title . ' ' . $transaksi->user_name . '</b>,</span>
                    <br>
                    Terima kasih Telah menggunakan layanan ' . $meta->link . ' . Order Anda Telah Kami Terima, Kami Akan Segera Menghubungi Anda
                    </td>
                  </tr>
                </table>

                <br>

                <div style="border:1px solid #ddd;border-radius:4px">
                <div style="background:#0279d6;color:#ffff;padding:5px 0 5px 20px;border-radius:4px 4px 0 0">
                <b>Informasi Order</b>
                </div>
                <div style="padding:10px;">
                <table cellspacing="0" cellpadding="0" width="100%">
                
                
                  <tr>
                  <td>Mobil </td> 
                  <td>: ' . $transaksi->product_name . '</td>
                  </tr>

                  <tr>
                  <td>Harga / hari </td> 
                  <td>: Rp. ' . number_format($transaksi->product_price, 0, ",", ".") . '</td>
                  </tr>

                  <tr>
                  <td>Lama Sewa </td> 
                  <td>: ' . $transaksi->product_qty . ' Hari</td>
                  </tr>

                  <tr>
                  <td>Total Harga </td> 
                  <td style="font-size:18px;color:#0070ee;">: <b>Rp. ' . number_format($transaksi->total_price, 0, ",", ".") . '</b></td>
                  </tr>

                  
                          
                  </table>
                  
                  </div>
                  </div>
                  <br>








                <br><br>

                <div style="border:1px solid #ddd;border-radius:4px">
                <div style="background:#0279d6;color:#ffff;padding:5px 0 5px 20px;border-radius:4px 4px 0 0">
                <b>Informasi Pelanggan</b>
                </div>
                <div style="padding:10px;">
                <table cellspacing="0" cellpadding="0" width="100%">
                
                
                
                  <tr>
                  <td>Nama </td> 
                  <td>: ' . $transaksi->user_title . ' ' . $transaksi->user_name . '</td>
                  </tr>

                  <tr>
                  <td>Mobil </td> 
                  <td>: ' . $transaksi->product_name . '</td>
                  </tr>

                  <tr>
                  <td>Tanggal Jemput </td> 
                  <td>: ' . $transaksi->tanggal_jemput . '</td>
                  </tr>

                  <tr>
                  <td>Jam Jemput </td> 
                  <td>:' . $transaksi->jam_jemput . '</td>
                  </tr>

                  <tr>
                  <td>Kota </td> 
                  <td>: ' . $transaksi->kota . '</td>
                  </tr>

                  <tr>
                  <td>Alamat Jemput </td> 
                  <td>: ' . $transaksi->alamat_jemput . '</td>
                  </tr>

                  <tr>
                  <td>Permintaan Khusus </td> 
                  <td>: ' . $transaksi->permintaan_khusus . '</td>
                  
                  
                          </tr>
                          
                  </table>
                  
                  </div>
                  </div>
                  <br>




                

                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td class="left" style="text-align:left;">
                      Terima Kasih,
                    </td>
                  </tr>
                  <tr>
                    <td class="left" width="auto" height="20" style="padding-top:10px; text-align:left;">
                      
                    </td>
                  </tr>
                </table>



                <table cellspacing="0" cellpadding="0" width="100%">

                <h4>Kebijakan Pembatalan</h4>
                <ul>
                    <li>Pembatalan akan dikenakan 100% dari total biaya</li>
                </ul>
            
                <h4>Kebijakan Batas Waktu</h4>
                <ul>
                    <li>Overtime 10% / Jam dari harga sewa, Biaya akan dikenakan jika durasi sewa
                        melebihi 12 jam pemakaian atau lewat dari pukul 23.59 per hari rental.</li>
                    <li>Akomodasi Pengemudi (Overnight Lodging Cost): Rp150.000 / Malam. Biaya akan dikenakan jika penggunaan unit dan pengemudi
                        melewati pukul 23.59 baik dalam dan luar kota.</li>
                </ul>
            
                <h4>Kebijakan Penggunaan</h4>
                <ul>
                    <li>Luar Kota Zona 1: Rp75.000 / Hari</li>
                    <li>Luar Kota Zona 2: Rp125.000 / Hari</li>
                    <li>Luar Kota Zona 3: Rp200.000 / Hari</li>
                    <li>Uang Makan Pengemudi (semua area): Rp75.000 / Hari</li>
                    <li>BBM / Hari (selain paket All-in): Minimum Rp150.000 (unit di bawah 2000 cc) dan Rp200.000 (unit di atas 2000 cc).</li>
                    <li>All-In / Hari: Rp300.000 (unit di bawah 2000 cc) dan Rp450.000 (unit di atas 2000 cc). Penggunaan 12 jam dalam kota termasuk BBM,
                        tol, parkir, dan uang makan pengemudi. Tambahan ini tidak termasuk tiket masuk obyek wisata dan tidak berlaku untuk pemakaian
                        di luar kota. </li>
                    <li>Jemput Luar Kota Zona 1 / Pemakaian: Rp150.000 (unit di bawah 2000 cc) dan Rp300.000 (unit di atas 2000 cc).*</li>
                    <li>Jemput Luar Kota Zona 2 / Pemakaian: Rp225.000 (unit di bawah 2000 cc) dan Rp375.000 (unit di atas 2000 cc).*</li>
                    <li>Jemput Luar Kota Zona 3 / Pemakaian: Rp300.000 (unit di bawah 2000 cc) dan Rp450.000 (unit di atas 2000 cc).*</li>
                    <li>Antar Luar Kota Zona 1 / Pemakaian: Rp175.000 (unit di bawah 2000 cc) dan Rp235.000 (unit di atas 2000 cc).**</li>
                    <li>Antar Luar Kota Zona 2 / Pemakaian: Rp225.000 (unit di bawah 2000 cc) dan Rp325.000 (unit di atas 2000 cc).** </li>
                    <li>Antar Luar Kota Zona 3 / Pemakaian: Rp300.000 (unit di bawah 2000 cc) dan Rp400.000 (unit di atas 2000 cc).**</li>
                    <li>Semua biaya di atas diberikan langsung pada pengemudi. </li>
                    <li>* Jemput Luar Kota: Biaya sudah termasuk BBM, tol, parkir, dan segala sesuatu yang diperlukan oleh pengemudi menuju lokasi penjemputan.</li>
                    <li>** Antar Luar Kota Zona: Biaya sudah termasuk biaya overtime 2 jam untuk pengemudi dan unit kendaraan kembali ke kota asal.</li>
            
                </ul>
            
                <h4>Syarat & Ketentuan Penggunaan</h4>
                <ul>
                    <li>Paket sewa sudah termasuk mobil, pengemudi, penjemputan, penggunaan, serta pengantaran di zona
                        dalam kota, dan PPN. Penjemputan, penggunaan, serta pengantaran di luar zona dalam kota akan dikenakan biaya tambahan.</li>
                    <li>Dalam kondisi tertentu partner bisnis dapat mengganti kendaraan yang telah dipesan dengan kendaraan lain yang lebih baik
                        dengan persetujuan dari pihak pelanggan terlebih dahulu.</li>
                    <li>Pelanggan tidak diperkenankan membawa penumpang dan barang melebihi kapasitas maksimum kendaraan yang disewa.</li>
                    <li>Kecelakaan dan sanksi yang diakibatkan oleh kelebihan penumpang dan kelebihan muatan menjadi tanggung jawab pelanggan
                        sepenuhnya.</li>
                    <li>Kehilangan dan kerusakan barang selama perjalanan di luar tanggung jawab Partner Bisnis dan ' . $meta->link . '.</li>
                    <li>Pelanggan bertanggung jawab atas semua kerusakan yang diakibatkan secara sengaja atau tidak sengaja, termasuk dan tidak
                        terbatas pada kerusakan kursi mobil, noda, goresan, dan lainnya.</li>
                    <li>Partner Bisnis berhak untuk membatalkan penyewaan dengan alasan force majeure (bencana alam) dan berhak menolak
                        pelanggan yang dianggap tidak memenuhi syarat sebagai penyewa atau bertindak di luar dari batas normal. ' . $meta->link . ' tidak
                        bertanggung jawab atas pembatalan dan penolakan tersebut.</li>
                    <li>' . $meta->link . ' tidak bertanggung jawab terhadap kecelakaan, kerugian, korban, dan pengobatan. Lingkup tanggung jawab ' . $meta->link . '
                        hanya sampai pada penerimaan informasi dan pemberi arahan kepada Partner Bisnis dalam memberikan ganti rugi kepada
                        Pelanggan.</li>
                    <li>Apabila terdapat kendala dan pertanyaan terkait pemesanan, silakan hubungi tim Customer Care ' . $meta->link . ' melalui
                        WhatsApp ke ' . $meta->telepon . ' dan email ke ' . $meta->email . '.</li>
            
                </ul>

                </table>







                </td>
              </tr>
            </table>

          </center>
        </td>
      </tr>
    </table>

    


    <table class="w320" bgcolor="#2f383f" cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
        <td align="center">
          <center>
            <table class="w320" cellspacing="0" cellpadding="0" width="500" bgcolor="#2f383f">
              <tr>
                <td>
                  <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#2f383f">
                    <tr>
                      <td class="center" style="padding:25px; text-align:center;color:#ffffff">
                       Silahkan Hubungi  <b> ' . $meta->telepon . '</b> Untuk informasi lebih lanjut
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </center>
        </td>
      </tr>
      <tr>
        
      </tr>
    </table>
    

  </center>
  </td>
</tr>
</table>
</body>
</html>
    
    
    
    
    
                           ');



    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }
  public function order_success($insert_id)
  {
    $last_transaksi                     = $this->transaksi_model->last_transaksi($insert_id);
    $data = [
      'title'                           => 'Order Sukses',
      'deskripsi'                       => 'Beli Emas Online',
      'last_transaksi'                  => $last_transaksi,
      'content'                         => 'front/product/order_success'
    ];
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */
