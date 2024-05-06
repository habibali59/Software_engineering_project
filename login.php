
<?php
session_start();
error_reporting(0);
require_once('include/config.php');
$msg = ""; 
if(isset($_POST['submit'])) {
  $email = trim($_POST['email']);
  $password = md5(($_POST['password']));
  if($email != "" && $password != "") {
    try {
      $query = "select id, F_name, L_name, email, password, role, creation from users where email=:email and password=:password";
      $stmt = $dbh->prepare($query);
      $stmt->bindParam('email', $email, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        /******************** Your code ***********************/
        $_SESSION['uid']   = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['F_name'];
       header("location: std_home.php");
      } else {
        $msg = "Invalid username and password!";
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    $msg = "Both fields are required!";
  }
}
?>	
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Gym Management System</title>
	<meta charset="UTF-8">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>


<style>
	body {
  background-color: #393e46; /* لون */
}

</style>

	
</head>
<body>


	                                                                              

	

	

	<!-- Pricing Section -->
	<section class="pricing-section spad">
	<center>
		<div class="container">
		
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					
				</div>
				
				<div class="col-lg-6 col-sm-6">
					
					<div class="pricing-item entermediate">
						<div style="background-color: #393e46;" class="pi-top">

						</div>
						<div   class="pi-price">
							<h3>User</h3>
							<p>Login</p>
						</div>
						 <?php if($error){?><div class="errorWrap" style="color:red;"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap" style="color:red;"><strong>Error</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

						<form class="singup-form contact-form" method="post">
						<div class="row">
							<div class="col-md-12">
								<input type="text" name="email" id="email" placeholder="Your Email" autocomplete="off" required>
							</div>
							<div class="col-md-12">
								<input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
							</div>
								
							
						</div>
						<div  class="row">
					<div  class="col-md-6">
					<input  type="submit" id="submit" name="submit" value="Login"  style="background-color: #393e46;" >
					</div>
					
<div  class="col-md-6">
	
<a href="registration.php">Registration</a>
					</div>
				</div>
				</center>
	
</form>
					</div>
				</div>
				<div  class="col-lg-3 col-sm-6">
					
				</div>
				
			</div>
		</div>
	</section>
		

	
	

	
	
	</body>
</html>
