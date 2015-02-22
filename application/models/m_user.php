<?php
/**
 * Salman Farisi (http://ketikan10jari.wordpress.com)
 * Yahoo Messeger : s4lm4ndrake | skype : salmandriva | http://facebook.com/salmandriva
 */

class m_user extends MY_Model {
   
    public function __construct() {
        parent::__construct();
    }
   
    function ceklogin()
    {
        $password = md5($this->input->post('userpass'));
        $sql = "select id from user where username='{$this->input->post('username')}' and password='{$password}' and is_disabled=0";
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }
    function userdetail()
    {
        $sql = "SELECT 
            u.`id`, u.`username`, `first_name`, last_name, email, mobile, group_id,extension
          FROM
            `user` u 
            WHERE u.`username`='{$this->input->post('username')}' LIMIT 1";
        $query = $this->db->query($sql);
            
        $row = $query->row_array();
        return $row;        
    }
    
    function infoUser() {
        
        $sql = "SELECT 
            a.`pegawainama` nama,
            a.pegawaiid,
            a.nik,
            b.`nama` jabatan,
            c.`nama` divisi,
            d.`Cabang` cabang
          FROM
            kurirdom.tblpegawai a 
            LEFT JOIN hrd.`jabatan` b 
              ON a.`jab_id` = b.`jab_id` 
            LEFT JOIN hrd.`divisi` c 
              ON a.`div_id` = c.`div_id`
              LEFT JOIN tblcabang d
              ON a.`pegawaicabang`  = d.`CabangNo` 
          WHERE a.`pegawaiid`  ={$this->input->get('pegawai_id')};";
        echo $sql;
        $query = $this->db->query($sql);
        $data = array();
        if($query) {
            $i=1;
            foreach($query->result_array() as $row) {
                $data[$i]=$row;
                $i++;
            }
        }
        return array('data'=>$data);
    }
    
    public function m_dataLogin() {
        $data = array(
            'userid'=>$this->input->post("userLogin"),
            'password'=>md5($this->input->post("password"))
                );
        
        $this->db->trans_start();
        $this->db->where("pegawaiid", $this->input->post("pegawai_id"));
        $this->db->update("tblpegawai", array('pegawailogin'=>1));
        $this->db->insert("user", $data);
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE)
        {
            // generate an error... or use the log_message() function to log your error
            return false;
        }
        return true;
    }
}

?>
