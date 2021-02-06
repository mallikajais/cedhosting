<?php
// session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

include_once 'Dbcon.php';
class tbl_product extends Dbcon{
    public $conn;
    public $id;
    public $prod_parent_id;
    public $prod_name;
    public function __construct()
    {
        $dbcon=new Dbcon();
        $this->conn=$dbcon->createConnection();
    }
    
    
    public function getCategory()
    {   
        $sql="SELECT * FROM `tbl_product` WHERE `id`='1' AND `prod_parent_id`='0'";
        $result=$this->conn->query($sql);
        if ($result->num_rows>0) {
            $arr=array();
            while ($row=$result->fetch_assoc()) {
                // $_SESSION['category']=$row['prod_name'];
                $arr[]=$row;
            }
            return $arr;
        }
        return false;
    }
    public function getSubCategory() 
    {
        $sql="SELECT * FROM `tbl_product` WHERE `prod_parent_id`='1' AND `prod_available`='1'";
        $data=$this->conn->query($sql);
        if ($data->num_rows>0) {
            $arr=array();
            while ($row=$data->fetch_assoc()) {
                $arr[]=$row;
            
            }
            return $arr;
        }
        return false;
    }
    public function getPageHeading($id) {
        $sql="SELECT * FROM `tbl_product` WHERE `id`='$id'";
        $data=$this->conn->query($sql);
        if ($data->num_rows>0) {
            return $data->fetch_assoc();
        } else {
            return false;
        }
       
    }


    
    public function insertproduct($productname,$link) 
    {   
        
        $sql="INSERT INTO `tbl_product` (`prod_parent_id`,`prod_name`,`html`,`prod_available`,`prod_launch_date`) 
        VALUES ('1','$productname','$link','1',NOW())";
        $data=$this->conn->query($sql);
        if ($data->num_rows>0) {
            return $data;
        }
        return false;
    }
    public function duplicateCategoryCheck($catvalue) {
        $sql="SELECT * FROM `tbl_product` WHERE `prod_parent_id`='1' AND `prod_name` LIKE '$catvalue'";
        $data=$this->conn->query($sql);
        if ($data->num_rows>0) {
            return true;
        } 
        return false;
    }
    public function productDescription($productcategory, $productname, $pageurl, $monthlyprice, $annualprice, $sku, $webspace, $bandwidth,  $freedomain, $languagetechnology, $mailbox){
        $des=array('webspace'=>$webspace,'bandwidth'=>$bandwidth,'freedomain'=>$freedomain,'languagetechnology'=>$languagetechnology,'mailbox'=>$mailbox);
        $description=json_encode($des);
        
        $q="INSERT INTO `tbl_product`( `prod_parent_id`, `prod_name`, `html`, `prod_available`, `prod_launch_date`)
        VALUES('2','$productname','$pageurl','1',NOW())";
        $data=$this->conn->query($q);
        $sql="SELECT * FROM `tbl_product` WHERE prod_name='$productname'";
        $data=$this->conn->query($sql);
        if ($data->num_rows>0) {
            $arr=array();
            while ($row=$data->fetch_assoc()) {
                $prodid=$row['id'];
                echo $prodid;
                $sql="INSERT INTO `tbl_product_description` ( `prod_id`, `description`, `mon_price`, `annual_price`, `sku`) 
                VALUES ($prodid,'$description',$monthlyprice,$annualprice,$sku)";
                $data=$this->conn->query($sql);
                if ($data) {
                    return $data;
                }
                return false;
            }
        }
        return false;
    }

