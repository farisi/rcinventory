<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Categories extends MY_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('m_category', 'Category');
    }
    
    function add() {
        $content = array('title'=>'Add Category');
        $tcontent = $this->parser->parse('categories/add', $content, TRUE);
        
        $maincontent = array('title'=>'Add Category', 'maincontent'=>$tcontent);
        $this->parser->parse('templates/template', $maincontent);
    }
    
    function add_act() {
        if($this->Category->add()) {
            redirect('categories/index');
        }
        else {
            redirect('categories/add');
        }
    }
    
    function index() {
        $content = array('title'=>'test', 'categories'=>$this->Category->lis());
        $maincontent = $this->parser->parse('categories/list', $content, TRUE);
        
        $data = array('title'=>'Categories List', 'maincontent'=>$maincontent);
        $this->parser->parse('templates/template', $data);
    }
    
}
?>