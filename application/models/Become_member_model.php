<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Products
 *
 * @author Or
 */
class Become_member_model extends CI_Model
{

      public function __construct()
     {
                parent::__construct();
                $this->load->database();
     }
      public function get_member()
      {
            $query = $this->db->query('SELECT * FROM `members`');
            return $query->result_array();         
      }
 
        public function set_member() 
        {
            $this->db->db_debug = FALSE; //disable debugging for queries
             $data = array('id' => $this->input->post('id'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'gate' => $this->input->post('gate'),
                'registeration_date' => $this->input->post('registeration_date'),
                'expiry_date' =>$this->input->post('expiry_date'),
                'typeOption' =>$this->input->post('typeOption'),
                'seat' =>$this->input->post('seat'),
               );

            $error=NULL;
            if (!$this->db->insert('members', $data))
                {
                $error=$this->db->error();
                }
            
            return $error;   
        }
    
}