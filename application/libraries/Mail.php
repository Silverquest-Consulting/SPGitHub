<?php
class Mail{
	public function __construct(){
				//echo __FILE__;
	}

	public function eCard($params){

	/* echo '<pre>';
	print_r($_SESSION);
	echo '<pre>';	
		
	echo '<pre>';
	print_r($params);die('calldie');
	echo '<pre>'; */
		// require_once 'library/class.phpmailer.php';	//OLDER VERSION FROM ZENDVN
		require_once 'library/PHPMailerAutoload.php';	//NEWER VERSION FROM GITHUB
		$mail = new PHPMailer();
		
		// Gọi đến lớp SMTP
		$mail->IsSMTP();
		
		$mail->SMTPDebug	= false; 	// Hiển thị thông báo trong quá trình kết nối SMTP, 1 la hien thi , false la ko hien thi
		// 1 = Hiển thị message + error
		// 2 = Hiển thị message
		
		/* $mail->SMTPAuth		= true;
		$mail->SMTPSecure	= 'ssl';
		$mail->Host			= 'smtp.gmail.com';
		$mail->Port			= 465;
		$mail->Username		= 'tomtra2016@gmail.com';	
		$mail->Password		= 'yeulam1@3'; */

		$mail->SMTPAuth		= true;
		$mail->SMTPSecure	= 'tls';
		$mail->Host			= 'smtp.office365.com';
		$mail->Port			= 587;
		$mail->Username		= 'giftcatalogue@samaritanspurse.org.au';
		$mail->Password		= 'Huva1427';

		
		// Thiết lập thông tin người gửi và email người gửi
		$mail->SetFrom('giftcatalogue@samaritanspurse.org.au', 'Samaritans Purse');
		
		// Thiết lập thông tin người nhận và email người nhận
		//$mail->AddAddress('thaitoan@yahoo.com', 'Tom');
		$mail->AddAddress($_SESSION['user_message']['recipient-email'], $_SESSION['user_message']['recipient-email']);
		

		// Thiết lập email BCC
		
	//	$mail->AddBCC('giftcatalogue@samaritanspurse.org.au');	// Ecard might not need to BCC to SP Email, this could be removed
		$mail->AddBCC($_SESSION['user_email']);	// Email Ecard back to donator 
		
		// Thiết lập email reply
		//$mail->AddReplyTo('lanluu@worldprovn.com');
		$mail->AddReplyTo('giftcatalogue@samaritanspurse.org.au');
		
		// Đính kèm tập tin
		//$mail->AddAttachment('Xmas.jpg');
		
		// Thiết lập tiêu đề
		$mail->Subject = "Samaritans Purse - ECard";
		
		// Thiết lập charset
		$mail->CharSet = 'utf-8';
		
		// Thiết lập nội dung
		//$body		= "Khóa học lập trình web với <b>PHP - ZendVN</b>";
		 
		$msg2 = $_SESSION['user_message']['recipient-message'];
		$msg2 = '<pre style="background-color:#E41C26;color:white;text-align:center;white-space: pre-line">'.$msg2.'</pre>';
		
		if($_SESSION['user_message']['card'] == "xmas"){
			$body  = '<table class="table">
						<thead>
							<tr>
								<th>&nbsp;</th>
								
							</tr>
						</thead>
						<tbody>
								
									
								<tr>
									<td>
											<div class="main" style="background-color:#E41C26;margin-bottom:15px"><img src="'.base_url().'bootstrap/img/xmas_header.png" width="100%" height="200px">'.$msg2.'<img src="'.base_url().'bootstrap/img/xmas_footer.png" width="100%" height="200px"></div>
									</td>
									
								
								</tr>	
								</tbody>
								</table>';
								
								
						
			//$body  = '<div class="main" style="background-color:#E41C26;margin-bottom:15px"><img src="http://tomtran.byethost12.com/xmas_header.png" width="100%" height="200px">'.$msg2.'<img src="http://tomtran.byethost12.com/xmas_footer.png" width="100%" height="200px"></div>';
		}else{
			$body  = '<table class="table">
						<thead>
							<tr>
								<th>&nbsp;</th>
								
							</tr>
						</thead>
						<tbody>
								
									
								<tr>
									<td><div class="main" style="background-color:#E41C26;margin-bottom:15px"><img src="'.base_url().'bootstrap/img/generic_header.png" width="100%" height="200px">'.$msg2.'<img src="'.base_url().'bootstrap/img/generic_footer.png" width="100%" height="200px"></div>
									</td>
									
								
								</tr>	
								</tbody>
								</table>';		
			//$body  = '<div class="main" style="background-color:#E41C26;margin-bottom:15px"><img src="http://tomtran.byethost12.com/generic_header.png" width="100%" height="200px">'.$msg2.'<img src="http://tomtran.byethost12.com/generic_footer.png" width="100%" height="200px"></div>';
		}
		$body .= '<table class="table">
						<thead>
							<tr>
								<th>&nbsp;</th>
								
							</tr>
						</thead>
						<tbody>
								
									
								<tr>
									<td>
											'.$params['gift_info'].'
									</td>
									
								
								</tr>	
								</tbody>
								</table>';
		$body = '<!DOCTYPE html>
				<html lang="en">
				<head>
				<meta charset="utf-8">
				
				
				<style>
				
				.table{
					width: 600px;
				}
								
				.pic1_des, .pic2_des, .pic3_des {
					margin-bottom: 10px;
				}
				
				</style>
				</head>
				
				<body><div style="text-align:center; width:600px;margin:0px auto">' . $body.'</div><br><br></body></html>';
		//echo $params['gift_info']; die('called die');
		//echo $body; die('called die');
		
		//$mail->Body = $body;
		
		
		$mail->MsgHTML($body);
		
		if($mail->Send() == false){
			echo 'Error: ' . $mail->ErrorInfo;
		} else{
			echo 'Success';
		}
	}
	
