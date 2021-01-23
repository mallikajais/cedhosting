<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer.php';
require_once 'SMTP.php';
require_once 'Exception.php';


// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;



$mail=new PHPMailer(true);
$alert="";

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    
    try{
        $mail->isSMTP();
        $mail->Host="smtp.gmail.com";
        $mail->SMTPAuth=true;
        
        
        $mail->Username='jaiswalmallika0126@gmail.com';
        $mail->Password='iwannama';
        $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port='587';
        
        $mail->setFrom('jaiswalmallika0126@gmail.com');
        
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject="Message recieved(contact page)";
        $mail->Body='<h3>Name:$name<br>Email:$email<br>Message:$message<br>';

        $mail->Send();
        $alert='<div class="alert-success">Message sent</div>';
        echo "mail sent";
    }
    catch(Exception $e){
        $alert='<div class="alert-error"><span>'.$e->getMessage().'</span></div>';
    
    }
   
}

?>