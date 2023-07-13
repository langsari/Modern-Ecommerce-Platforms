<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>




 <?php
 if(isset($_POST['submit'])){

// that is all to encryp password
      $to =    $_POST['supportedwin@gmail.com'];
      $subject =    $_POST['subject'];
      $body =    $_POST['body'];

} 
 
 ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>contact</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">


                        <!-- <h6 class="text-center"> <?php echo $message;?> </h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div> -->

                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                        </div>

                         <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your subject">
                        </div>
                         <div class="form-group">
                            <!-- form control instead of this (cols="30" rows="10") -->
                            <textarea class="form-control" name="body" id="body" ></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
