<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $a=array("html","form","url","common","string","captcha","text","xml","array","cookie","date");
        $b=array("parser","table","pagination","session","form_validation","encrypt");
        $this->load->helper($a);
        $this->load->library($b);
        $this->load->database();
        $this->load->model("Common_Model","cm");
    }

}
        
 ?>