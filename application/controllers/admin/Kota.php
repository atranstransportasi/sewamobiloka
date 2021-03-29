<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kota extends CI_Controller
{
    //load data
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('kota_model');

        $id = $this->session->userdata('id');
        $user = $this->user_model->user_detail($id);
        if ($user->role_id == 2) {
            redirect('admin/dashboard');
        }
    }
    //Index Kota
    public function index()
    {

        $config['base_url']       = base_url('admin/kota/index/');
        $config['total_rows']     = count($this->kota_model->total_row());
        $config['per_page']       = 10;
        $config['uri_segment']    = 4;

        //Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';


        //Limit dan Start
        $limit                    = $config['per_page'];
        $start                    = ($this->uri->segment(4)) ? ($this->uri->segment(4)) : 0;
        //End Limit Start
        $this->pagination->initialize($config);


        $kota = $this->kota_model->get_kota($limit, $start);

        $data = [
            'title'             => 'Kota',
            'kota'          => $kota,
            'pagination'    => $this->pagination->create_links(),
            'content'           => 'admin/kota/index_kota'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }


    //Create New Kota
    public function create()
    {



        // Validasi
        $this->form_validation->set_rules(
            'kota_name',
            'Nama Kategori',
            'required',
            array(
                'required'         => '%s Harus Diisi',
                'is_unque'         => '%s <strong>' . $this->input->post('kota_name') .
                    '</strong>Nama Kategori Sudah Ada. Buat Nama yang lain!'
            )
        );
        if ($this->form_validation->run()) {

            $config['upload_path']          = './assets/img/kota/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
            $config['max_size']             = 500000; //Dalam Kilobyte
            $config['max_width']            = 500000; //Lebar (pixel)
            $config['max_height']           = 500000; //tinggi (pixel)
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('kota_image')) {

                //End Validasi
                $data = [
                    'title'        => 'Tambah Kota',
                    'error_upload' => $this->upload->display_errors(),
                    'content'       => 'admin/kota/create_kota'
                ];
                $this->load->view('admin/layout/wrapp', $data, FALSE);

                //Masuk Database

            } else {


                $upload_data    = array('uploads'  => $this->upload->data());
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/img/kota/' . $upload_data['uploads']['file_name'];
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 500;
                $config['height']           = 500;
                $config['thumb_marker']     = '';

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $slugcode = random_string('numeric', 5);
                $kota_slug  = url_title($this->input->post('kota_name'), 'dash', TRUE);
                $data  = [
                    'kota_slug'     => $slugcode . '-' . $kota_slug,
                    'kota_name'     => $this->input->post('kota_name'),
                    'kota_type'     => $this->input->post('kota_type'),
                    'kota_image'     => $upload_data['uploads']['file_name'],
                    'date_created'      => time()
                ];
                $this->kota_model->create($data);
                $this->session->set_flashdata('message', 'Data Kota telah ditambahkan');
                redirect(base_url('admin/kota'), 'refresh');
            }
        }
        //End Masuk Database
        $data = [
            'title'        => 'Tambah Kota',
            'content'          => 'admin/kota/create_kota'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }
    //Update
    public function update($id)
    {
        $kota = $this->kota_model->detail_kota($id);

        //Validasi
        $valid = $this->form_validation;

        $valid->set_rules(
            'kota_name',
            'Nama Kategori',
            'required',
            ['required'      => '%s harus diisi']
        );


        if ($valid->run()) {
            //Kalau nggak Ganti gambar
            if (!empty($_FILES['kota_image']['name'])) {

                $config['upload_path']          = './assets/img/kota/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
                $config['max_size']             = 5000; //Dalam Kilobyte
                $config['max_width']            = 5000; //Lebar (pixel)
                $config['max_height']           = 5000; //tinggi (pixel)
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('kota_image')) {

                    //End Validasi
                    $data = [
                        'title'        => 'Edit kategori',
                        'kota'     => $kota,
                        'error_upload' => $this->upload->display_errors(),
                        'content'          => 'admin/kota/update_kota'
                    ];
                    $this->load->view('admin/layout/wrapp', $data, FALSE);

                    //Masuk Database

                } else {

                    //Proses Manipulasi Gambar
                    $upload_data    = array('uploads'  => $this->upload->data());
                    //Gambar Asli disimpan di folder assets/upload/image
                    //lalu gambar Asli di copy untuk versi mini size ke folder assets/upload/image/thumbs

                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/img/kota/' . $upload_data['uploads']['file_name'];
                    //Gambar Versi Kecil dipindahkan
                    // $config['new_image']        = './assets/img/artikel/thumbs/' . $upload_data['uploads']['file_name'];
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 500;
                    $config['height']           = 500;
                    $config['thumb_marker']     = '';

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();

                    // Hapus Gambar Lama Jika Ada upload gambar baru
                    if ($kota->kota_image != "") {
                        unlink('./assets/img/kota/' . $kota->kota_image);
                        // unlink('./assets/img/artikel/thumbs/' . $berita->berita_gambar);
                    }
                    //End Hapus Gambar

                    $data  = [
                        'id'                => $id,
                        'kota_name'     => $this->input->post('kota_name'),
                        'kota_type'     => $this->input->post('kota_type'),
                        'kota_image'     => $upload_data['uploads']['file_name'],
                        'date_updated'      => time()
                    ];
                    $this->kota_model->update($data);
                    $this->session->set_flashdata('message', 'Data telah di Update');
                    redirect(base_url('admin/kota'), 'refresh');
                }
            } else {
                //Update Berita Tanpa Ganti Gambar
                // Hapus Gambar Lama Jika ada upload gambar baru
                if ($kota->kota_image != "")
                    $data  = [
                        'id'         => $id,
                        'kota_name'     => $this->input->post('kota_name'),
                        'kota_type'     => $this->input->post('kota_type'),
                        'date_updated'      => time()
                    ];
                $this->kota_model->update($data);
                $this->session->set_flashdata('message', 'Data telah di Update');
                redirect(base_url('admin/kota'), 'refresh');
            }
        }
        //End Masuk Database
        $data = [
            'title'        => 'Update Berita',
            'kota'     => $kota,
            'content'          => 'admin/kota/update_kota'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }
    //delete Kota
    public function delete($id)
    {
        //Proteksi delete
        is_login();

        $kota = $this->kota_model->detail_kota($id);

        if ($kota->kota_image != "") {
            unlink('./assets/img/kota/' . $kota->kota_image);
            // unlink('./assets/img/artikel/thumbs/' . $berita->berita_gambar);
        }

        $data = ['id'   => $kota->id];

        $this->kota_model->delete($data);
        $this->session->set_flashdata('message', 'Data telah di Hapus');
        redirect(base_url('admin/kota'), 'refresh');
    }
}
