<?php
// session_start();
$conn = new mysqli('localhost', 'root', '','cedhosting');
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $number=$_POST['number'];
    $email=$_POST['email'];
    $security=$_POST['security'];
    $answer=$_POST['answer'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];
    class tbluser{
        function user($number,$email,$security,$answer,$password,$confirm){
            
            
            $conn = new mysqli('localhost', 'root', '','cedhosting');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "INSERT INTO tbl_user (email, name,mobile,email_approved,phone_approved
            ,active,is_admin,password,security_question,security_answer)
            VALUES ('$email','$name', $number,0,0,0,0,'$password','$security','$answer')";

            if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            // header('location:display.php');
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    }
}
$obj=new tbluser();

$obj->user($number,$email,$security,$answer,$password,$confirm);
?>
