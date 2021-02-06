<?php
include 'Dbcon.php';
class tbl_user{
    
    public $conn;
    public $email;
    public $name;
    public $mobile;
    public $email_approved;
    public $mobile_approved;
    public $active;
    public $isadmin;
    public $password;
    public $security_question;
    public $security_answer;

    public function __construct()
    {
        $dbcon=new Dbcon();
        $this->conn=$dbcon->createConnection();
    }

    public function userLogin($email, $password)
    {
        $sql="SELECT * FROM `tbl_user` WHERE `email`='$email' 
        AND `password`='$password'";
        $data=$this->conn->query($sql);
        if ($data->num_rows>0) {
            $row=$data->fetch_assoc();
            if ($row['is_admin']==0 && $row['active']==1) {
                $_SESSION['user']=array($row['email'],$row['id']);
                header('location:user/index.php');
            } elseif ($row['is_admin']==1 && $row['active']==1) {
                $_SESSION['admin']=array($row['id'],$row['email'],$row['name']);
                header('location:admin/dashboard.php');
            } else {
                return $row;
            }
        }
        return false;
    } 
   
}
?>