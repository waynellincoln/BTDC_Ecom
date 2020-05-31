<?php require_once("../resources/config.php"); ?>

<?php

    //code will also check amount of products available; 
    //code will stop sending product to cart if no product is available.
    if(isset($_GET['add'])) {
        
        $sql = "SELECT * 
                FROM products
                WHERE product_id=" . $_GET['add'] . " "  ;
        
        $available_products = mysqli_query($con, $sql);
        
        if(!$available_products) {
            
            die("Query Failed " . mysqli_error($con));
        }
        
        while ($row = mysqli_fetch_array($available_products)){
            
            if($row['product_quantity'] != $_SESSION['product_' . $_GET['add']]) {
                
                $_SESSION['product_' . $_GET['add']] +=1; //adding 1 if there are enough products
                header("Location: checkout.php");
                
            }else {
                
                set_message("We only have " . $row['product_quantity'] . " items");
                header("Location: checkout.php");
                
            }
        }
 
//        $_SESSION['product_' . $_GET['add']] +=1;
//        
//        header("Location: index.php");    
    }

?><!-----------------------------------End-------------------------------------->
    
    
<?php

    if(isset($_GET['remove'])) {
        
        $_SESSION['product_' . $_GET['remove']]--; //removing 1 item
        
        if($_SESSION['product_' . $_GET['remove']] < 1) {
            
            unset($_SESSION['item_total']);
            unset($_SESSION['item_quantity']);
            
            header("Location: checkout.php");
            
        }else {
            
            header("Location: checkout.php");
            
        }
        
    }

?><!-----------------------------------End-------------------------------------->
    

<?php

    if(isset($_GET['delete'])) {
        
        $_SESSION['product_' . $_GET['delete']] = '0';
        
            unset($_SESSION['item_total']);
            unset($_SESSION['item_quantity']);
            
            header("Location: checkout.php");
            
        }
      
?><!-----------------------------------End-------------------------------------->


<?php

//to be used for displaying items on the checkout page       
function cart() {
    
    $total          = 0;
    $item_quantity  = 0;
    
    foreach ($_SESSION as $product_name => $product_value) { //product value refers to product_id
        
        if($product_value > 0) {
             
            if(substr($product_name, 0, 8) == "product_") { 
                
                $length = strlen((int) $product_name - 8);
                
                $id = substr($product_name, 8, $length);
                            
                global $con;

                $query = "SELECT *
                          FROM products
                          WHERE product_id = $id";

                $display_products = mysqli_query($con, $query);

                if(!$display_products) {

                    die("Query Failed " . mysqli_query($con));

                }

                while($row = mysqli_fetch_array($display_products)) { 

                    $product_id           = $row['product_id'];
                    $product_title        = $row['product_title'];
                    $product_price        = $row['product_price'];
                    $product_quantity     = $row['product_quantity'];
                    
                    $sub                  = $product_value * $product_price;
                    
                    $item_quantity +=$product_value;
                    
                    ?>

                <tr>
                    <td><?php echo $product_title ;?></td>
                    <td><?php echo $product_price ;?></td>
                    <td><?php echo $product_value ;?></td>
                    <td><?php echo $sub; ?></td>
                    <td><a class="btn btn-warning" href="cart.php?remove=<?php echo $product_id; ?>"><span class="glyphicon glyphicon-minus"></span></a>   
                        <a class="btn btn-success" href="cart.php?add=<?php echo $product_id; ?>"><span class="glyphicon glyphicon-plus"></span></a>
                        <a class="btn btn-danger" href="cart.php?delete=<?php echo $product_id; ?>"><span class="glyphicon glyphicon-remove"></span></a>
                    </td> 
                </tr>

        <?php }
                
                $_SESSION['item_total'] = $total += $sub;  //this is to help in finding the total of the cart
                
                $_SESSION['item_quantity'] = $item_quantity;   //this is to help in finding the total of the cart               
               

     
            }   
            
            }
        
        }
    }
    
    
   

?><!-----------------------------------End-------------------------------------->
    