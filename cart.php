<?php include 'header.php';
if(isset($_GET['submit'])){
    $id=$_GET['cart'];
    $plan=$_GET['send'];
    // echo $id;
    // echo $plan;
}
?>
<div class="container-fluid" style="background-color:white;">
          <table class=" table table-striped table-hover table-border text-center " id="viewProduct" >
            <thead>
              <tr class="bg-dark text-white text-center">
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>SKU</th>
                <th>Plan Type</th>
                <th>Action</th>
              </tr>
            </thead>
            
            <?php
                include_once 'admin/tbl_product.php';
                $product = new tbl_product();
                $data=$product->addtocart($id);
                // print_r($data);
                $count=0;
                // foreach ($data as $key => $value) {
                    
                //     echo "<td>".$value ."</td> ";
                //     // $_SESSION['count']=$count++;
                // }
                if ($data!=false) {
                    for ($i=0;$i<count($data);$i++) {
                        echo "<tr>";
                        echo "<td>".$data[$i]['prod_id']."</td> ";
                        echo "<td>".$data[$i]['prod_name']."</td> ";
                        if($plan=="Monthly"){
                            echo "<td>".$data[$i]['mon_price']."</td> ";
                        }
                        else{
                            echo "<td>".$data[$i]['annual_price']."</td> ";
                        }
                        
                        echo "<td>".$data[$i]['sku']."</td> ";
                        echo "<td>".$plan ."</td> ";
                        echo "<td> <button class='btn btn-danger'>Delete</button></td>";
                        echo "</tr>";
                      
                    }
          
                  }
                
                
                
            ?>
      </table>
      <button class="btn btn-success"><a href="paypal.php" id="checkoutbutton">Checkout</a></button>
</div>
<script>

$('#viewProduct').DataTable( {
    "ajax": "admin/handlerequest.php?cartdata=1"
}); 

</script>
<?php include 'footer.php';?>