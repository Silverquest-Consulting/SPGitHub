<?php



class Register extends CI_Controller{ 
    public function __construct(){ 
        parent::__construct(); 
      
    } 
    public function index(){ 
              
          $this->load->view("register_view"); 

         unset($_POST['register']);
         
         if(!empty($_POST)){

                $data['hi'] = $_POST;
                $this->load->Model("Mdata");
                $this->Mdata->insert_user($data);
        }
    } 
    public function hocphp(){ 
        //echo "<h3>Hoc PHP Tai QHOnline.Info</h3>"; 
    } 
}