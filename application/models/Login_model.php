<?php

class Login_model extends CI_Model {
    //put your code here
     public function __construct()
     {
                parent::__construct();
                $this->load->database();
     }
     public function auth($data)
      {
            $query = $this->db->query("select * from users where User_name = '".$data['User_name']."' and Password ='".$data['Password']."'");
            if($query){   
                return $query->result_array();
        }
        return false;           
      }
        public function save($data){
              $this->db->db_debug = FALSE; //disable debugging for queries

             $error=NULL;
              if (!$this->db->insert('users', $data)){
                  $error=$this->db->error();
              }

              return $error;
        }
                public function saveProduct($data){
              $this->db->db_debug = FALSE; //disable debugging for queries

             $error=NULL;
              if (!$this->db->insert('products', $data)){
                  $error=$this->db->error();
              }

              return $error;
        }
        
        
    //put your code here
}
