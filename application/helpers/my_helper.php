<?php

/* * ****************************
 * Azzuwir Amir( A W I E )     *
 * azzuwir@gmail.com           *
 * azzuwir@hotmail.com         *
 * @2013 Jakarta.              *
 * ***************************** */

if(!function_exists('mytheme')){

    function mytheme($dir){
      $CI = & get_instance();
      switch($dir){
        case "css":
          $path = "themes/css/";
          break;
        case "img":
          $path = "themes/img/";
          break;
        case "js":
          $path = "themes/js/";
          break;
        case "images":
            $path = "themes/images/";
            break;
        case "mobile":
            $path = "themes/mobile/";
            break;
        default:
            $path = "themes/".$dir."/";
            break;
      }
      return $CI->config->slash_item('base_url').$path;
    }
  }
  if(!function_exists('mypermission')){
      function mypermission() {
          $url = "";
          
          $CI = & get_instance();
          // tambahan salman untuk mendapatkan url yang di klik sebelum login. Setelah login berhasil akan di redirect ke link yang di pilih
          if(!$CI->session->userdata("logged_in")){
              if($url=="") {
                $CI->session->set_userdata("url",current_url());
              }
              redirect('user/login');
          }else{
              $dbkurir = $CI->load->database('default',TRUE);
              $qstr =  'select u.`id`, u.`username`, `first_name`, last_name, email, mobile, group_id,extension
          FROM
            `user` u 
                          where u.username=\''.$CI->session->userdata("userid").'\'';
             // echo $qstr;
              $query = $dbkurir->query($qstr);
              $hasil = $query->row_array();
              /*
              $pecah = explode(".", $hasil['agenno']);
              if($pecah[0] == "10"){
                $rule = "PUSAT";
              }
              
              else if(($pecah[0] != "10") && ($pecah[1] == "000")){
                $rule = "CABANG";
              }elseif(($pecah[0] != "10") && ($pecah[1] != "000")){
                  $rule = "Sub Cabang";
              }else{
                $rule = "PERMISION DENIED";
              }
              #$connwms = $CI->load->database('default',TRUE);
              #$hasil['alertVendor'] = mydataone_custom("tblorder", "COUNT(orderno) AS jumlah", "jumlah",$connwms,"ordertype='1' AND orderstatus='0'");
              #$hasil['alertPO'] = mydataone_custom("tblorder", "COUNT(orderno) AS jumlah", "jumlah",$connwms,"ordertype='2' AND orderstatus='0'");
              #$hasil['alertAll'] = mydataone_custom("tblorder", "COUNT(orderno) AS jumlah", "jumlah",$connwms,"orderstatus='0'");
               * *
               */
              return $hasil;
          }
      }
  }
  if(!function_exists('userinfo')){
      function userinfo($value=null) {
          $CI = & get_instance();
          $data = array();
          if($CI->session->userdata("logged_in")){
              $data = $CI->session->all_userdata();
          }
          
          if($value==null) {
              $value="userid";
          }
          return $data[$value];
      }
  }
  if(!function_exists('additional')) {
      function additional($class=null, $method=null) {
          
          $CI = & get_instance();
          $cmethod="";
          $amethod="";
          $cclass="";         
          $class_home="";
          $cmethod="class='current'";
          
          if($class==null) {
              $class=$CI->router->class;
          }
          if($method==null) {
              $method=$CI->router->method;
          }
                  
          if($CI->router->class=="Home" || $CI->router->class=='home') {
                $class="Dashboard";
          }
          
          if($CI->router->method=='index') {
            $method = '';
            $cclass="class='current'";
          }
          else if($CI->router->method != 'index'){            
              $cclass='';
              $amethod=" <a href='{base_url}index.php/{$CI->router->class}/{$CI->router->method}/' {$cmethod}>{$method}</a>";
          }
        
            $data = array(
                'profile'=>  userinfo('pegawai_id'),
                'class'=>ucfirst($CI->router->class),
                'show_class'=>ucfirst($class),
                'method'=>ucfirst($method),
                'cclass'=>$cclass,
                'cmethod'=>$cmethod,
                'amethod'=>$amethod
                );
            return $data;
      }
  }
  if(!function_exists('mydataone')){

    function mydataone($table, $fieldnya, $filter, $conname){ //ARRAY TABLE & DATA
      $row = array();
      $CI = & get_instance();
//      $CI->load->database($conname, TRUE);
      $strqr = "SELECT $fieldnya FROM $table where $filter LIMIT 1";
      $query = $conname->query($strqr);
//      print_r($strqr.'<br/>');
      if($query)
      {
          if($query->num_rows() == 0){
            $field = '';
        }else{
            $row = $query->row_array();
            $field = $row["$fieldnya"];
        }
      }else{
          $field = '';
      }
      return $field;
    }
  }
  if(!function_exists('mydate')){

    function mydate($dmyhhmi, $set='dmyhmi'){
        $tglwkt = explode(" ", $dmyhhmi);
        if(count($tglwkt) > "1") {
            list($tanggal, $waktu) = explode(" ", $dmyhhmi);
        }else{
            list($tanggal) = explode(" ", $dmyhhmi);
        }
        
        if($set == "dmy") {
            list($yer, $mon, $day) = explode("-", $tanggal);
            $dates = $day."-".$mon."-".$yer;
            $tanggal = $dates;
        }elseif($set == "dmyhm"){
            list($yer, $mon, $day) = explode("-", $tanggal);
      //      list($h, $m, $i)       = explode(":", $waktu);
            $dates = $day."-".$mon."-".$yer;
            $jam = $waktu;
            $pecahWaktu = explode(":", $jam);
            $tanggal = $dates." ".$pecahWaktu[0].":".$pecahWaktu[1];
        }
        else{            
            list($yer, $mon, $day) = explode("-", $tanggal);
      //      list($h, $m, $i)       = explode(":", $waktu);
            $dates = $day."-".$mon."-".$yer;
            $jam = $waktu;
            $tanggal = $dates." ".$jam;             
        }
      return $tanggal;
    }
  }
  if(!function_exists('mydataone_custom')){

    function mydataone_custom($table, $fieldnya, $panggil, $conn,$filter="0"){ //ARRAY TABLE & DATA
      $row = array();
      $CI = & get_instance();
      
      if($filter=="0"){
          $strqr = "SELECT $fieldnya FROM $table";
      }else{
          $strqr = "SELECT $fieldnya FROM $table where $filter";
      }
//      echo $strqr;
      $query = $conn->query($strqr);
//      print_r($strqr.'<br/>');
//        echo $strqr ."<br />";
        $row = $query->row_array();
        $field = $row["$panggil"];
      
      return $field;
    }
  }
