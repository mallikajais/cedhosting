<?php include 'sendmail.php';?>

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
<?php echo $alert;?>
<form action="" method="post">
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" name='name' placeholder="Name">
    </div>
    <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name='email' placeholder="Email">
    </div>
    <!-- <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div> -->
    
    <div class="form-group">
    <label for="message">Message</label>
        <input type="textarea" class="form-control" id="message" name='message' placeholder="Message">
    </div>
    <button type="submit" class="btn btn-primary" value="send">Submit</button>
</form>

<script>
if(window.history.replacestate){
    window.history.replacestate(null,null,window.location.href);
}
</script>
</body>
</html>