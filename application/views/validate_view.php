<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Register</title>
	
	
	<link href='http://fonts.googleapis.com/css?family=Lato|Open+Sans' rel='stylesheet' type='text/css'>

	<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>bootstrap/css/style.css" rel="stylesheet">
	<script src="<?php echo base_url();?>bootstrap/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>
	
    
</head>
<body>


<h1> Javascript - Form and Validate</h1>	

<div class="container">
    <div class="row">
      <h3 class="page-header">Register Form</h3>
      <form action="#" method="POST" class="form-horizontal" name="myForm" id="myForm">
        <div class="form-group">
          <label for="username" class="sr-only">FirstName</label>
          <div class="col-md-12">
            <input type="text" name="firstname" placeholder="FirstName" class="form-control input-lg"/>
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="sr-only">Lastname</label>
          <div class="col-md-12">
            <input type="text" name="lastname" placeholder="Lastname" class="form-control input-lg"/>
          </div>
        </div>
        <div class="form-group">
          
          <!-- ///SelectBox/// -->
            Date Of Birth:
<select id="month" name="month">
<option value="na">Month</option>
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>

<select id="day" name="day">
<option value="na">Day</option>
<?php 
  for($i=1; $i<=31; $i++){
    echo '<option value="'.$i.'">'.$i.'</option>';
  }
?>

</select>

<select id="year" name="year">
<option value="na">Year</option>
<?php 
  for($i=1980; $i<=2016; $i++){
    echo '<option value="'.$i.'">'.$i.'</option>';
  }
?>

</select> 

</div> <!-- Close of Selectbox -->

        <div class="form-group">
          <p class="col-md-3 col-md-offset-2">
            <button type="button" id="register" name="register" class="btn btn-block btn-success btn-lg">Register</button>
          </p>
          <p class="col-md-3 col-md-offset-2">
            <button type="Reset" id="cancel" name="cancel" class="btn btn-block btn-info btn-lg">Cancel</button>
          </p>
          
        </div>
      </form>
    </div>
  </div>     
 
  

<div id="info">

</div>


<script src="<?php echo base_url();?>bootstrap/js/myJquery.js"></script>	
</body>
</html>