<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User_model extends CI_Model {

    /*
     * FUNCTION: Validate
     */
    function validate() {
        $this->db->from( 'users' );
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));
        $this->db->limit( 1 );
        $query = $this->db->get();

        if ($query->num_rows == 1) {
            return true;
        }else{
            return false;
        }
    }

}
