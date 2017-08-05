<?php
	class M_home extends CI_Model {
	var $table = 'barang';
    var $column_order = array(null, 'nama_brg','kategori'); //set column field database for datatable orderable
    var $column_search = array('nama_brg','kategori'); //set column field database for datatable searchable 
    var $order = array('id_brg' => 'asc'); // default order 

		function profile($username) {
			return $this->db->get_where('users',array('username'=>$username));	
		}

		function cek_toko($username) {
			return $this->db->get_where('toko',array('username'=>$username));	
		}

		function kategori() {
			return $this->db->get('kategori');
		}

		function all_product() {
			return $this->db->query("SELECT * FROM barang a INNER JOIN toko b ON a.id_toko = b.id_toko WHERE a.status='Stok Tersedia'  ORDER BY id_brg DESC");
		}

        function x_product($id_toko) {
            if($id_toko == "") {
                return $this->db->query("SELECT * FROM barang a INNER JOIN toko b ON a.id_toko = b.id_toko WHERE a.status='Stok Tersedia' ORDER BY id_brg DESC");
            } else {
                 return $this->db->query("SELECT * FROM barang a INNER JOIN toko b ON a.id_toko = b.id_toko WHERE a.status='Stok Tersedia' AND a.id_toko <> $id_toko  ORDER BY id_brg DESC");
            }
        }

		function get_id_toko($username) {
			return $this->db->get_where('toko',array('username'=>$username));
		}

		//SERVERSIDE DATATABLES
	private function _get_datatables_query() {
       
        // $this->db->select('*'); 
        $this->db->from($this->table);
        $this->db->join('kategori','kategori.id_kategori = barang.id_kategori');
 		// $this->db->where('id_toko',$this->session->userdata('id_toko'));
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables() {
        $this->_get_datatables_query();

        if($_POST['length'] != -1)
        	$this->db->limit($_POST['length'], $_POST['start']);
        	$query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function detail_produk($id) {
        $this->db->from("barang");
        $this->db->where('id_brg',$id);
        $this->db->join("kategori","kategori.id_kategori = barang.id_kategori");
        $this->db->join("toko","toko.id_toko = barang.id_toko");
        return $this->db->get();
    }

    function kategori_selected($id) {
        return $this->db->query("SELECT * FROM kategori WHERE id_kategori <> $id");
    }

    function detail_product($id) {
        $this->db->from('barang');
        $this->db->join('toko','toko.id_toko = barang.id_toko');
        $this->db->where('id_brg',$id);
        return $this->db->get();
    }

    function terjual($id) {
       return $this->db->query("SELECT COUNT(*) as jumlah FROM detail_trans WHERE id_brg='$id'");
    }

    function origin($username) {
        return $this->db->get_where('users',array('username' => $username));
    }

    function cek_sess($session) {
        return $this->db->get_where('cart',array('sess_id' => $session));
    }

    function cek_order($username) {
        return $this->db->query("SELECT username FROM transaksi WHERE status <> 'Success' 
            AND username='$username'");
    }

}
