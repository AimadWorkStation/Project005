<?php 
	
	//checking the methode of request
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);

		$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
		
		$phone = filter_var($_POST['phone'],FILTER_VALIDATE_INT);
		
		$msg =  filter_var($_POST['msg'],FILTER_SANITIZE_STRING);
		

		// echo $username .'<br>';
		// echo $email .'<br>';
		// echo $phone .'<br>';
		// echo $msg .'<br>';


		//errors
		$errors = array();
		if(strlen($username) <= 3){
			array_push($errors,"username must be more then <strong>4 characters </strong>!!");
			 
		}
		if (strlen($msg) < 10) {
			array_push($errors,"message can't be less then 10 characters");
		}

		//if no error send the mail
		// syntax mail(to,subject,Message,Headers,parameters)
		$headers = 'From : '. $email . '\r\n';
		$PersonnalEmail = 'nextG@localhost';
		if(empty($errors)){

			mail($PersonnalEmail,'contact From : '.$email . ' Name : '.$username,$msg ,$headers);

			$username = '';
			$email = '';
			$phone = '';
			$msg = '';
			$success = "<div class='alert alert-success' role='alert'>
					  <strong>Well done!</strong> You successfully send us message</a>.
					</div>";

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
			<?php	}  ?>	
			<?php if(isset($success)){
				echo $success;
			} ?>
			<input class="form-control" type="text" name="username" placeholder="user name : " value="<?php if(isset($username)){ echo $username;} ?> " required>
			<i class="fa fa-user fa-fw"></i>
			<input class="form-control" type="email" name="email" placeholder="type Email : " value="<?php if(isset($email)){ echo $email;} ?> " required>
			<i class="fa fa-envelope fa-fw"></i>
			<input class="form-control" type="phone" name="phone" placeholder="Type your phone number : " value="<?php if(isset($phone)){ echo $phone;} ?> ">
			<i class="fa fa-phone fa-fw"></i>
			<textarea class="form-control" name="msg" required>
				<?php if(isset($msg)){ echo trim($msg);} ?>
			</textarea>
			<input class="btn btn-success" type="submit" value="send">
			<i class="fa fa-send fa-fw"></i>
		</form>


	</div>
	
	<!-- end form -->

	
	
	<!-- jquery labrery file -->

	<script src="js/jquery-3.2.1.min.js"></script>
	<!-- positioning labrery -->
	<script src="js/popper.min.js"></script>
	<script src='js/bootstrap.min.js'></script>
	<script src='js/main1.js'></script>

</body>
</html>