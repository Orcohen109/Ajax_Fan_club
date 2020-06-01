<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Orly
 */
class Login_controller  extends CI_Controller {
    //put your code here
     public function __construct()
        {
                parent::__construct();
                $this->load->model('Login_model');
                $this->load->helper('url_helper');
                $this->load->helper('form');
                $this->load->library('session');
        }
            
        public function login()
        {        
                $data['title'] = 'Sign In';
                $data['user']=NULL;
                $this->load->view('templates/header', $data);
                $this->load->view('login_page/login', $data);
                $this->load->view('templates/footer');
                         
        }
         public function logout()
        {
             $data = array('User_name','Password');
             $this->session->unset_userdata($data);
             redirect("Login_controller/login");                        
        }
        
        public function auth(){
            $data = array(
               'User_name' => $this->input->post('user'),
               'Password' => md5($this->input->post('password'))
                
             );
            
            $check=$this->Login_model->auth($data);
            
           if ($check==false){
                $data['error']= array("message"=>"User is not found");
                $data['title'] = 'Sign In';
                $data['user'] = NULL;
                $this->load->view('templates/header', $data);
                $this->load->view('login_page/login', $data);
                $this->load->view('templates/footer');
            }
            else{
               $data['user'] = $check;
               $this->session->set_userdata($data);
               redirect("Pages_controller/home");
            }
        }
        public function register()
        {
                $data['title'] = 'Register';
                $data['user']=NULL;
                $this->load->view('templates/header', $data);
                $this->load->view('login_page/register', $data);
                $this->load->view('templates/footer');
                         
        }
        


        public function check($data)
       {
            $error ='';
            if($data['First_name'] == NULL)
            {
                 $error .= "you need to fill your first name properly"."<br>";
            }
            if (!preg_match("/^[a-zA-Z ]*$/",$data['First_name'])) 
            {
                $error .= "Only letters allowed in first name"."<br>";
            }
            if (!preg_match("/^[a-zA-Z ]*$/",$data['Last_name'])) 
            {
                $error .= "Only letters allowed in last name"."<br>";
            }
            if($data['Last_name'] == NULL)
            {
                $error .= " you need to fill your last name properly"."<br>";
            }    
             if($data['id'] == NULL)
            {
                $error .= " you need to fill your ID properly"."<br>";
            }
            if($data['Password'] != $data['Confirm_password'])
            {
                $error .= " your Password and Confirm Password are not match"."<br>";
            }
           if(!is_numeric($data['id']))
           {
               $error .= "Only numbers allowed in ID"."<br>";
           }
           
           if(!filter_var($data['Email'],FILTER_VALIDATE_EMAIL))
           {
               $error .= "Invalid email format"."<br>";
           }
           
           return $error;
        }

        public function save(){
            
            $data= array(
               'First_name' => $this->input->post('First_name'),
               'Last_name' => $this->input->post('Last_name'),
               'Email' => $this->input->post('Email'),
               'Password' => md5($this->input->post('Password')),
               'Confirm_password' => md5($this->input->post('Confirm_password')),
               'User_name' => $this->input->post('User_name'),
               'id' => $this->input->post('id'),
         );
            
           $error = $this->check($data);
           if($error == '')
           {
               $error_db = $this->Login_model->save($data);
               if($error_db==NULL){
                   $data['info']=array("message"=>"1");
               }
               else{
                    $data['info']=array("message"=> "Error. Registration faild: ".$error_db["message"] );
               }
               echo $data["info"]["message"];
           }
           else{
               echo $error;
           }
        }
           
           
           
       public function checkProduct($data)
       {
            $error ='';
            if($data['product_code'] == NULL)
            {
                 $error .= "יש צורך למלא את קוד המוצר"."<br>";
            }
              if($data['product_type'] == NULL)
            {
                 $error .= "יש צורך למלא את סוג המוצר"."<br>";
            }
              if($data['model'] == NULL)
            {
                 $error .= "יש צורך למלא את דגם המוצר"."<br>";
            }
              if($data['company'] == NULL)
            {
                 $error .= "יש צורך למלא את חברת המוצר"."<br>";
            }
              if($data['supplier'] == NULL)
            {
                 $error .= "יש צורך למלא את ספק המוצר"."<br>";
            }
              if($data['price_per_unit'] == NULL)
            {
                 $error .= "יש צורך למלא את מחיר המוצר"."<br>";
            }
              if($data['number_of_units_in_stock'] == NULL)
            {
                 $error .= "יש צורך למלא את מספר היחידות במלאי"."<br>";
            }
              if($data['retail_Price'] == NULL)
            {
                 $error .= "יש צורך למלא את מחיר המוצר לצרכן"."<br>";
            }       
              if (!preg_match("/^[a-zA-Zא-ת ]*$/",$data['product_type'])) 
            {
                 $error .= "סוג המוצר מחוייב באותיות בלבד"."<br>";
            }
               if (!preg_match("/^[a-zA-Zא-ת ]*$/",$data['company'])) 
            {
                 $error .= "החברה מחוייבת באותיות בלבד"."<br>";
            }
               if (!preg_match("/^[a-zA-Zא-ת ]*$/",$data['supplier'])) 
            {
                 $error .= "הספק מחוייב באותיות בלבד"."<br>";
            }
               if(!is_numeric($data['product_code']))
            {
                 $error .= "קוד מוצר מחוייב במספרים בלבד"."<br>";
            }
               if(!is_numeric($data['price_per_unit']))
            {
                 $error .= "מחיר מוצר מחוייב במספרים בלבד"."<br>";
            }
               if(!is_numeric($data['number_of_units_in_stock']))
            {
                 $error .= "מספר היחידות במלאי מחוייב במספרים בלבד"."<br>";
            }
               if(!is_numeric($data['retail_Price']))
            {
                 $error .= "מחיר לצרכן מחוייב במספרים בלבד"."<br>";
            }
           
           return $error;
        }
         
                public function saveProduct(){
            
            $data= array(
               'product_code' => $this->input->post('product_code'),
               'product_type' => $this->input->post('product_type'),
               'model' => $this->input->post('model'),
               'company' => $this->input->post('company'),
               'supplier' => $this->input->post('supplier'),
               'price_per_unit' => $this->input->post('price_per_unit'),
               'number_of_units_in_stock' => $this->input->post('number_of_units_in_stock'),
               'retail_Price' => $this->input->post('retail_Price'),
         );
            
           $error = $this->checkProduct($data);
           if($error == '')
           {
               $error_db = $this->Login_model->saveProduct($data);
               if($error_db==NULL){
                   $data['info']=array("message"=>"1");
               }
               else{
                    $data['info']=array("message"=> "שגיאה בייצרת מוצר חדש אנא נסה שנית. ".$error_db["message"] );
               }
               echo $data["info"]["message"];
           }
           else{
               echo $error;
           }
           
           
        } 
}
