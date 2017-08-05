<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_home');
        $this->user_sess = $this->session->userdata('username');
    }


    function index() {
        $this->_clearsess();
        $data = array(
            'kategori'  => $this->M_home->kategori()->result(),
            'produk'    => $this->M_home->all_product()->result()
        );
        $this->load->view('template/header');
        $this->load->view('home',$data);
        $this->load->view('template/footer');

        if($this->session->has_userdata('username')) {
            redirect('home/beranda');
        }
    }

    private function _auth_sess() { #AUTHENTICATION SESSION 
        $cek = $this->M_home->profile($this->user_sess)->row_array();
        if(!$this->user_sess == $cek['username']) {
            $this->logout();
        }
    } 

    private function _clearsess() {
        $sess = $this->M_home->cek_sess(session_id())->num_rows();
        if($sess == 0) {
            return $this->db->query("DELETE FROM cart");
        }
    }

    function filter() {
        $this->load->view('template/header');
        $this->load->view('filter');
        $this->load->view('template/footer');
    }

    function register() {
        $this->load->view('template/header');
        $this->load->view('register');
        $this->load->view('template/footer');
    }

    function login() {
        $this->load->view('template/header');
        $this->load->view('login');
        $this->load->view('template/footer');
    }

    function proses_register() {
        $username   = $this->input->post('username',TRUE);
        $pass       = $this->input->post('password',TRUE);

        $cek_us     = $this->M_home->profile($username)->num_rows();
        if($cek_us > 0 ) {
            echo "<script>alert('Username sudah dipakai')</script>";  
            echo "<meta http-equiv='refresh' content='0;".base_url('home')."'>";
        } else {
            $data = array(
                'username'      => $username,
                'nama_lengkap'  => $this->input->post('nama_lengkap',TRUE),
                'email'         => $this->input->post('email',TRUE),
                'password'      => $this->encryption->encrypt($pass),
                'no_hp'         => $this->input->post('no_hp',TRUE)
            );

            $this->db->insert('users',$data);
            echo "<script>alert('Berhasil mendaftar')</script>";  
            echo "<meta http-equiv='refresh' content='0;".base_url('login')."'>";
        }
    }

    function proses_login() {
        $pass       = $this->input->post('password',TRUE);
        $username   = $this->input->post('username',TRUE);
        $users      = $this->M_home->profile($username)->row_array();
        if($users['username']==$username AND  $pass==$this->encryption->decrypt($users['password'])) {
            
            $sess = array(
                'username'  => $username,
                'id_toko'   => $this->_get_id_toko($username)
                );
            $this->session->set_userdata($sess);
            redirect('home');
        } else {
            echo $this->encryption->decrypt($users['password']);
        }
    }

    function beranda() {
        $this->_auth_sess(); 
        if($this->session->has_userdata('username')) {
            #CEK KELENGKAPAN DATA
            $cek    = $this->M_home->profile($this->user_sess)->row_array();
            if($cek['alamat'] == "" AND $cek['province'] =="" AND $cek['city'] == "" AND $cek['rek_bank']=="" AND $cek['no_rek'] == "") {

                $this->load->view('template/header');
                $this->load->view('edit_profile');
                $this->load->view('template/footer');
            } else {
            $data = array(
                'profile'   => $this->M_home->profile($this->user_sess)->row_array(),
                'toko'      => $this->M_home->cek_toko($this->user_sess)->row_array(),
                'kategori'  => $this->M_home->kategori()->result(),
                'produk'    => $this->M_home->x_product($this->_get_id_toko($this->user_sess))->result()
                // 'produk'    => $this->M_home->all_product()->result()
            );
            $this->load->view('template/header');
            $this->load->view('users_sidebar',$data);
            $this->load->view('beranda',$data);
            $this->load->view('template/footer');
        } 
        }
        else {
            echo "<script>alert('You cannot access this page')</script>";  
            echo "<meta http-equiv='refresh' content='0;".base_url('home')."'>";
        }
    }

    function users() {
        $this->_auth_sess(); 
        $data       = array(
            'users' => $this->M_home->profile($this->user_sess)->result(),
            'toko'  => $this->M_home->cek_toko($this->user_sess)->row_array() 
        );
        if($this->session->has_userdata('username')) {
            $this->load->view('template/header');
            $this->load->view('profile',$data);
            $this->load->view('template/footer');
        } else {
            echo "<script>alert('You cannot access this page')</script>";  
            echo "<meta http-equiv='refresh' content='0;".base_url('home')."'>";
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('home');
    }

    function tambah_toko() {
        $this->_auth_sess(); 
         if($this->session->has_userdata('username')) {
            $this->load->view('template/header');
            $this->load->view('add_toko');
            $this->load->view('template/footer');
        }
    }

    function new_store() {
        $data = array(
            'username'      => $this->session->userdata('username'),
            'nama_toko'     => $this->input->post('nama_toko',TRUE),
           'id_province'    => $this->input->post('id_province',TRUE),
            'province'      => $this->input->post('provinsi',TRUE),
            'id_city'       => $this->input->post('id_city',TRUE),
            'city'          => $this->input->post('city',TRUE),
            'alamat'        => $this->input->post('alamat',TRUE),
            'deskripsi'     => $this->input->post('deskripsi',TRUE),
            'status'        => $this->input->post('status',TRUE) 
        );
        $simpan = $this->db->insert('toko',$data);
        if($simpan) {
            redirect('home');
        }
    }

    function tambah_produk() {
        $this->_auth_sess(); 
        $data = array(
            'kategori'  => $this->M_home->kategori()->result(),
            'toko'      => $this->M_home->cek_toko($this->user_sess)->row_array()
        );
        if($this->session->has_userdata('username') AND $this->_idtoko()<>"") {
            $this->load->view('template/header');
             $this->load->view('users_sidebar',$data);
            $this->load->view('add_produk',$data);
            $this->load->view('template/footer');
        } else {
            echo "<script>alert('You cannot access this page')</script>";
            echo "<meta http-equiv='refresh' content='0;".base_url('home')."'>";
        }
    }

    private function _upload_config() {
        $config['upload_path']          = './gambar/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 800;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_name']            = $this->session->userdata('username').'_'.$_FILES['gambar']['name'];
        $this->upload->initialize($config);
    }

    function add_produk() {
        $this->_upload_config();
        if(!$this->upload->do_upload('gambar')) {
            $data = array(
            'kategori'  => $this->M_home->kategori()->result(),
            'toko'      => $this->M_home->cek_toko($this->session->userdata('username'))->row_array(),
            'error'     => $this->upload->display_errors()
            );
            if($this->session->has_userdata('username') AND $this->_idtoko()<>"") {
                $this->load->view('template/header');
                $this->load->view('users_sidebar',$data);
                $this->load->view('add_produk',$data);
                $this->load->view('template/footer');
            } else {
                echo "<script>alert('You cannot access this page')</script>";
                echo "<meta http-equiv='refresh' content='0;".base_url('home')."'>";
            }
        } else {
            $upload = $this->upload->data();
        $data = array(
            'nama_brg'      => $this->input->post('nama_brg',TRUE),
            'id_toko'       => $this->_idtoko(),
            'id_kategori'   => $this->input->post('kategori',TRUE),
            'harga'         => $this->input->post('harga',TRUE),
            'status'        => $this->input->post('status',TRUE),
            'j_berat'       => $this->input->post('d_berat',TRUE),
            'berat'         => $this->input->post('berat',TRUE),
            'kondisi'       => $this->input->post('kondisi',TRUE),
            'deskripsi'     => $this->input->post('deskripsi',TRUE),
            'photo'         => $upload['file_name'],
            'date_modified' => date('Y-m-d')
        );

        $save = $this->db->insert('barang',$data);
        if($save) {
            redirect('tambah_produk?status=sukses');
        }
    }
    }

    private function _idtoko() {
        $id_toko    = $this->M_home->get_id_toko($this->user_sess)->row_array();
        $toko       = $id_toko['id_toko'];
        return $toko;
    }

    private function _get_id_toko($username) {
        $id_toko    = $this->M_home->get_id_toko($username)->row_array();
        $toko       = $id_toko['id_toko'];
        return $toko;
    }

    function ajax_user_product() {
        $list   = $this->M_home->get_datatables();
        $data   = array();
        $no     = $_POST['start'];

        foreach ($list as $barang) {
            $no++;
            $edit   = "<a class='btn btn-primary' href='home/edit_product/$barang->id_brg'><i class='fa fa-pencil'></i> Edit</a>";
            $del     = "<a class='btn btn-danger' onClick='return konfirmasi()' href='home/delete_product/$barang->id_brg'><i class='fa fa-trash'></i> Delete</a>";
            $row = array();
            $row[] = $no;
            $row[] = "<img width='200' height='200' class='img-responsive' src=".base_url('gambar/').$barang->photo.">" ;
            $row[] = $barang->nama_brg;
            $row[] = $barang->kategori;
            $row[] = $barang->harga;
            $row[] = $barang->status;
            $row[] = $barang->kondisi;
            $row[] = $edit;
            $row[] = $del;
            $data[] = $row;
        }
 
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->M_home->count_all(),
            "recordsFiltered"   => $this->M_home->count_filtered(),
            "data"              => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    function view_product() {
        $this->_auth_sess(); 
        if($this->session->has_userdata('username') AND $this->_idtoko()<>"") {
            $data = array(
                'kategori'  => $this->M_home->kategori()->result(),
                'toko'      => $this->M_home->cek_toko($this->user_sess)->row_array()
            );
            $this->load->view('template/header');
            $this->load->view('users_sidebar',$data);
            $this->load->view('view_product',$data);
            $this->load->view('template/footer');
        } else {
                echo "<script>alert('You cannot access this page')</script>";
                echo "<meta http-equiv='refresh' content='0;".base_url('home')."'>";
        }
    }

    function edit_product($id) {
        $this->_auth_sess(); 
         if($this->session->has_userdata('username') AND $this->_idtoko()<>"") {
            #SETTING OPTION SELECTED STARTED
            $get_array      = $this->M_home->detail_produk($id)->row_array();
            $id_kat         = $get_array['id_kategori'];
            $status         = $get_array['status'];
            $kondisi        = $get_array['kondisi'];

            $data = array(
                'kategori'  => $this->M_home->kategori_selected($id_kat)->result(),
                'toko'      => $this->M_home->cek_toko($this->user_sess)->row_array(),
                'produk'    => $this->M_home->detail_produk($id)->result()
            );
            $this->load->view('template/header');
            $this->load->view('users_sidebar',$data);
            $this->load->view('edit_produk',$data);
            $this->load->view('template/footer');
        } else {
                echo "<script>alert('You cannot access this page')</script>";
                echo "<meta http-equiv='refresh' content='0;".base_url('home')."'>";
        }
    }

    function update_product() {
        $this->_upload_config();
        if(!$this->upload->do_upload('gambar')) {
            if($_FILES['gambar']['name']== "") {
                $data = array(
                    'id_brg'        => $this->input->post('id_brg',TRUE),
                    'nama_brg'      => $this->input->post('nama_brg',TRUE),
                    'id_kategori'   => $this->input->post('kategori',TRUE),
                    'harga'         => $this->input->post('harga',TRUE),
                    'status'        => $this->input->post('status',TRUE),
                    'j_berat'       => $this->input->post('d_berat',TRUE),
                    'berat'         => $this->input->post('berat',TRUE),
                    'kondisi'       => $this->input->post('kondisi',TRUE),
                    'deskripsi'     => $this->input->post('deskripsi',TRUE),
                    'date_modified' => date('Y-m-d')
                );
                $this->db->where('id_brg',$data['id_brg']);
                $this->db->update('barang',$data);
                redirect('view_produk?status=update');
            } else {
            $data = array(
            'kategori'  => $this->M_home->kategori()->result(),
            'toko'      => $this->M_home->cek_toko($this->session->userdata('username'))->row_array(),
            'error'     => $this->upload->display_errors()
            );
            if($this->session->has_userdata('username') AND $this->_idtoko()<>"") {
                $this->load->view('template/header');
                $this->load->view('users_sidebar',$data);
                $this->load->view('add_produk',$data);
                $this->load->view('template/footer');
            } else {
                echo "<script>alert('You cannot access this page')</script>";
                echo "<meta http-equiv='refresh' content='0;".base_url('home')."'>";
            }
        }
        } else {
            $upload = $this->upload->data();
            $data = array(
            'id_brg'        => $this->input->post('id_brg',TRUE),
            'nama_brg'      => $this->input->post('nama_brg',TRUE),
            'id_kategori'   => $this->input->post('kategori',TRUE),
            'harga'         => $this->input->post('harga',TRUE),
            'status'        => $this->input->post('status',TRUE),
            'j_berat'       => $this->input->post('d_berat',TRUE),
            'berat'         => $this->input->post('berat',TRUE),
            'kondisi'       => $this->input->post('kondisi',TRUE),
            'deskripsi'     => $this->input->post('deskripsi',TRUE),
            'photo'         => $upload['file_name'],
            'date_modified' => date('Y-m-d')
            );
            $this->db->where('id_brg',$data['id_brg']);
            $this->db->update('barang',$data);
            redirect('view_produk?status=update');
    }
    }

    function delete_product($id_brg) {
        $this->db->where('id_brg',$id_brg);
        $this->db->delete('barang');
        redirect('view_produk?status=delete');
    }

    function detail_product($id) {
        $data = array(
            'product'   => $this->M_home->detail_product($id)->result(),
            'terjual'   => $this->M_home->terjual($id)->row_array()
        );
        $this->load->view('template/header');
        $this->load->view('detail_product',$data);
        $this->load->view('template/footer');
    }

    
    function update_profile() {
        $data = array(
            'tgl_lahir'     => date('Y-m-d',strtotime($this->input->post('tgl_lahir',TRUE))), 
            'id_province'   => $this->input->post('id_province',TRUE),
            'province'      => $this->input->post('provinsi',TRUE),
            'id_city'       => $this->input->post('id_city',TRUE),
            'city'          => $this->input->post('city',TRUE),
            'alamat'        => $this->input->post('alamat',TRUE),
            'rek_bank'      => $this->input->post('rek_bank',TRUE),
            'no_rek'        => $this->input->post('no_rek',TRUE)
        );
        $this->db->where('username',$this->user_sess);
        $this->db->update('users',$data);
    }

    private function _cek_order() {
        $order = $this->M_home->cek_order($this->user_sess)->num_rows();
        return $order;
    }
    
}