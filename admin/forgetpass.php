<?php
	include '../lib/Session.php' ;
	Session::checkLogin();
?>

<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Format.php'; ?>
<?php
	$db = new Database();
	$fm = new Format();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Password Recover</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				$email = $fm->validation($_POST['email']);
				
				$email = mysqli_real_escape_string($db->link, $email);
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			 		//echo "Invalid Email address...!!!";
			 		echo "<span style='color: red;font-size: 18px;'>Invalid Email address...!!!</span>";
			 	}else{

			 		$mailquery = "select * from tbl_user WHERE email='$email' limit 1";
                    $mailcheck = $db->select($mailquery);

						if ($mailcheck != false){
							while ($value = $mailcheck->fetch_assoc()) {
								$userid   = $value['id'];
								$username = $value['username'];
							}

							$text = substr($email, 0, 3);
							$rand = rand(10000, 99999);
							$newpass = "$text$rand";
							$password = md5($newpass);
							$updatequery = "UPDATE tbl_user
                              SET
                              password = '$password'
                              WHERE id = $userid
                            ";
                    	$updated_row = $db->update($updatequery);
                   		$to       = "$email";
                    	$from     = "OriginativeCoders@gmail.com";
                    	$headers  = "Erom: $from\n";
                    	$headers .= 'MIME-Version: 1.0';
						$headers .= 'Content-type: text/html; charset=iso-8859-1'; 
						$subject  = "Your Password";
						$message  = "Your Username is ".$username." and Password is ".$newpass." Please Visit Website to login.";

                    	$sendmail = mail($to, $subject, $message, $headers);
                    		if($sendmail){
                    			echo "<span style='color: green;font-size: 18px;'>Please Check Your Email for new password...</span>";
                    		}else{
                    			echo "<span style='color: red;font-size: 18px;'>Email not sent...!!!</span>";
                    		}
					
						} else {
							echo "<span style='color: red;font-size: 18px;'>Email not Exist...!!!</span>";
					}
				}
			}
			
		?>
		<form action="" method="post">
			<h1>Password Recovery</h1>
			<div>
				<input type="text" placeholder="Enter Valied Email..." required="" name="email"/>
			</div>
			
			<div>
				<input type="submit" value="Sent mail" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Login</a>
		</div><!-- button -->
		<div class="button">
			<a href="#">arnab.ml</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>