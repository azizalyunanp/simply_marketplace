<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_home');
		$this->load->model('M_transaction');
		$this->user_sess = $this->session->userdata('username');

	}


    #RAJA ONGKIR API
    function get_province() {
        $response = $this->rajaongkir->province();
        $data = json_decode($response, true);
        for ($i=0; $i < count($data['rajaongkir']['results']); $i++){
  
        echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
  
        }
    }

    function get_city($id_province) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL             => "http://api.rajaongkir.com/starter/city?province=$id_province",
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_ENCODING        => "",
        CURLOPT_MAXREDIRS       => 10,
        CURLOPT_TIMEOUT         => 30,
        CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST   => "GET",
        CURLOPT_HTTPHEADER      => array(
            "key: 7b684eddcf9063f4bcbefd3d56d45c01"
          ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, true);
          
        for ($j=0; $j < count($data['rajaongkir']['results']); $j++){
            echo "<option value='".$data['rajaongkir']['results'][$j]['city_id']."'>".$data['rajaongkir']['results'][$j]['city_name']."</option>";
          
            }
        }
    }

    private function _city_users() {
        $origin = $this->M_home->origin($this->user_sess)->row_array();
        $city   = $origin['id_city'];
        return $city;
    }

    function get_cost() {
        $destination    = $this->_city_users();
        $origin         = $this->input->post('origin',TRUE);
        $berat          = $this->input->post('weight',TRUE);
        $courier        = $this->input->post('courier',TRUE);
        $type           = $this->input->post('type',TRUE);

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL             => "http://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_ENCODING        => "",
        CURLOPT_MAXREDIRS       => 10,
        CURLOPT_TIMEOUT         => 30,
        CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST   => "POST",
        CURLOPT_POSTFIELDS      => "origin=$origin&destination=$destination&weight=$berat&courier=$courier",
        CURLOPT_HTTPHEADER      => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 7b684eddcf9063f4bcbefd3d56d45c01"
          ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          //echo $response;
          $data = json_decode($response, true);
        }

        if($courier == "") {
            echo 0;
        } else {
        for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
            // for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
                #JNE 
                if($type=="CTC") {
                    print_r(number_format($data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'],0,",","."));
                } else if($type=="CTCOKE") {
                   print_r(number_format($data['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'],0,",",".")); 
                } else if($type=="CTCYES") {
                   print_r(number_format($data['rajaongkir']['results'][0]['costs'][2]['cost'][0]['value'],0,",",".")); 
                }
            // }
        }
        }   
    }
    ####END RAJA ONGKIR API####


	function add_cart() {
        #CEK ONGKIR 
        $cek    = $this->M_transaction->cek_toko_cart($this->input->post('id_toko'))->num_rows();
        if($cek==0) {
            $ongkir = str_replace('.', '',  $this->input->post('ongkir',TRUE));
        } else {
            $ongkir = 0;
        }

        #CEK BARANG

        $brg    = $this->M_transaction->cek_id_brg($this->input->post('id_brg'))->row_array();
        $sess   = $brg['sess_id'];
        $id_brg = $brg['id_brg'];
        if($sess == session_id() AND $id_brg == $this->input->post('id_brg',TRUE)) {
            $this->db->set('qty','qty+1',FALSE);
            $this->db->where(array('sess_id' => $sess, 'id_brg' => $this->input->post('id_brg',TRUE)));
            $this->db->update('cart');
            echo "sukses";
        } else {
        $data   = array(
            'sess_id'       => session_id(),
            'id_toko'       => $this->input->post('id_toko',TRUE),
            'username'      => $this->user_sess,
            'id_brg'        => $this->input->post('id_brg',TRUE),
            'nama_brg'      => $this->input->post('nama_brg',TRUE),
            'qty'           => $this->input->post('qty',TRUE),
            'harga'         => str_replace('.','', $this->input->post('harga',TRUE)),
            'keterangan'    => $this->input->post('keterangan',TRUE),
            'shipping_cost' => $ongkir,
            'kurir' 		=> $this->input->post('kurir',TRUE),
            'service'		=> $this->input->post('service',TRUE)            
        );
        $save = $this->db->insert('cart',$data);
        if($save) {
            echo "sukses";
        }
        }
        
    }

    function view_cart() {
    	$data = array(
    		'toko' 	  => $this->M_transaction->toko_trans($this->user_sess)->result(),
            'total'   => $this->_total_cart()  
    	);
    	$this->load->view('template/header');
    	$this->load->view('cart',$data);
    	$this->load->view('template/footer');
    }

    function delete_cart($id) {
        $this->db->where('id_cart',$id);
        $this->db->delete('cart');
        $this->view_cart();
    }

    function view_checkout() {
        $data = array(
            'total'     => $this->_total_cart(),
            'bayar'     => $this->M_transaction->type_bayar($this->user_sess)->row_array()
        );
        $this->load->view('template/header');
        $this->load->view('checkout',$data);
        $this->load->view('template/footer');
    }

    function change_bayar() {
        $data = array(
            'no_rek'    => $this->input->post('no_rek',TRUE),
            'rek_bank'  => $this->input->post('rek_bank',TRUE) 
        );
        $this->db->where('username',$this->user_sess);
        $this->db->update('users',$data);
    }

    private function _total_cart() {
        $sql    = $this->M_transaction->total_cart(session_id())->row_array();
        return $sql;
    }

    private function _total_cart2() {
        $sql    = $this->M_transaction->total_cart(session_id())->row_array();
        $total  = $sql['total_bayar'];
        return $total;
    }

    private function _getnota() {
        $tgl        = date('Ymd');
        $lastnote   = $this->M_transaction->last_nota()->row_array();
        if($lastnote['note'] > 0) {
            $nota = $lastnote['note'] + 1;
        } else {
            $nota = $tgl.'1000';
        }
        return $nota;
    }

    function save_trans() {
        $data = array(
            'id_trans'  => $this->_getnota(),
            'username'  => $this->user_sess,
            'total'     => $this->_total_cart2()
        );
        $this->db->insert('transaksi',$data);

        $cart   = $this->M_transaction->all_cart(session_id())->result();

        foreach ($cart as $c) {
           $trans[] = array(
            'id_trans'      => $this->_getnota(),
            'id_toko'       => $c->id_toko,
            'id_brg'        => $c->id_brg,
            'nama_brg'      => $c->nama_brg,
            'qty'           => $c->qty,
            'harga'         => $c->harga,
            'shipping_cost' => $c->shipping_cost,
            'keterangan'    => $c->keterangan,
            'kurir'         => $c->kurir,
            'service'       => $c->service
        );
        }
        $this->db->insert_batch('detail_trans',$trans);

        $this->db->where('sess_id',session_id());
        $this->db->delete('cart');
    }
}
