<?php

class M_transaction extends CI_Model {
	
	function toko_trans($username) {
		return $this->db->query("SELECT distinct a.id_toko,b.nama_toko FROM `cart` a INNER JOIN toko b ON a.id_toko = b.id_toko WHERE a.username='$username'");
	}

	function v_cart($session,$id_toko) {
		$this->db->from('cart');
		$this->db->join('toko','cart.id_toko = toko.id_toko');
		$this->db->join('users','users.username = toko.username');
		$this->db->join('barang','barang.id_brg = cart.id_brg');
		$this->db->where('sess_id', $session);
		$this->db->where('cart.id_toko',$id_toko);
		$this->db->order_by('id_cart','DESC');
		return $this->db->get();
	}

	function cek_toko_cart($id_toko) {
		return $this->db->get_where('cart',array('id_toko' => $id_toko, 'sess_id' => session_id()));
	}

	function cek_id_brg($id_brg) {
		return $this->db->get_where('cart',array('id_brg' => $id_brg));
	}

	function total_cart($session) {
		return $this->db->query("SELECT SUM((harga*qty) + shipping_cost) as total_bayar FROM `cart` WHERE sess_id='$session'");
	}

	function type_bayar($username) {
		return $this->db->get_where('users',array("username" => $username));
	}

	function last_nota() {
		return $this->db->query("SELECT COALESCE(max(id_trans),0) as note FROM transaksi");
	}

	function all_cart($session) {
		return $this->db->get_where('cart',array('sess_id' => $session));
	}
}