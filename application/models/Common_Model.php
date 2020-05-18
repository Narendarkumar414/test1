<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_Model extends CI_Model {
      function userVehicles()
      {
         $uid=$this->session->userdata("id");
         return $this->db->where("uid",$uid)->get("vehicles")->result_array();
      }    	
   	function getPArkingDetails()
      {
         $pid=$this->uri->segment(3,0);
         return $this->db->query("select * from parking where pid=$pid")->result_array();

      }  
      function getTotalTime()
      {
         $pid=$this->uri->segment(3,0);
         $a= $this->db->query(" select (hour(now())-hour(in_time)) + ceil(abs(minute(now())-minute(in_time))/60) as tt from parking where pid=$pid")->result_array();
         if(count($a)>0)
         {
            return $a[0]["tt"];
         }
         else 
         {
            return "na";
         }


      }  
      function getCharges()
   	{
         $charge=10;
   		$pid=$this->uri->segment(3,0);
   		$a= $this->db->query(" select (hour(now())-hour(in_time)) + ceil(abs(minute(now())-minute(in_time))/60)*$charge as fees from parking where pid=$pid")->result_array();

         if(count($a)>0)
         {
            return $a[0]["fees"];
         }
         else 
         {
            return "na";
         }
         
   	}	
      function viewHistory()
      {
         $uid=$this->session->userdata("id");
         $vid=$this->uri->segment(3,0);
          return $this->db->query("select *,(select v_documents from vehicles where v_number=fees.vid)as image from fees where uid=$uid and vid=$vid")->result_array();        
      }


}
        
 ?>