<?php

/**
 * Salman Farisi (http://ketikan10jari.wordpress.com)
 * Yahoo Messeger : s4lm4ndrake | skype : salmandriva | http://facebook.com/salmandriva
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        mypermission();
    }
}
?>