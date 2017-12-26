<?php 
	
	//checking the methode of request
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$username = $_POST['username'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$msg =  $_POST['msg'];
		
		//errors
		$errors = array();
		if(strlen($username) <= 3){
			array_push($errors,"username must be more then <strong>4 characters </strong>!!");
			 
		}
		if (strlen($msg) < 10) {
			array_push($errors,"message can't be less then 10 characters");
		}

	}

	

 ?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="NextG Orgaisation">
  	<meta name="keywords" content="marketing,busiess,designe,Plans,plan,web,devloppement,html,css,jquery">
  	<meta name="author" content="NextG AimadWorkShare">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Project005</title>
	<!-- script for LiveReload app to reloard web page direct by saving here -->
		<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>');</script>

	<!-- bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<!-- my css codes -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	
	<!-- start form -->

	<div class="container">
		

		<form class="myForm" action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
			<h3 class="text-center">Contact Us</h3>
			<?php if (isset($errors)) { ?>
				<div class="alert alert-warning" role="start">
					<?php
						foreach ($errors as $value) {
							echo $value .'<br/>';
						}
					?>
				</div>		
			<?php	}				
			 ?>	
			<input class="form-control" type="text" name="username" placeholder="user name : ">
			<i class="fa fa-user fa-fw"></i>
			<input class="form-control" type="email" name="email" placeholder="type Email : ">
			<i class="fa fa-envelope fa-fw"></i>
			<input class="form-control" type="phone" name="phone" placeholder="Type your phone number : ">
			<i class="fa fa-phone fa-fw"></i>
			<textarea class="form-control" name="msg">
				
			</textarea>
			<input class="btn btn-success" type="submit" value="Send">
			<i class="fa fa-send fa-fw"></i>
		</form>


	</div>
	
	<!-- end form -->

	
	
	<!-- jquery labrery file -->

	<script src="js/jquery-3.2.1.min.js"></script>
	<!-- positioning labrery -->
	<script src="js/popper.min.js"></script>
	<script src='js/plugins.js'></script>
</body>
</html>