	public function eReceipt($params){
	
		
		
		echo '<pre>';
		 print_r($_SESSION);
		echo '<pre>';
	
		echo '<pre>';
		print_r($params);
		echo '<pre>';
		
		/* foreach ($_SESSION['user_shopping'] as $key => $val){
			$t='';
			if($key == 'Chirsmas' || $key == 'Journey' || $key == 'Church'){
				foreach($_SESSION['user_shopping'][$key] as $k =>$val){
					echo $k .'<br> ';
					echo ' '. $val;
				}
			}
		} */
		//unset($_SESSION['user_shopping']['subTotal']);
		$tax = array();
		
			if(key_exists('tax', $_SESSION['user_shopping'])){
				foreach($_SESSION['user_shopping']['tax'] as $key => $val){
					$tax[$key] = $val;
				}
			}
		echo '<pre>';
		print_r($tax);
		echo '<pre>';
		
		$taxHtml='';
		$taxSum = array();
		foreach($tax as $key => $val){
			$taxHtml .= '<tr>
							<td>'.$val['item_name'].'</td>
							<td>'.$val['item_Qty'].'</td>
							<td>$'.$val['item_price'].'</td>
							<td class="right">$'.$val['item_sub'].'</td>
						</tr>';
			$taxSum[] = $val['item_sub']; // Lay subtotal cho tax-deductible	
			$Sum = array_sum($taxSum);	
		}
		
		if($Sum != 0){$Sum = $Sum;}else{$Sum = '0';}
		
		$nontax = array();
		
			if(key_exists('nontax', $_SESSION['user_shopping'])){
				foreach($_SESSION['user_shopping']['nontax'] as $key => $val){
					$nontax[$key] = $val;
				}
			}
		echo '<pre>';
		print_r($nontax);
		echo '<pre>';
		
		$nontaxHtml='';
		foreach($nontax as $key => $val){
			$nontaxHtml .= '<tr>
							<td>'.$val['item_name'].'</td>
							<td>'.$val['item_Qty'].'</td>
							<td>$'.$val['item_price'].'</td>
							<td class="right">$'.$val['item_sub'].'</td>
						</tr>';
		
				
		}
		
		//echo $taxHtml;
		
		//die('calldie');
		// require_once 'library/class.phpmailer.php';	//OLDER VERSION FROM ZENDVN
		require_once 'library/PHPMailerAutoload.php';	//NEWER VERSION FROM GITHUB
		$mail = new PHPMailer();
		
		// Gọi đến lớp SMTP
		$mail->IsSMTP();
		
		$mail->SMTPDebug	= false; 	// Hiển thị thông báo trong quá trình kết nối SMTP, 1 la hien thi , false la ko hien thi
		// 1 = Hiển thị message + error
		// 2 = Hiển thị message
		
		/* $mail->SMTPAuth		= true;
		$mail->SMTPSecure	= 'ssl';
		$mail->Host			= 'smtp.gmail.com';
		$mail->Port			= 465;
		$mail->Username		= 'tomtra2016@gmail.com';	
		$mail->Password		= 'yeulam1@3'; */

		$mail->SMTPAuth		= true;
		$mail->SMTPSecure	= 'tls';
		$mail->Host			= 'smtp.office365.com';
		$mail->Port			= 587;
		$mail->Username		= 'giftcatalogue@samaritanspurse.org.au';
		$mail->Password		= 'Huva1427';

		
		// Thiết lập thông tin người gửi và email người gửi
		$mail->SetFrom('giftcatalogue@samaritanspurse.org.au', 'Samaritans Purse');
	
		// Thiết lập thông tin người nhận và email người nhận
		//$mail->AddAddress('thaitoan@yahoo.com', 'Tom');
		$mail->AddAddress($params['card']['POST']['user_email'], $params['card']['POST']['user_firstname']);
		
		// Thiết lập email BCC
		
		$mail->AddBCC('giftcatalogue@samaritanspurse.org.au');
		
		// Thiết lập email reply
		//$mail->AddReplyTo('lanluu@worldprovn.com');
		$mail->AddReplyTo('giftcatalogue@samaritanspurse.org.au');
	
		// Đính kèm tập tin
		//$mail->AddAttachment('Xmas.jpg');
	
		// Thiết lập tiêu đề
		$mail->Subject = "Samaritans Purse - Receipt";
	
		// Thiết lập charset
		$mail->CharSet = 'utf-8';
	
		// Thiết lập nội dung
		//$body		= "Khóa học lập trình web với <b>PHP - ZendVN</b>";
			
	
		$body = '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<style>
body{
	font-size:18px;
}

.right{
	text-align:right;
}

				
.table{
	width: 600px;
}

.table > thead > tr > th {
   // vertical-align: bottom;
  //  border-bottom: 2px solid #dddddd;
}

th {
    text-align: left;
}



.footer {
	text-align: left;
}

</style>
</head>

<body>
<div style="text-align:center;width: 600px; margin:0px auto">	

	<table class="table">
						<thead>
							<tr>
								<th>&nbsp;</th>
								
							</tr>
						</thead>
						<tbody>
								
									
								<tr>
									<td><img src="'.base_url().'bootstrap/img/Header/LogoHeader.jpg" width="600px" height="125px"><br/>
									    <img src="'.base_url().'bootstrap/img/Header/LogoHeader1.jpg" width="600px" height="80px"><br/>
									 </td>
								
								</tr>	
								
								
								
						</tbody>
					</table>
			
		<table class="table" style="text-align:left;">
						<thead>
							<tr>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
								
									
								<tr>
									<td><p style="text-decoration: underline;">Gift Catalogue Receipt</p></td>
									<td><p>ABN 84 070 722 404</p></td>    		
									 		
																
								</tr>	
									    		
								<tr>
									<td><p ><span style="font-weight:bold; text-align:left">Receipt Number: </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$params['card']['Order_Number'].'</p></td>
									<td><p ><span style="font-weight:bold">Date: </span> '.$params['card']['Transaction_Date'].'</p></td> 
								</tr>
								
								<tr>
									<td><p ><span style="font-weight:bold">Receipt Name: </span>  &nbsp;'.$params['card']['POST']['user_firstname'].' '.$params['card']['POST']['user_lastname']. '</p> </td> 
								</tr>
								
								
								
						</tbody>
		</table>	
	
	<br>';
		if(!empty($taxHtml)){
			$body = $body .'
		<table class="table" style="text-align:left">
						<thead>
							<tr>
								<th>&nbsp;</th>
								
							</tr>
						</thead>
						<tbody>
								
									
								<tr>
									<td><p style="text-align:left"><b>Tax deductible for Australian taxpayers</b></p> </td>
								
								</tr>	
								
								
								
						</tbody>
		</table>		
		
		<br>
				
		
			<table class="table" style="width:600px;text-align:left">
				<thead>
					<tr>
						<th>Gift</th>
						<th>QTY</th>
						<th>Amount</th>
						<th class="right">Total</th>
					</tr>
				</thead>
					
				<tbody>'. $taxHtml .'
				</tbody>
			</table>';
		}
		
		if(!empty($nontaxHtml)){
			$body = $body.'

		<table class="table" >
						<thead>
							<tr>
								<th>&nbsp;</th>
								
							</tr>
						</thead>
						<tbody>
								
									
								<tr>
									<td>	<p style="text-align:left"><b>Non tax deductible</b></p>
									 </td>
								
								</tr>	
								
								
								
						</tbody>
		</table>		
				
		
	
		<br>
			<table class="table" style="width:600px;text-align:left">
				<thead>
					<tr>
						<th>Gift</th>
						<th>QTY</th>
						<th>Amount</th>
						<th class="right">Total</th>
					</tr>
				</thead>
					
				<tbody>' . $nontaxHtml .'
				</tbody>
			</table>';
		}
			
			$body = $body.'

			<table class="table" style="width:600px;text-align:left">	
				<thead>						
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>	
				</thead>

				<tbody>
					<tr>
						<td><b>Total</b></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td class="right"><b>$'.$_SESSION['user_shopping']['subTotal'].'</b></td>
					</tr>	
								
					<tr>
						<td><b>Total tax deductible</b></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td class="right"><b>$'.$Sum.'</b></td>
					</tr>						
				</tbody>
			
		</table>
		
		
			<table class="table" style="text-align:center;">
						<thead>
							<tr>
								<th>&nbsp;</th>
								
							</tr>
						</thead>
						<tbody>
								
									
								<tr>
									<td><p>donations@samaritanspurse.org.au  |  Ph: 1300 884 468 |  PO Box 346, Penrith NSW 2751  |   www.samaritanspurse.org.au</p>
									 </td>
								
								</tr>	
								
								
								
						</tbody>
					</table>
			
</div>	<br><br>	
</body>
</html>';		
		
		
		$mail->MsgHTML($body);
	
		if($mail->Send() == false){
			echo 'Error: ' . $mail->ErrorInfo;
		} else{
			echo 'Success';
		}
	}
	
