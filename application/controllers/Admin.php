<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

   function __construct() {
      parent:: __construct();
      $this->load->config('grocery_crud');
      $this->load->model('M_admin');
      $this->load->helper('My_helper');
   }


   function category() {
      $crud = new grocery_CRUD();
      $crud->set_table('kategori');
      $output = $crud->render();
      $this->load->view('admin/template/header',$output);
      $this->load->view('admin/category',$output);
      $this->load->view('admin/template/footer');    
   }
  
}
