<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
if( isset($_POST['email'])){
    // $name=$_POST['name'];
    
    $email=$_POST['email'];
    $_SESSION["email"] = $email;
    echo $email;
    // $body=$_POST['body'];
    // $subject=$_POST['subject'];

    require_once 'includes/PHPMailer.php';
    require_once 'includes/SMTP.php';
    require_once 'includes/Exception.php';
    $mail=new PHPMailer();
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->SMTPAuth=true;
        
        
    $mail->Username='jaiswalmallika0126@gmail.com';
    $mail->Password='iwannama';
    $mail->Port='465';
    $mail->SMTPSecure='ssl';
    $mail->isHTML(true);
    $mail->setFrom($email);
        
    $mail->addAddress($email);
    $otp = rand(100000,999999);
    $_SESSION['otp'] = $otp;

    echo $opt;
    $mail->Subject="verification otp";
    $mail->Body=$otp;
    if($mail->send()){
        $status="success";
        $response="Mail sent";
    }
    else{
        $status="fail";
        $response="Mail not sent";
    }
    
exit(json_encode(array("status"=>$status,"response"=>$response)));
}
?>