if(!function_exists('myrupiah')){

    function myrupiah($angka){
      $rupiah = "";
      if(!is_numeric($angka)){
        $angka = 0;
      }
      $rp = strlen($angka);
      while($rp > 3){
        $rupiah = ".".substr($angka, -3).$rupiah;
        $s = strlen($angka) - 3;
        $angka = substr($angka, 0, $s);
        $rp = strlen($angka);
      }
      $rupiah = $angka.$rupiah;
      return $rupiah;
    }
  }
  if(!function_exists("mymessage")){
      function mymessage($title,$message=array(),$msgtype) {
          $tagHTML = "";
          if($msgtype == "error") {
              $tagHTML = "<div class='alert alert-error'>";
          }elseif($msgtype == "info") {
              $tagHTML = "<div class='alert alert-info'>";
          }elseif($msgtype == "success") {
              $tagHTML = "<div class='alert alert-success'>";
          }
          $tagHTML .= "<strong>{$title}</strong>";
          $bodymsg = "";
          if(count($message) > 0){
              $bodymsg = "<ul>";
              foreach ($message as $row) {
                  $bodymsg .= "<li>{$row}</li>";
              }
              $bodymsg .= "<ul>";
          }
          $tagHTML .= $bodymsg;
          $tagHTML .= "</div>";
          return $tagHTML;
      }
  }
  if(!function_exists("mylastconnoteno")) {
      function mylastconnoteno()
      {
          $CI = & get_instance();
          $dbkurir = $CI->load->database('default',TRUE);
          $dbkurir->select_max('ConnoteNo','jumlahkonos');
          $dbkurir->where('ConnoteType','4');
          $query = $dbkurir->get('tblconnote');
          foreach ($query->result() as $row){
              $result = $row->jumlahkonos;
          }
          if($result == 0) {
              return startkonos;
          }else{
              return $result + 1;
          }
//        print_r();
      }
  }
  if(!function_exists('myangka')){
       function myangka($angka) {
           if(($angka == "")||($angka == NULL)) {
               $angka = "0";
           }
           return $angka;
       }
   }
   if(!function_exists('myopt')){

    function myopt($table, $val, $list, $conn,$ops=array()){
      (isset($ops['selected']) ? $selected = $ops['selected'] : $selected = '');
      (isset($ops['filter']) ? $filter = $ops['filter'] : $filter = '');
      (isset($ops['sort']) ? $sort = $ops['sort'] : $sort = $list);

      $CI = & get_instance();
      $query = "Select $val,$list from $table $filter order by $sort";
      $rsops = $conn->query($query);
      $opt = "";
//        while ($rsops->fetchInto($row)) {
      foreach($rsops->result() as $row){
        $slct = ($row->$val == $selected ? "selected" : "");
        $opt .= "<option value=\"".myClearText($row->$val)."\" $slct>".  myClearText(ucwords(strtolower($row->$list)))."</option>";
      }
      return $opt;
    }
  }
  /* untuk membuat option selectbox yang bukan berasal dari database 
   * return String 
   * oleh Salman Farisi
   */
  if(!function_exists('myopt_manual')) {
      function myopt_manual($data=array(), $selected_value=0) {
          $opt="";
          for($k=0; $k<count($data); $k++) {
              $value=$k+1;
              if($value==$selected_value) {
                  $opt .="<option value={$value} selected>{$data[$k]}</option>";
              }
              else {
                  $opt .="<option value={$value}>{$data[$k]}</option>";
              }
          }
          return $opt;
      }
  }
  if(!function_exists('myradio')) {
      function myradio($nama=null, $values=array(), $checked=null) {
          $tag="";
          $i=1;
          foreach($values as $index => $value) {
              if($checked==$index) {
                  $tag .= "<label><input name={$nama} value={$index} checked type='radio'>$value</label>";
              }
              else {
                  $tag .= "<label><input name={$nama} value={$index} type='radio'>$value</label>";
              }
          }          
          return $tag;
      }
  }
  if(!function_exists('myClearText')){
      function myClearText($text)
      {
          $search = array("'","\\",';',':','!','@','#','$','%','^','&','*','+','=','<','>','?','/');
          return str_replace($search, "",$text);
      }
  }
  if(!function_exists('mydatarow')){

    function mydatarow($table, $filter,$conn){ //ARRAY TABLE & DATA
      $query = $conn->query("SELECT * FROM $table WHERE $filter LIMIT 1");
//      PRINT_R("SELECT * FROM $table where $filter LIMIT 1");
      return $query->row_array();
    }
  }
  if(!function_exists('mygetprice')){
      function mygetprice($from,$dest,$srv,$weight){
          $CI = & get_instance();
          $dbkurir = $CI->load->database('default',TRUE);
          $harga = 0;
          $parentFrom = mydataone("tblcity", "city_parent", "CityId='".$from."'", $dbkurir);
          $parentTo = mydataone("tblcity", "city_parent", "CityId='".$dest."'", $dbkurir);
          $layer = mydataone("tblservice", "servicelayer", "ServiceId='".$srv."'", $dbkurir);
          if($layer == '1') {
              $price = mydatarow("tblharga", "HargaTujuan='".$parentFrom . "." . $parentTo ."'", $dbkurir);
              $harga = $price['harga'] * $weight;
          }else{
              $sort = 1;
              for($sort;$sort==intval($layer);$sort++) {
                  $price = mydatarow("tblharga", "HargaTujuan='".$parentFrom . "." . $parentTo ."' AND HargaServiceId='".$srv."' AND HargaSort='". $sort ."'", $dbkurir);
                  if($weight <= $price['HargaLimit']){
                      $harga = $harga + $price['Harga'];
                  }else{
                      $weight - $price['HargaLimit'];
                      $harga = $price['Harga'];
                  }
              }
          }
      }
  }
?>

