<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

   function __construct() {
      parent::__construct();
      $this->load->model('M_home');
   }

   function index() {
      $data = array(
        'product' => $this->M_home->view_product()->result(),
      );

      $this->load->view('template/header');
      $this->load->view('home',$data);
      $this->load->view('template/footer');
   }

   function produk() {
       $data = array(
        'product' => $this->M_home->view_product()->result(),
        'category'  => $this->M_home->category()->result()
      );
      $this->load->view('template/header');
      $this->load->view('produk',$data);
      $this->load->view('template/footer');
   
   }

   function checkout() {
      $this->load->view('template/header');
      $this->load->view('checkout');
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

   function add_cart() {
      $data = array(
        'id'      => $this->input->post('id_product'),
        'qty'     => $this->input->post('qty'),
        'price'   => $this->input->post('price'),
        'name'    => $this->input->post('item_name'),
      );
      $this->cart->insert($data);
   }

   function detail_product($id) {
      $data = array(
        'product'   => $this->M_home->detail_product($id)->result(),
        
      );

      $this->load->view('template/header');
      $this->load->view('detail-product',$data);
      $this->load->view('template/footer');
   }

   function plus_cart($id,$qty) {
      $data = array(
        'rowid' => $id,
        'qty'   => $qty + 1
      );

      $this->cart->update($data);
      redirect('home/checkout');
   }

   function min_cart($id,$qty) {
      $data = array(
        'rowid' => $id,
        'qty'   => $qty - 1
      );

      $this->cart->update($data);
      redirect('home/checkout');
   }

   function del_cart($id,$qty) {
      $data = array(
        'rowid' => $id,
        'qty'   => 0
      );

      $this->cart->update($data);
      redirect('home/checkout');
   }
}