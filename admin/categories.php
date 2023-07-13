
<?php
include"includes/admin_header.php";

?>

    <div id="wrapper">

        <!-- Navigation -->
<?php
include"includes/admin_navigation.php";

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">


                           Welcome to Admin
                            <small>Author</small>
                        </h1>



<div class="col_xs_6">

 <!-- to add categories to the table -->
        
<?php inser_categories(); ?>





                            
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add catigorey </label>
                                    <input  type="text" class="form-control" name="cat_title">
                                </div>

                                <div class="form_group">
                                    <input class=" btn btn-primary" type="submit" name="submit" value="Add categories">
                                </div>

                            </form>
                         </div>



                    <!-- Update and include  -->
                         <?php
                         if(isset($_GET['edit'])){
                            $cat_id = $_GET['edit'];

                            include "includes/update_categories.php";
                         }
                         
                         
                         ?>




                 






                         <div class="col_xs_6">



<table class="table table-bordered table table-hover"> <!-- something like a css  -->
                 <thead>
                   <tr>
                      <th>ID</th>
                     <th>category_title</th>
                  </tr>
                </thead>
                <tbody>


<?php find_all_categories(); ?>
                



<?php

delete_catgories();

?>

           
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php
include"includes/admin_footer.php";

?>