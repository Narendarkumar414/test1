<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      // pre($this->session->userdata())     ;
      $data["vehicles"]=$this->cm->userVehicles();
      $data["total"]=count($this->cm->userVehicles());
      $this->load->view("user/header");
      $this->parser->parse("user/main",$data);
      $this->load->view("user/footer");
    }
    function viewParking() {
      $data["v"]=$this->cm->userVehicles();
      $this->load->view("user/header");
      $this->parser->parse("user/viewParking",$data);
      $this->load->view("user/footer");
    }

    function addVehicles() {
      // pre($this->session->userdata())     ;
      $data["vehicles"]=$this->cm->userVehicles();
      $data["total"]=count($this->cm->userVehicles());
      $this->load->view("user/header");
      $this->parser->parse("user/add-vehicle-form",$data);
      $this->load->view("user/footer");
    }
    function checkout() {
   		// pre($this->session->userdata())     ;
      $data["vehicles"]=$this->cm->userVehicles();
   		$data["a"]=$this->cm->getPArkingDetails();
      $data["total"]=count($this->cm->userVehicles());
      $data["total_time"]=($this->cm->getTotalTime());
   		$data["fees"]=($this->cm->getCharges());
   		$this->load->view("user/header");
   		$this->parser->parse("user/checkout",$data);
   		$this->load->view("user/footer");
    }

    function viewVehicle()
    {
      redirect("User/index");
    }
    function addVehicle()
    {
      // vid
      // uid
      // v_name
      // v_brand
      // v_number
      // v_model
      // v_type
      // v_documents
      // comments
      // added_on
      $this->form_validation->set_rules("v_name","vehicle name","required");   
      $this->form_validation->set_rules("v_brand","vehicle brand","required");   
      $this->form_validation->set_rules("v_number","vehicle number or licence plate","required");   
      $this->form_validation->set_rules("v_model","vehicle model or company","required");   
      $this->form_validation->set_rules("v_type","vehicle type 4 wheeler or 2 wheeler","required");   
      $this->form_validation->set_rules("comments","any other information ","required");   
      if($this->form_validation->run()===FALSE)
      {
        $this->addVehicles();
      }
      else
      {
          $config['upload_path']          = './vehicles-photo/';
          $config['allowed_types']        = 'gif|jpg|png|psd|cdr';
          $config['max_size']             = 10000;
          $config['max_width']            = 10241;
          $config['max_height']           = 7681;
          $this->load->library('upload', $config);
          $this->upload->do_upload('v_documents');
          $a=$this->upload->data();
          $data=$this->input->post();
          $data["v_documents"]=$a["file_name"];
          $data["uid"]=$this->session->userdata("id");
          // pre($a);
        
          $this->session->set_flashdata("msg","Vehicle Added");
          redirect("User/addVehicles");

      }
    }

    function addParking()
    {
      // pre($_POST);
      $a['vid']=$this->input->post("vid");
      $a['r']=$this->input->post("row");
      $a['c']=$this->input->post("col");
      $a['comments']=$this->input->post("extra");
      $a['type_of_vehicle']=$this->input->post("type_of_vehicle");
      $a['uid']=$this->session->userdata("id");
      $a['status']="parked";
      $a['in_time']=date("Y-m-d h:i:s");
      $a['out_time']="";
      $a['date_of_parking']=date("Y-m-d");
      $r=$a["r"];
      $c=$a["c"];
      $vid=$this->input->post("vid");
      // $this->db->query("INSERT INTO `parking`( `uid`, `vid`, `r`, `c`, `in_time`, `out_time`, `date_of_parking`, `status`, `comments`, `type_of_vehicle`) VALUES ('$uid','$vid','$row','$col',now(),'',date(),'parked','$extra','$type_of_vehicle') "); }
      if($this->db->query("select * from parking where status='parked' and vid='$vid' ")->num_rows()==0)
      {
          $this->db->insert("parking",$a);
          $this->session->set_flashdata("msg","parked");
          redirect("User/viewParking");
      }
      else
      {
        $this->session->set_flashdata("msg","unable to park");
        redirect("User/viewParking");
      }
    }
    function checkoutProcess()
    {
      $a=$this->input->post();
      $data['pid']=$a["pid"];
      $data['uid']=$a["uid"];
      $data['vid']=$a["vid"];
      $data['r']=$a["r"];
      $data['c']=$a["c"];
      $data['in_time']=$a["in_time"];
      $data['out_time']=$a["out_time"];
      $data['date_of_parking']=$a["date_of_parking"];
      $data['status']=$a["status"];
      $data['comments']=$a["comments"];
      $data['type_of_vehicle']=$a["type_of_vehicle"];
      $data['total_time']=$a["total_time"];
      $data['charges']=$a["charges"];
      $data['extra']=$a["extra"];
      $data['payment']=$a["charges"];
      $this->db->where("pid",$a["pid"])->delete("parking");
      $this->db->insert("fees",$data);
      $this->session->set_flashdata("msg","payment successfull");
        redirect("User/history");

    }
    function history()
    {
        $data["a"]=$this->cm->userVehicles();
        // $data["b"]=$this->cm->userVehiclesHistory();
        $this->load->view("user/header");
        $this->parser->parse("user/history",$data);
        $this->load->view("user/footer");   
    }
    function viewHistory()
    {
        // $a=$this->cm->viewHistory();
        // $a=filterByVid($a);
        // pre($a);
        // exit;
        $data["a"]=$this->cm->viewHistory();
        
        $this->load->view("user/header");
        $this->parser->parse("user/viewhistory",$data);
        $this->load->view("user/footer");   
    }

    function parkedVehicle()
    {
            $this->load->view("user/header");
            $data["payment"]=$this->cm->userVehicles();
            $this->parser->parse("user/parkedVehicle",$data);
            $this->load->view("user/footer");

    }

    function logout()
    {
      $this->session->sess_destroy("userdata");
      redirect('Login/index');
    }
    function password()
    {
      $a=$this->db->where("id",$this->session->userdata("id"))->get("users")->result_array();
      $salt=$a[0]["salt"];
      $password=$this->encrypt->decode($a[0]["password"],$salt);
      $data["password"]=$password;
          $this->load->view("user/header");
          $this->parser->parse("user/password",$data);
          $this->load->view("user/footer");
    }
    function changePassword()
    {
        $this->form_validation->set_rules("salt","secret key","required|min_length[8]");
        $this->form_validation->set_rules("password","password","required|min_length[8]");
        $this->form_validation->set_error_delimiters("<div class='label label-danger'>","</div>");

        if($this->form_validation->run()===FALSE)
        {
            $this->password();
        }
        else
        {
                $data["salt"]=$this->input->post("salt");
                $data["password"]=$this->encrypt->encode($this->input->post("password"),$data["salt"]);
                $this->db->where("id",$this->session->userdata("id"))->update("users",$data);
                $this->session->set_flashdata("msg","password changed");
                redirect("User/password");
        }

    }
 

}
        
 ?>