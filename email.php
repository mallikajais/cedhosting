
    <?php include 'header.php';?>
    <div>
        <form>
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
        <a href="account.php"><button id="button" class="btn btn-success" value="continue" style="display:none;color:white">continue</a></button>
        </form>
    </div>
    <?php include 'footer.php';?>
    <script>
            function sendEmail(){
        
        var email=$('#email').val();
     //    alert(email);
         if(email!=""){
             $.ajax({
                 url:"sendemail.php",
                 type:'POST',
                 data:{email:email }
                 ,success :function(res){
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
                         alert("successfully matched");
                        $('#button').css("display", "block");

                         $(".out").css("display", "none");
                        //  header('location:account.php');
                       
                     }
                     else{
                         // $('.verify').text("successfully not matched");
                         $(".out").css("display", "block");
                         
                     }
                 }
             });
         }
     }
    </script>
</body>
</html>