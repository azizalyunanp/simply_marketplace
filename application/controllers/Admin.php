<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

   function __construct() {
      parent:: __construct();
      $this->load->config('grocery_crud');
   }

   function index() {
      $this->product();
   }


   function product() {
      $crud = new grocery_CRUD();
      $crud->set_table('product');
      $crud->field_type('links','invisible');
      #CALLBACK
      $crud->callback_add_field('description',array($this,'add_desc_field'));
      $crud->callback_edit_field('description',array($this,'edit_desc_field'));
      $crud->callback_before_insert(array($this,'before_insert_product'));
      $crud->callback_before_update(array($this,'before_update_product'));

      #SET RELATION
      $crud->display_as('id_category','Category');
      $crud->set_relation('id_category','category','category');
      $crud->change_field_type('field_name', 'password');
      
      #UPLOAD IMAGES
      $this->config->set_item('grocery_crud_file_upload_allow_file_types','gif|jpeg|jpg|png');
      $crud->set_field_upload('images','assets/img/products');
      $crud->callback_after_upload(array($this,'example_callback_after_upload'));
      // select only pictures belonging to a specific gallery
      
      $crud->set_lang_string('insert_success_message',
         'Your data has been successfully stored into the database.<br/>Please wait while you are redirecting to the list page.
         <script type="text/javascript">
          window.location = "'.site_url(strtolower(__CLASS__).'/'.strtolower(__FUNCTION__)).'";
         </script>
         <div style="display:none">
         '
      );

      $crud->set_lang_string('update_success_message',
      'Your data has been successfully stored into the database.<br/>Please wait while you are redirecting to the list page.
      <script type="text/javascript">
      window.location = "'.site_url(strtolower(__CLASS__).'/'.strtolower(__FUNCTION__)).'";
      </script>
      <div style="display:none">'
      );

      $output = $crud->render();

      $this->load->view('admin/template/header',$output);
      $this->load->view('admin/products',$output); 
      $this->load->view('admin/template/footer');   
   }

   function add_desc_field() {
      return "<textarea name=description class=texteditor style='width:700px;height: 400px;'></textarea>";
   }

   function edit_desc_field($value, $primary_key){
      return "<textarea name=description class=texteditor style='width:700px;height: 400px;'>$value</textarea>";
   }

   #######SETUP IMAGE UPLOADING######
   function example_callback_after_upload($uploader_response,$field_info, $files_to_upload) {
      $this->load->library('image_moo');
      //Is only one file uploaded so it ok to use it with $uploader_response[0].
      $file_uploaded = $field_info->upload_path.'/'.$uploader_response[0]->name; 
      $this->image_moo->load($file_uploaded)->resize(800,600)->save($file_uploaded,true);
      return true;
   }
   ####END SETUP UPLOADING#### 

   function category() {
      $crud = new grocery_CRUD();
      $crud->set_table('category');
      $crud->field_type('links','invisible');
      $crud->callback_before_insert(array($this,'before_insert_category'));
      $output = $crud->render();
      $this->load->view('admin/template/header',$output);
      $this->load->view('admin/category',$output); 
      $this->load->view('admin/template/footer');
   }

   function before_insert_category($post_array) {
      $category = $post_array['category'];
      $rep  = str_replace(" ","-", $category);
      $post_array['links'] = strtolower($rep);
      return $post_array;
   }

   function before_update_category($post_array) {
      $category = $post_array['category'];
      $rep  = str_replace(" ","-", $product);
      $post_array['links'] = strtolower($rep);
      return $post_array;
   }

   function before_insert_product($post_array) {
      $product = $post_array['product'];
      $rep  = str_replace(" ","-", $product);
      $post_array['links'] = strtolower($rep);
      return $post_array;
   }

   function before_update_product($post_array) {
      $product = $post_array['product'];
      $rep  = str_replace(" ","-", $product);
      $post_array['links'] = strtolower($rep);
      return $post_array;
   }
}
