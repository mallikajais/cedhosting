<?php
session_start();
$otp=$_POST['otp'];
if($_SESSION['otp']==$otp){
    echo "otp verify";
    // $_SESSION['email'];
    // header('location:account.php');

}
else{
    echo "not verify";
}
?>