<?php
/**
 * Salman Farisi (http://ketikan10jari.wordpress.com)
 * Yahoo Messeger : s4lm4ndrake | skype : salmandriva | http://facebook.com/salmandriva
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model("m_user", "User");
        //mypermission();
    }
    public function index()
    {
        $this->login();
    }
    public function login()
    {
        $this->parser->parse('templates/login', array('maincontent'=>$this->parser->parse('user/login_view', array('base_url'=>base_url()), TRUE), 'base_url'=>base_url(), 'title'=>'Login'));
    }
    public function login_act() {
        
        if($this->User->ceklogin()) { 
            $userdetail = $this->User->userdetail();
            $data = array('userid' => $this->input->post('username'),
                    'level' => $userdetail['group_id'],
                
                
                'id'=>$userdetail['id'],
                'firstname'=>$userdetail['firstname'],
                    'logged_in' => TRUE,
                'lastname'=>$userdetail['lastname']
            );
            $this->session->set_userdata($data);
            if(!$this->session->userdata("url")) {
                redirect('home');
            }
            else {
                redirect($this->session->userdata("url"));
            }
            
        }else{
            redirect('user/login');
        }
    }
    public function add() {
        $data = $this->User->infoUser();
                array(
                    'maincontent'=>$this->parser->parse_string('user/vadd',
                            array(
                                'base_url'=>  base_url(),
                                'pegawai_id'=>$this->input->get("pegawai_id")
                                )+ $data, TRUE) ,
                    'base_url'=>base_url(),
                    'title'=>'Tambah User Login',
                    'class'=>$this->router->class,  
                    'method'=>'Tambah User Login'
                );    
    }
    public function dataLogin() {
        if($this->User->m_dataLogin()) {
            redirect("pegawai/index");
        }
        else {
            redirect("user/add?pegawai_id={$this->input->post("pegawai_id")}");
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('user/login');
    }
}

?>
