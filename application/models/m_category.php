<?php
/**
 * Salman Farisi (http://ketikan10jari.wordpress.com)
 * Yahoo Messeger : s4lm4ndrake | skype : salmandriva | http://facebook.com/salmandriva
 */

class m_category extends MY_Model {
   
    public function __construct() {
        parent::__construct();
    }
    
    public function add() {
        $data = array('name'=>$this->input->post('name'));
        return $this->db->insert('categories',$data);
    }
    
    public function lis() {
        $query = $this->db->query("select * from categories");
        return $query->result_array();
    }
    
}

?>
