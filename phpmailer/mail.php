
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<h4 class="notifiy"></h4>
<form   id="form">
    
   
    <div class="form-group" id="input">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="email" name='email' placeholder="Email">
        <button type="button" class="btn btn-primary" onclick="sendEmail()" >Submit</button>
    </div>
    <div class="form-group" id="output">
        <h3 class="verify"></h3>
        <label for="otp">otp</label>
        <input type="number" class="form-control" id="otp" placeholder="otp">
        <button type="button" class="btn btn-primary" onclick="validate()" >verify</button>
    </div>
    
    
    
</form>
<script type="text/javascript">
    function sendEmail(){
        $("#input").css("display", "none");
        $("#output").css("display", "block");
    //    var name=$('#name'); 
       var email=$('#email').val(); 
    //    $('.notifiy').text(email);
    //    var subject=$('#subject'); 
    //    var body=$('#body'); 
    
        if(email!=""){
            $.ajax({
                url:"sendemail.php",
                type:'POST',
                
                data:{email:email }
                ,success :function(res){
                    // $('#form')[0].reset();
                    $('.notifiy').text("successfully send");
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
</script>
<script>
    function validate(){
        var otp=$('#otp').val(); 
        if(otp!=""){
            $.ajax({
                url:"otp.php",
                type:'POST',
                data:{otp:otp }
                ,success :function(result){
                    // $('.verify').text("successfully matched");
                    if(result=="otp verify"){
                        $('.verify').text("successfully matched");

                    }
                    else{
                        $('.verify').text("successfully not matched");
                    }
                }
            });
        }
    }
</script>


</body>
</html>