<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    function cek_login() {
        $CI = & get_instance();
        $loggedin = $CI->session->userdata('username');
        
        if($loggedin) {
            return TRUE;
        }  else {
            return FALSE;
        }
    }