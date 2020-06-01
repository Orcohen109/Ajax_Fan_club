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
class Manager_model extends CI_Model
{

      public function __construct()
     {
                parent::__construct();
                $this->load->database();
     }
      public function get_game()
      {
            $query = $this->db->query('SELECT * FROM `games`');
            return $query->result_array();         
      }
 
        public function set_game() 
        {
            $this->db->db_debug = FALSE; //disable debugging for queries
             $data = array('game_date' => $this->input->post('game_date'),
                'beginning_time' => $this->input->post('beginning_time'),
                'stadium' => $this->input->post('stadium'),
                'opponent' => $this->input->post('opponent'),
                'competitions' => $this->input->post('competitions'),
                'refree' => $this->input->post('refree'),);

            $error=NULL;
            if (!$this->db->insert('games', $data))
                {
                $error=$this->db->error();
                }
            
            return $error;   
        }
             public function get_ticket()
      {
            $query = $this->db->query('SELECT * FROM `tickets`');
            return $query->result_array();         
      } 
        public function set_ticket() 
        {
            $this->db->db_debug = FALSE; //disable debugging for queries
             $data = array('game_date' => $this->input->post('game_date'),
                'sales_open' => $this->input->post('sales_open'),
                'price' => $this->input->post('price'),
                 'gate' => $this->input->post('gate'),);

            $error=NULL;
            if (!$this->db->insert('tickets', $data))
                {
                $error=$this->db->error();
                }
            
            return $error;   
        }
   
}