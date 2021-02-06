<?php
// include_once 'Dbcon.php';
// session_start();

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
			//   echo  $row["email"]. " - Name: ". $row["name"]. " " . $row["mobile"] ;
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