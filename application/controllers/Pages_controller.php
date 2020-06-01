<?php
class Pages_controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Renewal_of_member_model');
                $this->load->model('Board_games_model');
                $this->load->model('Login_model');
                $this->load->model('Manager_model');
                $this->load->model('Become_member_model');
                $this->load->helper('url_helper');
                $this->load->helper('html');
                $this->load->helper('form');
                $this->load->library('session');
        }
            
        public function view($page = 'home')
        {
             if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
            {
                    // Whoops, we don't have a page for that!
                    show_404();
            }
            $data['title'] = ucfirst($page); // Capitalize the first letter

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
        }
         public function about_us()
        {        
                $data['title'] = 'About us';
                $data['user'] = $this->session->all_userdata();
                $this->load->view('templates/header', $data);
                $this->load->view('pages/about', $data);
                $this->load->view('templates/footer');
                         
        }
        public function home()
        {        
                $user=$this->session->all_userdata();
                if(isset($_SESSION['user'])){
                    $data['info'] = $this->check_date($user);
                }
                else{
                    $data['info'] =null;
                }
                $data['title'] = 'Home Page'; 
                $data['user'] = $this->session->all_userdata();
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home', $data);
                $this->load->view('templates/footer');          
        }
        public function check_date($user){
            $last_member=$this->Renewal_of_member_model->get_expiry_date($user);
            if($this->Renewal_of_member_model->get_expiry_date($user) == false)
            {
                return NULL;
            }
            $last_member_exp_date=$last_member[0]['expiry_date'];
            date_default_timezone_set('Asia/Calcutta');
            $curDate=date("Y-m-d");
            return (strtotime($last_member_exp_date)-strtotime($curDate))/86400;
            
        }
        public function Board_games()
        {       $data['chart'] = $this->Board_games_model->chart();
                $data['games'] = $this->Manager_model->get_game();  
                $data['title'] = 'games board';
                $data['title2'] = 'competitions statistics'; 
                $data['user'] = $this->session->all_userdata();
                $this->load->view('templates/header', $data);
                $this->load->view('pages/board_games', $data);
                $this->load->view('templates/footer');          
        }
        public function manager()
        {  

                $data['title'] = 'Manager Page'; 
                $data['title2'] = 'Members'; 
                $data['title3'] = 'Tickets'; 
                $data['info']=NULL;
                $data['games'] = $this->Manager_model->get_game();  
                $data['ticket'] = $this->Manager_model->get_ticket();
                $data['member'] = $this->Become_member_model->get_member();
                $data['user'] = $this->session->all_userdata();
                $this->load->view('templates/header', $data);
                $this->load->view('pages/manager', $data);
                $this->load->view('templates/footer');          
        }
        
        public function become_member()
        {
            $data['title'] = 'Want to become a member? fill up your details';
            $data['title2'] = 'Payment';   
            $data['message1'] = 'The members price is: 700';
            $data['info']=NULL;
            $data['user'] = $this->session->all_userdata();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/become_member',$data);
            $this->load->view('templates/footer');     
        }
        public function order_tickets(){
            
            $data['title'] = 'TICKETS';
            $data['title1'] = 'Find games for your vacation';  
            $data['user'] = $this->session->all_userdata();
            $data['ticket'] = $this->Manager_model->get_ticket();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/order_tickets',$data);
            $this->load->view('templates/footer');   
            
        }
        public function renew_member()
        {
            $user=$this->session->all_userdata();
                if(isset($_SESSION['user'])){
                    $data['lastmembership'] = $this->Renewal_of_member_model->get_expiry_date($user);
                }
                else{
                    $data['lastmembership'] =null;
                }
            $data['title'] = 'renew your membership';
            $data['title2']= 'your last details was';
            $data['user'] = $this->session->all_userdata();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/renew_member',$data);
            $this->load->view('templates/footer');
        }

        public function insert_game(){
             
           $info=$this->Manager_model->set_game();
            print_r($info);
            if ($info==NULL){
                    $data['info']=array("message"=>"New game was created");
             }
             else{
                $data['info']= array("message"=>"Failed to save game.  Error:  ".$info["message"]);
           
             }
            $data['user'] = $this->session->all_userdata();
            $data['title'] = 'Manager Page'; 
            $data['title2'] = 'Members'; 
            $data['title3'] = 'Tickets'; 
            $data['games'] = $this->Manager_model->get_game();  
            $data['ticket'] = $this->Manager_model->get_ticket();
            $data['member'] = $this->Become_member_model->get_member();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/manager',$data);
            $this->load->view('templates/footer');
        }
        
         public function insert_member(){           
           $info=$this->Become_member_model->set_member();
            if ($info==NULL){
                $data['info']=array("message"=>"New member was created");
             }
             else{
                $data['info']= array("message"=>"You are already a member.  Error:");
           
             }
            $data['user'] = $this->session->all_userdata();
            $data['title'] = 'Want to become a member? fill up your details';
            $data['title2'] = 'Payment';   
            $data['message1'] = 'The members price is: 700';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/become_member',$data);
            $this->load->view('templates/footer');
            
        
        }
        public function showAPI()
        {
            $data['title'] = 'This is our API';
            $data['user'] = $this->session->all_userdata();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/API',$data);
            $this->load->view('templates/footer');
        }
  
         public function insert_ticket(){
             
           $info=$this->Manager_model->set_ticket();
            print_r($info);
            if ($info==NULL){
                    $data['info']=array("message"=>"New ticket was added");
             }
             else{
                $data['info']= array("message"=>"Failed to save ticket.  Error:  ".$info["message"]);
           
             }
            $data['user'] = $this->session->all_userdata();
            $data['title'] = 'Manager Page'; 
            $data['title2'] = 'Members'; 
            $data['title3'] = 'Tickets';
            $data['games'] = $this->Manager_model->get_game();  
            $data['ticket'] = $this->Manager_model->get_ticket();
            $data['member'] = $this->Become_member_model->get_member();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/manager',$data);
            $this->load->view('templates/footer');
        }

}