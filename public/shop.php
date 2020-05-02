<?php require_once ("../resources/config.php"); ?>

<?php include (TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
<div class="container">
    

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>A Warm Welcome!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
            <p><a class="btn btn-primary btn-large">Call to action!</a>
            </p>
        </header>

        <hr>
        
        
       
        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Features</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
            
            <?php
        
            //Query to display products based on the category clicked on the index page
                
                $query = "SELECT *
                          FROM products";
           
                $display_products_on_shop_page = mysqli_query($con, $query);
                
                while ($row = mysqli_fetch_array($display_products_on_shop_page)) {
                    
                    $product_id             = $row['product_id'];
                    $product_title          = $row['product_title'];
                    $product_price          = $row['product_price'];
                    $short_desc             = $row['short_desc'];
                    $product_description    = $row['product_description'];
                    $product_image          = $row['product_image'];
                    
           ?>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3><?php echo $product_title; ?></h3>
                        <p><?php echo $short_desc; ?></p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id=<?php echo $product_id; ?>" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
            
            <?php   }  ?>
        
        </div>
        <!-- /.row -->
        
         
        
        
        
        <hr>
        
     
        <!-- Footer -->
   
<?php include (TEMPLATE_FRONT . DS . "footer.php"); ?>