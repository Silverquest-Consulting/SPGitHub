<?php



class Validate extends CI_Controller{ 
    public function __construct(){ 
        parent::__construct(); 
      
    } 
    public function index(){ 
              
          $this->load->view("validate_view"); 

        
    } 
    public function hocphp(){ 
        //echo "<h3>Hoc PHP Tai QHOnline.Info</h3>"; 
    } 
}