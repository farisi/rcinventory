<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class pex_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        try {
            $this->db= $this->load->database("default",TRUE);
        }  catch (Exception $e){
            echo "error";
            echo $e->getMessage();
        }
    }
}
