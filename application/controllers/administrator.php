<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        // $this->load->model('Categories_model');
        $this->load->model('Products_model');
        // $this->load->model('Settings_model');
        // $this->load->model('Promo_model');
        // $this->load->model('Testi_model');
        // $this->load->model('Order_model');

        if(!$this->session->userdata('admin')){
            $cookie = get_cookie('djehbicd');
            if($cookie == NULL){
                redirect(base_url());
            }else{
                $getCookie = $this->db->get_where('admin', ['cookie' => $cookie])->row_array();
                if($getCookie){
                    $dataCookie = $getCookie;
                    $dataSession = [
                        'id' => $dataCookie['id']
                    ];
                    $this->session->set_userdata('admin', true);
                    $this->session->set_userdata($dataSession);
                }else{
                    redirect(base_url());
                }
            }
        }
    }

    public function index(){
        $data['title'] = 'Dashboard - Admin Panel';
        $this->load->view('templates/header_admin', $data);
        $this->load->view('administrator/index');
        $this->load->view('templates/footer_admin');
    }

    public function logout(){
        session_unset();
        session_destroy();
        delete_cookie('djehbicd');
        redirect(base_url() . 'login/admin');
    }

    public function products(){
        $data['title'] = 'Product - Admin Panel';
        $config['base_url'] = base_url() . 'administrator/products/';
        // $config['total_rows'] = $this->Products_model->getProducts("","")->num_rows();
        // $config['per_page'] = 10;
        // $config['first_link']       = 'First';
        // $config['last_link']        = 'Last';
        // $config['next_link']        = 'Next';
        // $config['prev_link']        = 'Prev';
        // $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        // $config['full_tag_close']   = '</ul></nav></div>';
        // $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        // $config['num_tag_close']    = '</span></li>';
        // $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        // $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        // $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        // $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['prev_tagl_close']  = '</span>Next</li>';
        // $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        // $config['first_tagl_close'] = '</span></li>';
        // $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['last_tagl_close']  = '</span></li>';
        // $from = $this->uri->segment(3);
        // $this->pagination->initialize($config);
        // $data['getProducts'] = $this->Products_model->getProducts($config['per_page'], $from);
        $data['getProducts'] = $this->Products_model->getProducts();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('administrator/products', $data);
        $this->load->view('templates/footer_admin');
    }
}
