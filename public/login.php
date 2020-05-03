<?php require_once ("../resources/config.php"); ?>

<?php include (TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
    <div class="container">
      
       <?php
            if (isset($_POST['submit'])) {

                $username       = mysqli_real_escape_string($con, $_POST['username']);
                $password       = mysqli_real_escape_string($con, $_POST['password']);
                
                $sql = "SELECT *
                        FROM users
                        WHERE username = '{$username}'
                        AND password = '{$password}' ";
                
                $login_query = mysqli_query ($con, $sql);
                
                if (mysqli_num_rows($login_query) == 0) {
                    
                    set_message("Your username or password is wrong");
//                    header("Location: login.php");
                    
                }else {
                    
                    header("Location: ./admin/index.php");
                }
            }
    ?>

      <header>
        <h1 class="text-center">Login</h1>
            <h3 class="text-center bg-warning"><?php display_message(); ?></h3>
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">
               
                <div class="form-group"><label for="username">
                    Username<input type="text" name="username" class="form-control"></label>
                </div>
                
                 <div class="form-group"><label for="password">
                    Password<input type="password" name="password" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" >
                </div>
            </form>
        </div> 
    </header>


    </div>

   
    <!-- /.container -->

    <div class="container">

        <hr>
<?php include (TEMPLATE_FRONT . DS . "footer.php"); ?>