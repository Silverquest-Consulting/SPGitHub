<?php



class Donation extends CI_Controller{ 
    public function __construct(){ 
        parent::__construct(); 
        $this->load->library("session");	//LOAD SESSION if cart.php redirect to donation_view can see Session, session_start NO NEED
      
    } 
    public function index(){ 
      
    	 $catID = $_REQUEST['catID'];
         // Send catID to Data
        $this->load->Model("Mdata");
        $data=$this->Mdata->getItem($catID);

        
        $result['item'] = $data;
        
        // If user paid, direct him to controller ecard
        if(isset($_SESSION['paid'])){
        	redirect('ecard');
        
        }
        
        $this->load->view("donation_view", $result); 
        
        
    } 
    public function hocphp(){ 
        echo "<h3>Hoc PHP Tai QHOnline.Info</h3>"; 
    } 
}