	public function eReport($from,$to){
		
		
		require_once 'library/PHPMailerAutoload.php';	//NEWER VERSION FROM GITHUB
		$mail = new PHPMailer();
	
		// Gọi đến lớp SMTP
		$mail->IsSMTP();
	
		$mail->SMTPDebug	= false; 	// Hiển thị thông báo trong quá trình kết nối SMTP, 1 la hien thi , false la ko hien thi
		// 1 = Hiển thị message + error
		// 2 = Hiển thị message
	
		/* $mail->SMTPAuth		= true;
			$mail->SMTPSecure	= 'ssl';
		$mail->Host			= 'smtp.gmail.com';
		$mail->Port			= 465;
		$mail->Username		= 'tomtra2016@gmail.com';
		$mail->Password		= 'yeulam1@3'; */
	
		$mail->SMTPAuth		= true;
		$mail->SMTPSecure	= 'tls';
		$mail->Host			= 'smtp.office365.com';
		$mail->Port			= 587;
		$mail->Username		= 'giftcatalogue@samaritanspurse.org.au';
		$mail->Password		= 'Huva1427';
	
	
		// Thiết lập thông tin người gửi và email người gửi
		$mail->SetFrom('giftcatalogue@samaritanspurse.org.au', 'Samaritans Purse');
	
		// Thiết lập thông tin người nhận và email người nhận
		$mail->AddAddress($_SESSION['admin'], 'Admin');
		//$mail->AddAddress($params['card']['POST']['user_email'], $params['card']['POST']['user_firstname']);
	
		// Thiết lập email BCC
	
		$mail->AddBCC('giftcatalogue@samaritanspurse.org.au');
	
		// Thiết lập email reply
		//$mail->AddReplyTo('lanluu@worldprovn.com');
		$mail->AddReplyTo('giftcatalogue@samaritanspurse.org.au');
	
		// Đính kèm tập tin
		$mail->AddAttachment('log/SP_'.$from.'_'.$to.'.csv');
	
		// Thiết lập tiêu đề
		$mail->Subject = "Samaritans Purse - Report";
	
		// Thiết lập charset
		$mail->CharSet = 'utf-8';
	
		// Thiết lập nội dung
		$body		= "Samaritans Purse CVS report <br/>";
		
	
	
		$mail->MsgHTML($body);
	
		if($mail->Send() == false){
			echo 'Error: ' . $mail->ErrorInfo;
		} else{
			echo 'Success';
		}
	}
}
?>