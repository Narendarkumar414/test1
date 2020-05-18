<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view("login/login");     
    }
    function login() {
   		$this->load->view("login/login");     
    }

    function signup() {
   		$this->load->view("login/signup");     
    }
    function loginUser()
    {
        $data["salt"]=$this->input->post("salt");
        $a=$this->db->where($data)->get("users")->result_array();
        if(count($a)>0)
        {
            $key=$this->input->post("salt");
            $password=$this->input->post("password");
            $passworddb=$a[0]["password"];
            $passworddb=$this->encrypt->decode($passworddb,$key);
               pre($passworddb); 


            if($password==$passworddb)
            {

                  $this->session->set_userdata($a[0]);
                 $this->session->set_flashdata("msg","login done");
                 redirect("User/index");
            }
            else
            {
                 $this->session->set_flashdata("msg","invalid password");
                 redirect("Login/index");
       
            }

        }
        else
        {
                $this->session->set_flashdata("msg","invalid key");
                redirect("Login/index");

        }
    }
    function signupUser()
    {
        $this->form_validation->set_rules("name","Your Name","required|min_length[5]");
        $this->form_validation->set_rules("email","Your Email","required|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("phone","Telephone number","required|numeric|exact_length[10]");
        $this->form_validation->set_rules("salt","secret key","required|min_length[8]");
        $this->form_validation->set_rules("password","password","required|min_length[8]");
        $this->form_validation->set_rules("confirm","passwords","required|matches[password]");
        $this->form_validation->set_rules("x","profile photo");
        $this->form_validation->set_error_delimiters("<div class='label label-danger'>","</div>");

        if($this->form_validation->run()===FALSE)
        {
            $this->signup();
        }
        else
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|psd|cdr';
                $config['max_size']             = 10000;
                $config['max_width']            = 10241;
                $config['max_height']           = 7681;
                $this->load->library('upload', $config);
                $this->upload->do_upload('x');
                $a=$this->upload->data();
                pre($a);
                $data["name"]=$this->input->post("name");
                $data["email"]=$this->input->post("email");
                $data["phone"]=$this->input->post("phone");
                $data["pic"]=$a["file_name"];
                $data["salt"]=$this->input->post("salt");
                $data["password"]=$this->encrypt->encode($this->input->post("password"),$data["salt"]);
                $this->db->insert("users",$data);
                $this->session->set_flashdata("msg","signup done");
                redirect("Login/index");
        }

    }


}
        
 ?>