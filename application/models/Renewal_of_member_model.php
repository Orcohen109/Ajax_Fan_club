<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Renewal_of_member_model
 *
 * @author Or
 */
class Renewal_of_member_model extends CI_Model 
{
     public function __construct()
     {
                parent::__construct();
                $this->load->database();
     }
    public function get_expiry_date($info)
    {
         $chack = $this->db->query("SELECT id FROM members WHERE id='".$info['user'][0]['id']."'");
         if($chack->result_array() != null)
         {
               $query = $this->db->query("SELECT members.id, members.first_name, members.last_name, MAX(member_number), gate, registeration_date, expiry_date, typeOption, seat, email FROM members INNER JOIN users ON members.id = users.id WHERE members.id ='".$info['user'][0]['id']."'");
                 if($query)
                {   
                      return $query->result_array();
                }
         }
         return FALSE;
    }
    
}