    public function showProductsBYCategory() 
    {
        $sql="SELECT `tbl_product`.*,`tbl_product_description`.* FROM tbl_product JOIN tbl_product_description ON `tbl_product`.`id` = `tbl_product_description`.`prod_id`";
        $data=$this->conn->query($sql);
        $arr['data']=array();
        while ($row=$data->fetch_assoc()) {
            if ($row['prod_available']=='1') {
                $available="available";
            } else {
                $available="unavailable";
            }
            $decoded_description=json_decode($row['description']);
            $webspace=$decoded_description->{'webspace'};
            $bandwidth=$decoded_description->{'bandwidth'};
            $freedomain=$decoded_description->{'freedomain'};
            $languagetechnology=$decoded_description->{'languagetechnology'};
            $mailbox=$decoded_description->{'mailbox'};
            $prod_parent_id=$row['prod_parent_id'];
            $sql="SELECT * FROM `tbl_product` WHERE `id`='$prod_parent_id'";
            $roww=$this->conn->query($sql);
            $data1=$roww->fetch_assoc();
            // echo '<script>alert($data1["prod_name"])</script>';
            $arr['data'][]=array($data1['prod_name'],$row['prod_name'],$row['html'],$available,$row['prod_launch_date'],$row['mon_price'],$row['annual_price'],$row['sku'],$webspace,$bandwidth,$freedomain,$languagetechnology,$mailbox,"<a href='javascript:void(0)' class='btn btn-outline-info' data-id='".$row['prod_id']."' id='edit-product-by-category' data-toggle='modal' data-target='#exampleModalSignUp'>Edit</a> <a href='javascript:void(0)' class='btn btn-outline-danger' data-id='".$row['prod_id']."' id='delete-product-by-category'>Delete</a>");
        }
        return json_encode($arr);
    
    }
    public function getCatPageData($id)
    {
        $sql="SELECT `tbl_product`.*,`tbl_product_description`.* FROM tbl_product JOIN tbl_product_description ON `tbl_product`.`id` = `tbl_product_description`.`prod_id` WHERE `tbl_product`.`id`='$id'";
        $data=$this->conn->query($sql);            
        if ($data->num_rows>0) {
            $arr=array();
            while ($row=$data->fetch_assoc()) {
                if ($row['prod_available']=='0') {
                    continue;
                } else {
                    $available="available";
                }
                $decoded_description=json_decode($row['description']);
                $webspace=$decoded_description->{'webspace'};
                $bandwidth=$decoded_description->{'bandwidth'};
                $freedomain=$decoded_description->{'freedomain'};
                $languagetechnology=$decoded_description->{'languagetechnology'};
                $mailbox=$decoded_description->{'mailbox'};
                $arr[]=array(
                    "prod_id"=>$row['prod_id'],
                    "sku"=>$row['sku'],
                    "mon_price"=>$row['mon_price'],
                    "annual_price"=>$row['annual_price'],
                    "prod_parent_id"=>$row['prod_parent_id'],
                    "prod_name"=>$row['prod_name'],
                    "link"=>$row['html'],
                    "available"=>$available,
                    "prod_launch_date"=>$row['prod_launch_date'],
                    "webspace"=>$webspace,
                    "bandwidth"=>$bandwidth,
                    "freedomain"=>$freedomain,
                    "languagetechnology"=>$languagetechnology,
                    "mailbox"=>$mailbox
                );
            }
            return $arr;
        }
        return false;
    }

    public function manageProductsBYCategory($id, $action) 
    {
        if ($action=='edit') {
            $sql="SELECT `tbl_product`.*,`tbl_product_description`.* FROM tbl_product JOIN tbl_product_description ON `tbl_product`.`id` = `tbl_product_description`.`prod_id` WHERE `tbl_product`.`id`='$id'";
            $data=$this->conn->query($sql);            
            if ($data->num_rows>0) {
                $arr=array();
                while ($row=$data->fetch_assoc()) {
                    if ($row['prod_available']=='1') {
                        $available="available";
                    } else {
                        $available="unavailable";
                    }
                    $decoded_description=json_decode($row['description']);
                    $webspace=$decoded_description->{'webspace'};
                    $bandwidth=$decoded_description->{'bandwidth'};
                    $freedomain=$decoded_description->{'freedomain'};
                    $languagetechnology=$decoded_description->{'languagetechnology'};
                    $mailbox=$decoded_description->{'mailbox'};
                    $arr=array(
                        "prod_id"=>$row['prod_id'],
                        "sku"=>$row['sku'],
                        "mon_price"=>$row['mon_price'],
                        "annual_price"=>$row['annual_price'],
                        "prod_parent_id"=>$row['prod_parent_id'],
                        "prod_name"=>$row['prod_name'],
                        "link"=>$row['html'],
                        "available"=>$available,
                        "prod_launch_date"=>$row['prod_launch_date'],
                        "webspace"=>$webspace,
                        "bandwidth"=>$bandwidth,
                        "freedomain"=>$freedomain,
                        "languagetechnology"=>$languagetechnology,
                        "mailbox"=>$mailbox);
                }
                return $arr;
            }
            return false;
        }
        if ($action=="delete") {
            $sql="DELETE FROM `tbl_product_description` WHERE `prod_id`='$id'";
            if ($this->conn->query($sql)) {
                $sql="DELETE FROM `tbl_product` WHERE `id`='$id'";
                if ($this->conn->query($sql)) {
                    return true;
                }
                return false;
            }
            return false;
        }
    }
    

