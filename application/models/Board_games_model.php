<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Board_games_model
 *
 * @author Or
 */
class Board_games_model extends CI_Model

{
     public function __construct()
     {
                parent::__construct();
                $this->load->database();
     }
     
         public function chart()
     {
         $query = $this->db->query("select count(game_date) ,competitions from games GROUP by competitions");
             if($query){   
                return $query->result_array();
        }
        return false;           
      }
          

//put your code here
}
