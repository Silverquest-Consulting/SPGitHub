<?php



class Samp extends CI_Controller{ 
    public function __construct(){ 
        parent::__construct(); 
      
    } 
    public function index(){ 
      
    	  
         // Send data to View
       // $this->load->Model("Mdata");
      //  $data=$this->Mdata->listall();
      
        //$result['product'] = $data;
        $this->load->view("samp_view"); 
        
        
    } 
    public function hocphp(){ 
        //echo "<h3>Hoc PHP Tai QHOnline.Info</h3>"; 
    } 
}