    public function dynamicnav() {
        $sql="SELECT * FROM `tbl_product` ";
        $data=$this->conn->query($sql);
        if ($data->num_rows>0) {
            return $data->fetch_assoc();
        } else {
            return false;
        }
       
    }
    
    public function showProductBYCategory() 
    {
        $sql="SELECT * FROM `tbl_product` WHERE `prod_parent_id`='1'";
        $data=$this->conn->query($sql);
        $arr['data']=array();
        while ($row=$data->fetch_assoc()) {
            if ($row['prod_available']=='1') {
                $available="available";
            } else {
                $available="unavailable";
            }
            $prod_parent_id=$row['prod_parent_id'];
            $sql="SELECT * FROM `tbl_product` WHERE `id`='$prod_parent_id'";
            $roww=$this->conn->query($sql);
            $data1=$roww->fetch_assoc();
            $arr['data'][]=array($row['id'],$data1['prod_name'],$row['prod_name'],$row['html'],$available,$row['prod_launch_date'],"<a href='javascript:void(0)' class='btn btn-outline-success' data-id='".$row['id']."' id='edit-product-by-category' data-toggle='modal' data-target='#mymodal'>Edit</a> <a href='javascript:void(0)' class='btn btn-outline-danger' data-id='".$row['id']."' id='delete-product-by-category'>Delete</a>");
        }
        return $arr;
    }
    public function manageProductBYCategory($id, $action) 
    {
        if ($action=='edit') {
            $sql="SELECT * FROM `tbl_product` WHERE `id`='$id'";
            $data=$this->conn->query($sql);
            if ($data->num_rows>0) {
                while ($row=$data->fetch_assoc()) {
                    return $row;
                }
            }
            return false;
        }
        if ($action=="delete") {
            $sql="DELETE FROM `tbl_product` WHERE `id`='$id'";
            $this->conn->query($sql);
            $sql="SELECT * FROM `tbl_product` WHERE `prod_parent_id`='$id'";
            $data=$this->conn->query($sql);
            if ($data->num_rows>0) {
                while ($row=$data->fetch_assoc()) {
                    $id=$row['id'];
                    $sql="DELETE FROM `tbl_product_description` WHERE `prod_id`='$id'";
                    $this->conn->query($sql);
                    $sql="DELETE FROM `tbl_product` WHERE `id`='$id'";
                    $this->conn->query($sql);
                }
            }
            return true;
        }
    }
    
    public function updateProductByCategory($productname, $link, $availability, $id) 
    {
        $sql="UPDATE `tbl_product` SET `prod_name`='$productname', `html`='$link',`prod_available`='$availability' WHERE `id` = '$id'";
        $data=$this->conn->query($sql);
        if ($data) {
            return true;
        }
        return false;
    }
    
    public function addtocart($id)
    {
        $sql="SELECT `tbl_product`.*,`tbl_product_description`.* FROM tbl_product JOIN tbl_product_description ON `tbl_product`.`id` = `tbl_product_description`.`prod_id` WHERE `tbl_product`.`id`='$id'";
        $data=$this->conn->query($sql);            
        if ($data->num_rows>0) {
            $arr=array();
            while ($row=$data->fetch_assoc()) {
                if ($row['prod_available']=='0') {
                    continue;
                } else {
                    $available="available";
                }
                $decoded_description=json_decode($row['description']);
                $webspace=$decoded_description->{'webspace'};
                $bandwidth=$decoded_description->{'bandwidth'};
                $freedomain=$decoded_description->{'freedomain'};
                $languagetechnology=$decoded_description->{'languagetechnology'};
                $mailbox=$decoded_description->{'mailbox'};
                $arr=array(
                    "prod_id"=>$row['prod_id'],
                    "prod_name"=>$row['prod_name'],
                    "sku"=>$row['sku'],
                    "mon_price"=>$row['mon_price'],
                    "annual_price"=>$row['annual_price'],
                    "prod_parent_id"=>$row['prod_parent_id']
                    
                );
                array_push($_SESSION['cart'],$arr);
                // $_SESSION['cart']=$arr;
            }
            return $_SESSION['cart'];
        }
        return false;
    }
    
   
    
}
?>



















