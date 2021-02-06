
	<?php include 'header.php';?>
	<!---header--->
		<!---login--->
			<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form action="accpost.php" method="post" > 
				 <div class="register-top-grid">
					<h3>personal information</h3>
					 <div>
						<span> Name<label>*</label></span>
						<input type="text" name="name" id="name" required pattern="[a-z]+\s+[a-z]"> 
					 </div>
					 <div class="form-group">
						<span>Email Address<label>*</label></span>
						<input type="email" name="email" id="email" class="form-control" style="width: 95%;" required>
						<button type="button" class="btn btn-primary" onclick="sendEmail()" >verify</button>
					</div>
					<div class=" out" style="display:none"; >
						<span>Enter OTP<label>*</label></span>
						<input type="number" class="form-control out" id="otp" style="width: 95%;" required>
						<button type="button" class="btn btn-primary out" onclick="validate()" >confirm OTP</button>
					</div>

					 <div>
						<span> Number<label>*</label></span>
						<input type="number" name="number" class="form-control" style="width: 95%;" required> 
					 </div>
					 
					<div>
						<span>Security Questions<label>*</label></span>
						<select class="form-control" id="security" name="security" style="width: 95%;">
							<option value="" selected disabled required>Security Questions</option>
							<option>What was your childhood nickname?</option>
							<option>What is the name of your favourite childhood friend?</option>
							<option>What was your favourite place to visit as a child?</option>
							<option>What was your dream job as a child?</option>
							<option>What is your favourite teacher's nickname?</option>
                            <?php
                                // $query = "SELECT * FROM tbl_location";
                                // $query_run = mysqli_query($conn, $query);
                                // while ($row = mysqli_fetch_array($query_run)) {
                                //     echo "<option value='".$row['name']."'>".$row['name']."</option>";
                                // }
                            ?>
                        </select> 
					 </div>
					 <div>
						<span> Security Answer<label>*</label></span>
						<input type="text" name="answer" required> 
					 </div>

					
					<div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" required checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>login information</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" id="password" required pattern="(?=.*\d)(?=.*\s)(?=.*[a-z])(?=.*[A-Z]).{8,}">
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="confirm" required>
							 </div>
					 </div>
					 
					 <input type="submit" class="btn btn-success" value="submit" name="submit">
				</form>
				<div id="message">
					<h3>Password must contain the following:</h3>
					<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
					<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
					<p id="number" class="invalid">A <b>number</b></p>
					<p id="length" class="invalid">Minimum <b>8 characters</b></p>
					<p id="special" class="invalid">Special  <b> characters</b></p>
					<p id="space" class="invalid">No  <b>Whitespaces</b></p>
				</div>
				<!-- 
					
					
				 -->
				
					   
					  
				   
		   </div>
		 </div>
	</div>
<!-- registration -->

			</div>
<!-- login -->
				<!---footer--->
				<?php include 'footer.php';?>
			<!---footer--->

<script type="text/javascript">
    function sendEmail(){
        
       var email=$('#email').val();
    //    alert(email);
        if(email!=""){
            $.ajax({
                url:"sendemail.php",
                type:'POST',
                data:{email:email }
                ,success :function(res){
                    $('.notifiy').text("successfully send");
                    $(".out").css("display", "block");
                }
            });
        }
    }
	function isNotEmpty(caller){
        if(caller.val()==""){
            caller.css('border','1px solid red');
            return false;
        }
        else{
            caller.css('border','');
            return true;
        }
    }
    function validate(){
        var otp=$('#otp').val(); 
        if(otp!=""){
            $.ajax({
                url:"otpnum.php",
                type:'POST',
                data:{otp:otp }
                ,success :function(result){
                    if(result=="otp verify"){
                        // $('.verify').text("successfully matched");
                        $(".out").css("display", "none");
                      
                    }
                    else{
                        // $('.verify').text("successfully not matched");
                        $(".out").css("display", "block");
                        
                    }
                }
            });
        }
    }
	
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var special = document.getElementById("special");
var space = document.getElementById("space");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }

  var specialcharacter=/[!@#$%^&*]/g;
	if(myInput.value.match(specialcharacter)) {  
		special.classList.remove("invalid");
		special.classList.add("valid");
	} else {
		special.classList.remove("valid");
		special.classList.add("invalid");
	}

	var whitespace=/[/s]/g;
	if(myInput.value.match(whitespace)) {  
		space.classList.remove("invalid");
		space.classList.add("valid");
	} else {
		space.classList.remove("valid");
		space.classList.add("invalid");
	}
}


	

	// // When the user clicks on the password field, show the message box
	// myInput.onfocus = function() {
	// document.getElementById("message").style.display = "block";
	// }

	// // When the user clicks outside of the password field, hide the message box
	// myInput.onblur = function() {
	// document.getElementById("message").style.display = "none";
	// }

	// // When the user starts to type something inside the password field
	// myInput.onkeyup = function() {
	// // Validate lowercase letters
	
	// var name = /[a-z A-Z]+[\s]+[a-z A-Z]/g;
	// if(myInput.value.match(name)) {  
	// 	name.classList.remove("invalid");
	// 	name.classList.add("valid");
	// } else {
	// 	name.classList.remove("valid");
	// 	name.classList.add("invalid");
	// }
	// 
	// 



	
	
</script>
</body>
</html>