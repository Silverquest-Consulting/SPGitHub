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


<h1> Enter your details</h1>	

<div class="container">
    <div class="row">
      <h3 class="page-header">Register Form</h3>
      <form action="#" method="POST" class="form-horizontal">
        <div class="form-group">
          <label for="username" class="sr-only">Username</label>
          <div class="col-md-12">
            <input type="text" name="username" placeholder="Username" class="form-control input-lg"/>
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="sr-only">Password</label>
          <div class="col-md-12">
            <input type="text" name="password" placeholder="Password" class="form-control input-lg"/>
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="sr-only">Fullname</label>
          <div class="col-md-12">
            <input type="text" name="fullname" placeholder="Fullname" class="form-control input-lg"/>
          </div>
        </div>
        <div class="form-group">
          <p class="col-md-3 col-md-offset-2">
            <button  id="register" name="register" class="btn btn-block btn-success btn-lg">Register</button>
          </p>
          <p class="col-md-3 col-md-offset-2">
            <button type="Reset" id="cancel" name="cancel" class="btn btn-block btn-info btn-lg">Cancel</button>
          </p>
          
        </div>
      </form>
    </div>
  </div>     
     

<?php /*echo '<pre>';
print_r($_POST);
echo '<pre>';*/?>

	
	
</body>
</html>