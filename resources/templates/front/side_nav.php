<div class="col-md-3">
    <p class="lead">Shop Name</p>
    <div class="list-group">
      
       <!--Query to display categories from database unto index page-->
       <?php
        
            $query = "SELECT *
                      FROM categories";
        
            $display_categories = mysqli_query($con, $query);
        
            while ($row = mysqli_fetch_array($display_categories)) {
                
                $cat_id     = $row['cat_id'];
                $cat_title  = $row['cat_title'];
                
                echo "<a href='#' class='list-group-item'>{$cat_title} </a>";
                
                if (!$display_categories) {
                    
                    die("Failed Query " . mysqli_error($con));
                } 
                
            }
        
        ?>
       
       
       
    </div>
</div>