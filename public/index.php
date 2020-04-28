<?php require_once ("../resources/config.php"); ?>

<?php include (TEMPLATE_FRONT . DS . "header.php"); ?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">
         
        <!--categories start here-->
         <?php include (TEMPLATE_FRONT . DS . "side_nav.php"); ?>   

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                         <?php include (TEMPLATE_FRONT . DS . "slider.php"); ?>
                    </div>

                </div>

                <div class="row">

                    
                       
                       <?php
                            $sql = "SELECT *
                                    FROM products ";
                        
                            $display_products_on_home_page = mysqli_query ($con, $sql);
                        
                            while ($row = mysqli_fetch_array($display_products_on_home_page)) {
                                
                                $product_id             = $row['product_id'];
                                $product_title          = $row['product_title'];
                                $product_price          = $row['product_price'];
                                $product_description    = $row['product_description'];
                                $product_image          = $row['product_image'];
                                
                        ?> 
                        
                       <div class="col-sm-4 col-lg-4 col-md-4"> 
                        <div class="thumbnail">
                           <a href="item.php?id=<?php echo $product_id ;?>"><img src=<?php echo $product_image;?> alt='' width=320></a>
                            <div class="caption">
                                <h4 class='pull-right'><?php echo $product_price;?> </h4>
                                <h4><a href=''><?php echo $product_title; ?></a>
                                </h4>
                                <p><?php echo $product_description;?></p>
                                <a class="btn btn-primary" target="_blank" href="#">Add To Cart</a>
                                 
                             </div> 
                         </div>
                        </div>
                        
                    <?php  } ?>  
                                       
                    </div>
                </div>
            </div>

               
                        
                        

        </div>  <!--ROW ends-->

     </div>

        </div>

    </div>
    <!-- /.container -->
    
<?php include (TEMPLATE_FRONT . DS . "footer.php"); ?>