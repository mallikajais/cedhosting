<?php
include_once 'tbl_product.php';
$product=new tbl_product();
if(isset($_POST['submit'])){
  $productcategory=$_POST['productcategory'];
  $productname=$_POST['productname'];
  $pageurl=$_POST['pageurl'];
  $monthlyprice=$_POST['monthlyprice'];
  $annualprice=$_POST['annualprice'];
  $sku=$_POST['sku'];
  $webspace=$_POST['webspace'];
  $bandwidth=$_POST['bandwidth'];
  $freedomain=$_POST['freedomain'];
  $languagetechnology=$_POST['languagetechnology'];
  $mailbox=$_POST['mailbox'];
  $data=$product->productDescription($productcategory, $productname, $pageurl, $monthlyprice, $annualprice, $sku, $webspace, $bandwidth,  $freedomain, $languagetechnology, $mailbox);
    if ($data!=false) {
      echo "<script>alert('product Description added successfully');</script>";
    } else {
      echo "<script>alert('Product Description Addition Failed');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'head.php';?>
    <div class="main-content" id="panel">
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                </div>
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <img alt="Image placeholder" src="assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">Hii<?php echo $_SESSION['name'];?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <img alt="Image placeholder" src="assets/img/theme/team-2.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">Hi <?php echo $_SESSION['name'];?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <img alt="Image placeholder" src="assets/img/theme/team-3.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">Hii<?php echo $_SESSION['name'];?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>5 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <img alt="Image placeholder" src="assets/img/theme/team-4.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">Hii<?php echo $_SESSION['name'];?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <img alt="Image placeholder" src="assets/img/theme/team-5.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">Hii<?php echo $_SESSION['name'];?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                </div>
                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Calendar</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>Email</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Payments</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reports</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>Maps</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>Shop</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="assets/img/theme/team-4.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">Hi <?php echo " ".$_SESSION['name'];?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Product</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">AdminDashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                
                
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                
                
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
              
            </div>
            <div class="card-body">
              <form action="product.php" method="post" 
              > 
              <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                            <h1 class="mb-0">Create New Product</h1>
                            <div class="mb-0">Enter Product Details </div>
                            <small class="important-field"> 
                            * Mandatory Fields</small>
                            </div>
                        </div>
                    </div>
                <div class="pl-lg-4">
                  <div class="row">
                  <div class="form-group col-lg-6">
                    <label for="inputState">Select Product Category
                    <span class="important-field"> *</span></label>
                    <select id="inputState" class="form-control" 
                    name="productcategory">
                        <option value="Please select">Please select</option>
                        
                        <?php
                        include_once 'tbl_product.php' ;
                        $product=new tbl_product();
                        $data=$product->getSubCategory();
                        print_r($data);
                        if ($data!=false) {
                          for ($i=0;$i<count($data);$i++) {
                            echo '<option value="'.$data[$i]['id'].'">'.$data[$i]['prod_name'].'</option>';
                          }
                
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                      Please Select a Product Category.
                    </div>
                    
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="productname">Enter Product Name
                        <span class="important-field"> *</span></label>
                        <input type="text" id="productname" 
                        class="form-control" placeholder="product Name" 
                        name="productname">
                          <div class="invalid-feedback">
                            Please provide a valid Product Name.
                          </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="pageurl">Page URL</label>
                        <input type="text" id="pageurl" 
                        class="form-control" placeholder="Page URL" name="pageurl">
                      </div>
                    </div>
                  </div>
                  <hr class="my-4">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                            <h1 class="mb-0">Product Description</h1>
                            <div class="mb-0">Enter Product Description Below </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="monthlyprice">Enter Monthly Price
                        <span class="important-field"> *</span></label>
                        <input type="text" id="monthlyprice" 
                        class="form-control" placeholder="Monthly Price" 
                        name="monthlyprice">
                        <small class="text-muted">This would be Monthly Plan</small>
                        <div class="invalid-feedback">
                          Please Enter valid Monthly price.
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="annualprice">Enter Annual Price
                        <span class="important-field"> *</span> </label>
                        <input type="text" id="annualprice" 
                        class="form-control" placeholder="Annual Price" 
                        name="annualprice">
                        <small class="text-muted">This would be Annual Price</small>
                        <div class="invalid-feedback">
                          Please Enter Valid Annual Price.
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="sku">SKU<span class="important-field"> *</span></label>
                        <input type="text" id="sku" class="form-control" 
                        placeholder="SKU" name="sku">
                        <div class="invalid-feedback">
                          Please Enter valid SKU.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                            <h1 class="mb-0">Features</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="webspace">Web Space(in GB)
                        <span class="important-field"> *</span></label>
                        <input type="text" id="webspace" 
                        class="form-control" placeholder="Web Space" name="webspace">
                        <small class="text-muted">Enter 0.5 for 512 MB</small>
                        <div class="invalid-feedback">
                          Please Enter Valid Web Space.
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="bandwidth">Bandwidth (in GB)
                        <span class="important-field"> *</span></label>
                        <input type="text" id="bandwidth" 
                        class="form-control" placeholder="Bandwidth" 
                        name="bandwidth">
                        <small class="text-muted">Enter 0.5 for 512 MB</small>
                        <div class="invalid-feedback">
                          Please Enter bandwidth.
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="freedomain">Free Domain<span 
                        class="important-field"> *</span> </label>
                        <input type="text" id="freedomain"
                         class="form-control" placeholder="Free Domain" 
                         name="freedomain">
                        <small class="text-muted">Enter 0 if 
                        no domain available in this service</small>
                        <div class="invalid-feedback">
                          Please Enter Valid Free Domain.
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="languagetechnology">Language/ Technology Support
                        <span class="important-field"> *</span> </label>
                        <input type="text" id="languagetechnology" 
                        class="form-control" 
                        placeholder="Language or Technology Support" 
                        name="languagetechnology">
                        <small class="text-muted">Separate by (,) 
                        Ex: PHP, MySQL, MongoDB</small>
                        <div class="invalid-feedback">
                        Please Enter Valid Language or Technology Support.
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="mailbox">Mailbox
                        <span class="important-field"> *</span> </label>
                        <input type="text" id="mailbox" class="form-control" 
                        placeholder="Mailbox" name="mailbox">
                        <small class="text-muted">Enter Number 
                        of mailbox will be provided, enter 0 if none</small>
                        <div class="invalid-feedback">
                          Please Enter Valid Number of Mailbox.
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                  <input type="submit" class="btn btn-primary mt-4" 
                  id="createcategory" value="Create Category" name="submit">
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
      </div>
        </div>
        </div>
    </div>
</div>

<script>

</script>
</body>
</html>