<?php
// include_once 'Dbcon.php';
session_start();

$conn = new mysqli('localhost', 'root', '','cedhosting');
// include 'tbl_user.php';
// $user=new tbl_user();
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	// $data=$user->userLogin($email, $password);
	
	  $sql = "SELECT * FROM `tbl_user` WHERE  email='$email'";
	  $result = $conn->query($sql);
	
	  if ($result->num_rows > 0) {
	  
		  while($row = $result->fetch_assoc()) {
			  echo  $row["email"]. " - Name: ". $row["name"]. " " . $row["mobile"] ;
			  $_SESSION['name']=$row["name"];
			  $_SESSION['number']=$row["mobile"];
			  $_SESSION['password']=$row['password'];
			  $_SESSION['email']=$row['email'];
			  
			  if(($email=='jaiswalmallika0126@gmail.com')&&($password=='M@llika26')){
				header('location:admin/dashboard.php');
			  }
			  else{
				if(($email==$row["email"])&&($password==$row["password"])){
				//   header('location:admin/dashboard.php');
				echo "<script>alert('successfully matched')</script>";
				}
				else {
				  echo "<script>alert('invalid emailid or password')</script>";
				}
			  }
		  }
	  } else {
		  echo "0 results";
		}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ced Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="css/swipebox.css">
			<script src="js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
				</script>
</head>
<body>
<?php include 'header.php';?>
			<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<div class="col-md-6 login-left">
									 <h3>new customers</h3>
									 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
									 <a class="acount-btn" href="account.php">Create an Account</a>
								</div>
								<div class="col-md-6 login-right">
									<h3>registered</h3>
									<p>If you have an account with us, please log in.</p>
									<form action="" method="post">
									  <div>
										<span>Email Address<label>*</label></span>
										<input type="text" name='email' id='email'> 
									  </div>
									  <div>
										<span>Password<label>*</label></span>
										<input type="password" name='password'id='password'> 
									  </div>
									  <a class="forgot" href="#">Forgot Your Password?</a>
									  <input type="submit" name='submit'id="submit" value="Login">
									</form>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php include 'footer.php';?>
</body>
</html>