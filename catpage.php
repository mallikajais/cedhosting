<?php
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    require_once 'admin/tbl_product.php';
    $product=new tbl_product();
    $heading=$product->getPageHeading($id);
    // echo $heading['prod_name'];
	$datacon=$product->getCatPageData($id);
	//  var_dump($datacon);
}
	
    
   

?>
<?php require_once 'header.php';?>
<body>



<div class="content">
	<div class="linux-section">
		<div class="container">
			<div class="linux-grids">
				<div class="col-md-8 linux-grid">
					<h2><?php echo $heading['prod_name'];?></h2> 
					<ul>
						<li><?php echo $heading['html'];?></li>
						
									
					</ul>
				
					<a href="#">view plans</a>
				 
                 </div>
                 <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
						<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">IN Hosting</a></li>
						<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">US Hosting</a></li>
					</ul>
				</div>
				<div class="tab-prices">
        <div class="container ">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <div id="myTabContent" class="tab-content justify-content-center">
                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                        <div class="linux-prices" id="myTab">
                            <?php
                            $html="";
                            for ($i=0;$i<count($datacon);$i++) {
                                // echo $datacon[$i]["prod_id"];
                                $html.='<div class="col-md-3 linux-price">
                                    <div class="linux-top">
                                    <h4>Standard</h4>
                                    </div>
                                    <div class="linux-bottom">
                                        <h5>₹'.$datacon[$i]["mon_price"].' <span class="month">per Month</span></h5>
                                        <h5>₹'.$datacon[$i]["annual_price"].' <span class="month">per Annum</span></h5>
                                        <h6>Single Domain</h6>
                                        <ul>
                                        <li><strong>'.$datacon[$i]["webspace"].'GB </strong> Web Space</li>
                                        <li><strong>'.$datacon[$i]["bandwidth"].'GB </strong>Bandwidth</li>
                                        <li><strong>'.$datacon[$i]["mailbox"].' </strong> Mailbox</li>
                                        <li><strong>'.$datacon[$i]["freedomain"].' </strong> Free Domain</li>
                                        <li><strong>'.$datacon[$i]["languagetechnology"].' </strong> Language/Technology</li>
                                        <li><strong>High Performance</strong>  Servers</li>
                                        <li><strong>location</strong> : <img src="images/india.png"></li>
                                        </ul>
                                    </div>
                                    <a href="javascript:void(0)" data-id='.$datacon[$i]["prod_id"].' id="addtocart" data-toggle="modal" data-target="#myModal">Add to cart</a>
                                    <div class="container">

  
                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                        
                                            
                                            <div class="modal-header">
                                            <h4 class="modal-title">Slect Your Plan</h4>
                                           
                                            </div>
                                            
                                            
                                            <div class="modal-body">
                                            <form action="cart.php" >
                                            <input type ="text" name="cart" style="display :none" value='. $datacon[$i]["prod_id"].'>
                                            <select class="form-control" id="send" name="send">
                                                <option>Please select</option>
                                                <option>Monthly</option>
                                                <option>Annual</option>
                                            </select>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button  type="submit" class="btn btn-success" id="cartid" name=" submit" data-id='. $datacon[$i]["prod_id"].'>Ok</button>
                                            </form>
                                            </div>
                                            
                                            
                                            
                                            
                                        </div>
                                        </div>
                                    </div>
  
                                </div>
                                </div>';
                            }
                            print_r($html);
                            ?>
                            <div class="clearfix"></div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
  
</div>
    
</div>

</div>

<?php include 'footer.php';?>

<!-- <script>
    $(document).on('click','#cartid',function(){
        var id=$(this).data('id');
        console.log(id);
            
    });
</script> -->
</body>
</html>
