<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dokter extends CI_Controller {

    public function daftarPantauan($offset = 0)
    {
        $this->load->model('pantauanModel');

        $data = [];
        $limit = 10;
        $jumlahData = $this->pantauanModel->jumlah();
        $data['limit'] = $limit;
        $data['offset'] = $offset;
        
        // echo $jumlahData;exit;

        $config['base_url'] = site_url('dokter/daftarPantauan');
        $config['total_rows'] = $jumlahData; 
        $config['per_pages'] = $limit;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '>>';
        $config['prev_link']        = '<<';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content">';
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

        $this->pagination->initialize($config);


        $param = [];
        $param['daftarPantauan'] = $this->pantauanModel->daftarPantauan($data);
        $this->load->view('layout/header');
        $this->load->view('customer/home' , $param);
        $this->load->view('layout/footer');
    }
    
}
?>