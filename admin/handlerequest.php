<?php
session_start();
require_once "tbl_product.php";
$product=new tbl_product();
if (isset($_POST['productadd'])) {
    $productname=$_POST['productname'];
    $link=$_POST['link'];
    $duplicatecheck=$product->duplicateCategoryCheck($productname);
    if ($duplicatecheck) {
        echo "Duplicate Category Name is Not Allowed";
    } else {
        $data=$product->insertproduct($productname,$link);
        echo true;
    }
 
}
if (isset($_GET['showproduct'])) {
    $data=$product->showProductBYCategory();
    print_r(json_encode($data));
}
if (isset($_GET['showproducts'])) {
    $data=$product->showProductsBYCategory();
    print_r($data);
  

}
if (isset($_GET['viewproduct'])) {
    $data=$product->addtocart();
    print_r($data);
  

}
if (isset($_POST['manageproductbycategory'])) {
    $id=$_POST['id'];
    $action=$_POST['action'];
    $data=$product->manageProductBYCategory($id, $action);
    if ($data=="true") {
        echo json_encode("true");
    } elseif ($data=="false") {
        echo json_encode("false");
    } elseif ($data!="true" && $data!="false") {
        print_r(json_encode($data));
    }
}
if (isset($_POST['manageproductsbycategory'])) {
    $id=$_POST['id'];
    $action=$_POST['action'];
    $data=$product->manageProductsBYCategory($id, $action);
    if ($data=="true") {
        echo json_encode("true");
    } elseif ($data=="false") {
        echo json_encode("false");
    } elseif ($data!="true" && $data!="false") {
        print_r(json_encode($data));
    }
}
if (isset($_POST['updatecategory'])) {
    $id=$_POST['id'];
    $productname=$_POST['productname'];
    $link=$_POST['link'];
    $availability=$_POST['availability'];
    $data=$product->updateProductByCategory($productname, $link, $availability, $id);
    if ($data) {
        echo true;
    } else {
        echo false;
    }
}


// if (isset($_GET['id'])) {
//     $id=$_GET['id'];
//     $productcategory=$_POST['productcategory'];
//     $productname=$_POST['productname'];
//     $link=$_POST['link'];
//     $data=$product->productUpdate($id, $productcategory, $productname, $link);
//     if ($data=="true") {
//         echo "true";
//     } else {
//         echo "false" ;
//     }
// }



// if(isset($_POST['deletecategory'])){
// $id=$_GET['id'];
// $data=$product->productDelete($id);
//     if ($data=="true") {
//         header('location:category.php');
//     } else {
//         echo "false" ;
//     }


// }









?>