<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MY_Model extends CI_Model {
    public  $db;
    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database("default",TRUE);
        try {
            $this->db = $this->load->database("default",TRUE);
        }  catch (Exception $e){
            echo "error";
            echo $e->getMessage();
        }
    }
}
