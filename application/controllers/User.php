<?php



class User extends CI_Controller{ 
    public function __construct(){ 
        parent::__construct(); 
        $this->load->Model("Mdata");
        $this->load->library("session");
    } 
    public function index(){ 
    	// If user paid, direct him to controller ecard
    	if(isset($_SESSION['paid'])){
    		redirect('ecard');
    	
    	}
             
          /* $this->load->view("user_view"); 
           unset($_POST['login']);
         
         if(!empty($_POST)){

                $data['user'] = $_POST;
                $this->load->Model("Mdata");
                $this->Mdata->login_user($data);
        }
         */
    	
    	//IF user already logged in, then redirect him if he try to go back to controller user
    	if(isset($_SESSION['user_email'])){
    		redirect('/billing');
    	}
    	
    	$this->load->view("user_view");
    } 
    
    public function checkEmail(){
    	$email = $_POST['email'];
    	$this->load->Model("Mdata");
    	$check = $this->Mdata->isExist_user($email);
    	echo $check;
    }
    
	public function register_user(){
    	/* echo '<pre>';
    	print_r($_POST);
    	echo '<pre>'; die('die is called'); */
    	
    	//Form register will submit to user/register_user
    	//First we isset $_POST['register'] if form is submitted
    	
    	if(isset($_POST['register'])){

    		// IF YES, form submit, firstly we call MODEL
    		$this->load->Model("Mdata");
    		
    		// Then we check user_email already exist in database, THOSE STEPS JUST VALIDATE IN CASE HACKER TURN OF JAVASCRIPT
    		$check = $this->Mdata->isExist_user( $_POST['register']['user_email']);
    		
    		// IF $check return 0 or false MEANING user not existed then we save to database
    		
    		if($check != 1){
	    		$data['userInfo'] = $_POST['register'];
	    		$result =$this->Mdata->insert_user($data);
	    		
	    		//After register successful, store user to $_SESSION
	    		$_SESSION['user_email']= $_POST['register']['user_email'];
	    		return $result;
    		}else{
    			echo 'user already existed';
    			redirect('/user');
    		} 
    	}
    	 
    }
    
    public function validate_user(){
    	// Be careful to turn off print_r() when doing AJAX
    	/* echo '<pre>';
    	 	print_r($_POST);
    	 	echo '<pre>';die(); */
    	
    	$data['user'] = $_POST;
    	$email = $_POST['username'];
    	$result =$this->Mdata->login_user($data);
    	
    	//echo $result;
    	$t= $_SERVER['SCRIPT_NAME'].'/billing';
    	 if($result == 1){
    	 	
    		//Save user_email and user_firstname into SESSION when User Login success
	    	 	$_SESSION['user_email']= $_POST['username'];
	    	 	
	    	 	$findN=$this->db->query("SELECT `user_firstname` FROM `user` WHERE `user_email` = '$email' ");
	    	 	$name = $findN->result_array();
	    	 	$_SESSION['user_firstname']= $name['0']['user_firstname'];
	    	//Save user_email and user_firstname into SESSION when User Login success
    	 	
    		// ... then redirect to Credit Card info
    		$data = array('pass'=>$result,'url'=> $t); 
    		echo json_encode($data);
    	}else{
    		$data = array('pass'=>0); 
    		echo json_encode($data);
    	}
    	
    	
    }
}