
<!-- Configuration-->

<?php require_once("../resources/config.php"); ?>


<!-- Header-->
<?php include(TEMPLATE_FRONT .  "/header.php");?>


     <!--Navigation -->



         <!-- Contact Section -->
         
         <!-- Code to Send Email from user to owners of website; Code used on contact page -->
    <?php  
         if (isset($_POST['submit'])) {
         
             $to                    = "waynellincoln@hotmail.com";
             
             $from_name             = $_POST['name'];
             $email                 = $_POST['email'];
             $subject               = $_POST['subject'];
             $message               = $_POST['message'];
             
             $headers               = "From: {$from_name} {$email}";
             
             $result = mail($to, $subject, $message, $headers);
             
             if (!result) {
                 
                 echo "ERROR";
                 
             } else {
                 
                 echo "SENT";
             }
         
         }
         
    ?>
        
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Your Subject *" id="subject" required data-validation-required-message="Please enter your subject.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" name="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT .  "/footer.php");?>