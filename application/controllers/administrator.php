<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        $this->load->model('Categories_model');
        $this->load->model('Products_model');
        $this->load->helper('rupiah_helper');
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
        $data['getProducts'] = $this->Products_model->getProducts();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('administrator/products', $data);
        $this->load->view('templates/footer_admin');
    }

    public function add_product(){
        $this->form_validation->set_rules('title', 'title', 'required', ['required' => 'Title is required']);
        if($this->form_validation->run() == false){
            $data['title'] = 'Add Product - Admin Panel';
            $data['categories'] = $this->Categories_model->getkategori();
            $this->load->view('templates/header_admin', $data);
            $this->load->view('administrator/add_product', $data);
            $this->load->view('templates/footer_admin');
        }else{
            $data = array();
            $upload = $this->Products_model->uploadImg();

            if($upload['result'] == 'success'){
                $this->Products_model->insertProduct($upload);
                $this->session->set_flashdata('upload', "<script>
                    swal({
                    text: 'Product added successfully',
                    icon: 'success'
                    });
                    </script>");
                    redirect(base_url() . 'administrator/products');
            }else{
                $this->session->set_flashdata('failed', "<div class='alert alert-danger' role='alert'>
                Failed to add product, make sure the icon is a maximum of 2MB in size and in the format png, jpg, jpeg. Please try again.
              </div>");
                redirect(base_url() . 'administrator/product/add');
            }
        }
    }

    public function edit_product($id){
        $this->form_validation->set_rules('title', 'title', 'required', ['required' => 'Title is required']);
        if($this->form_validation->run() == false){
            $data['title'] = 'Edit Product - Admin Panel';
            $data['categories'] = $this->Categories_model->getkategori();
            $data['product'] = $this->Products_model->getProductById($id);
            $this->load->view('templates/header_admin', $data);
            $this->load->view('administrator/edit_product', $data);
            $this->load->view('templates/footer_admin');
        }else{
            if($_FILES['img']['name'] != ""){
                $data = array();
                $upload = $this->Products_model->uploadImg();

                if($upload['result'] == 'success'){
                    $this->db->where('id_produk', $id);
                    $query = $this->db->get('produk');
                    $row = $query->row();
                    unlink("./assets/img/product/$row->img");
                    
                    $this->Products_model->updateProduct($upload['file']['file_name'], $id);
                    $this->session->set_flashdata('upload', "<script>
                        swal({
                        text: 'Product changed successfully',
                        icon: 'success'
                        });
                        </script>");
                    $this->db->where('id_produk', $id);
                    redirect(base_url() . 'administrator/products');

                }else{
                    $this->session->set_flashdata('failed', "<div class='alert alert-danger' role='alert'>
                    Failed to change the product, make sure the icon is a maximum of 2MB in size and in the format png, jpg, jpeg. Please try again.
                </div>");
                    redirect(base_url() . 'administrator/product/' . $id . '/edit');
                }
            }else{
                $oldImg = $this->input->post('oldImg');
                $this->Products_model->updateProduct($oldImg, $id);
                $this->session->set_flashdata('upload', "<script>
                    swal({
                    text: 'Product changed successfully',
                    icon: 'success'
                    });
                    </script>");
                redirect(base_url() . 'administrator/products');
            }
        }
    }

    public function delete_product($id){
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
        $this->db->where('id_produk', $id);
        $this->db->delete('package_produk');
        $this->session->set_flashdata('upload', "<script>
            swal({
            text: 'Product deleted successfully',
            icon: 'success'
            });
            </script>");
        $query = $this->db->get('produk');
        $row = $query->row();
        unlink("./assets/img/product/$row->img");
        redirect(base_url() . 'administrator/products');
    }

    public function product($id){
        $data['title'] = 'Product Detail - Admin Panel';
        $data['product'] = $this->Products_model->getProductById($id);
        $this->load->view('templates/header_admin', $data);
        $this->load->view('administrator/detail_product', $data);
        $this->load->view('templates/footer_admin');
    }

    public function kategori(){
        $this->form_validation->set_rules('name', 'Name', 'required', ['required' => 'Category name is required']);
        if($this->form_validation->run() == false){
            $data['title'] = 'Category - Admin Panel';
            $data['getCategories'] = $this->Categories_model->getkategori();
            $this->load->view('templates/header_admin', $data);
            $this->load->view('administrator/kategori', $data);
            $this->load->view('templates/footer_admin');
        }else{
            $data = array();
            $upload = $this->Categories_model->uploadIcon();

            if($upload['result'] == 'success'){
                $this->Categories_model->insertCategory($upload);
                $this->session->set_flashdata('upload', "<script>
                    swal({
                    text: 'Category added successfully',
                    icon: 'success'
                    });
                    </script>");
                    redirect(base_url() . 'administrator/kategori');
            }else{
                $this->session->set_flashdata('failed', "<div class='alert alert-danger' role='alert'>
                Failed to add a category, make sure the icon is a maximum of 2MB in size and in the format png, jpg, jpeg. Please try again.
              </div>");
                redirect(base_url() . 'administrator/kategori');
            }
        }
    }

    public function edit_kategori($id){
        $this->form_validation->set_rules('name', 'Name', 'required', ['required' => 'Category name is required']);
        if($_FILES['icon']['name'] != ""){
            $data = array();
            $upload = $this->Categories_model->uploadIcon();
            if($upload['result'] == 'success'){
                $this->db->where('id_kategori', $id);
                $query = $this->db->get('kategori');
                $row = $query->row();
                unlink("./assets/img/icon/$row->icon");

                $this->Categories_model->updateCategory($upload['file']['file_name'], $id);
                $this->session->set_flashdata('upload', "<script>
                    swal({
                    text: 'Category changed successfully',
                    icon: 'success'
                    });
                    </script>");
                    redirect(base_url() . 'administrator/kategori');
            }else{
                $this->session->set_flashdata('failed', "<div class='alert alert-danger' role='alert'>
                Gagal mengubah kategori, pastikan icon berukuran maksimal 2mb dan berformat png, jpg, jpeg. Silakan ulangi lagi.
              </div>");
                redirect(base_url() . 'administrator/category/' . $id);
            }
        }else{
            $oldIcon = $this->input->post('oldIcon');
            $this->Categories_model->updateCategory($oldIcon, $id);
            $this->session->set_flashdata('upload', "<script>
                swal({
                text: 'Category changed successfully',
                icon: 'success'
                });
                </script>");
            redirect(base_url() . 'administrator/kategori');
        }
    }

    public function deleteKategori($id){
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
        $query = $this->db->get('kategori');
        $row = $query->row();
        unlink("./assets/img/icon/$row->icon");
        $this->db->where('kategori', $id);
        $this->db->delete('produk');
        $this->session->set_flashdata('upload', "<script>
            swal({
            text: 'Category deleted successfully',
            icon: 'success'
            });
            </script>");
        redirect(base_url() . 'administrator/kategori');
    }

    // package
    public function package(){
        $data['title'] = 'Product Package - Admin Panel';
        $this->db->order_by('id_package', 'desc');
        $data['package'] = $this->db->get('package');
        $this->load->view('templates/header_admin', $data);
        $this->load->view('administrator/package', $data);
        $this->load->view('templates/footer_admin');
    }

    public function add_package(){
        $this->form_validation->set_rules('title', 'title', 'required', ['required' => 'Title is required']);
        $this->Settings_model->insertPackage();
        $this->session->set_flashdata('upload', "<script>
            swal({
            text: 'The product package was successfully added',
            icon: 'success'
            });
            </script>");
        redirect(base_url() . 'administrator/package');
    }

    public function delete_package($id){
        $this->db->where('id_package', $id);
        $this->db->delete('package');
        $this->db->where('id_package', $id);
        $this->db->delete('package_produk');
        $this->session->set_flashdata('upload', "<script>
            swal({
            text: 'The product package has been successfully removed',
            icon: 'success'
            });
            </script>");
        redirect(base_url() . 'administrator/package');
    }

    public function show_package1($id){
        $this->form_validation->set_rules('product', 'product', 'required', ['required' => 'Product is required']);
        if($this->form_validation->run() == false){
            $data['title'] = 'Package detail - Admin Panel';
            $data['package'] = $this->db->get_where('package', ['id_package' => $id])->row_array();
            $this->db->select("*, package_produk.id_pp AS packId");
            $this->db->join("produk", "package_produk.id_produk=produk.id_produk");
            $this->db->where('package_produk.id_package', $id);
            $data['packdata'] = $this->db->get('package_produk');
            $data['allproduct'] = $this->db->get('produk');
            $this->load->view('templates/header_admin', $data);
            $this->load->view('administrator/show_package1', $data);
            $this->load->view('templates/footer_admin');
        }else{
            $product = $this->input->post('product');
            $data = [
                'id_package' => $id,
                'id_produk' => $product
            ];
            $this->db->insert('package_produk', $data);
            $this->session->set_flashdata('upload', "<script>
                swal({
                text: 'Product added successfully',
                icon: 'success'
                });
                </script>");
            redirect(base_url() . 'administrator/package/' . $id);
        }
    }

    public function delete_package_data($id, $idP){
        $this->db->where('id_pp', $id);
        $this->db->delete('package_produk');
        $this->session->set_flashdata('upload', "<script>
            swal({
            text: 'Product deleted successfully',
            icon: 'success'
            });
            </script>");
        redirect(base_url() . 'administrator/package/' . $idP);
    }

}
