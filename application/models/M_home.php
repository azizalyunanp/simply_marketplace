<?php

class M_home extends CI_Model {

	function view_product() {
		return $this->db->get('product');
	}

	function category() {
		return $this->db->get('category');
	}

	function detail_product($id) {
		$this->db->where('links',$id);
		return $this->db->get('product');
	}

}