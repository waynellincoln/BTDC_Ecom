<div class="col-md-3">
    <p class="lead">Shop Name</p>
    <div class="list-group">
      
       <!--Query to display categories from database unto index page-->
       <?php
        
            $sql = "SELECT *
                      FROM categories";
        
            $display_categories = mysqli_query($con, $sql);
        
            while ($row = mysqli_fetch_array($display_categories)) {
                
                $cat_id     = $row['cat_id'];
                $cat_title  = $row['cat_title'];
                
                echo "<a href='../public/category.php?id={$cat_id}' class='list-group-item'>{$cat_title} </a>";
                
                if (!$display_categories) {
                    
                    die("Failed Query " . mysqli_error($con));
                } 
                
            }
        
        ?>
       
       
       
    </div>
</div>