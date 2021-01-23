<?php
session_start();
$otp=$_POST['otp'];
if($_SESSION['otp']==$otp){
    echo "otp verify";
}
else{
    echo "not verify";
}