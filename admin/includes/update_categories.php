  <!-- second form -->
  <form action="" method="POST">
                                <div class="form-group">
                                    <label for="category_name"> edit categories </label>


                <?php
                
                if(isset($_GET['edit'])){

                    $cat_id = $_GET['edit'];

                    
                    $query = "SELECT * FROM categories WHERE cat_id = $cat_id " ;
                    $select_categories_id = mysqli_query($connection,$query);
               
               
                  while($row = mysqli_fetch_assoc($select_categories_id)){ // to bring back those values
                   // to bring all in database
                            $cat_id = $row['cat_id']; 
                            $cat_title = $row['cat_title'];
                         ?>   
         <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>"  type="text" class="form-control" name="cat_title">
                  
               <?php } } ?>




<!-- update query -->
               <?php
                if(isset($_POST['update_category'])){

                    $the_cat_title = escape($_POST['cat_title']);
                    $stmt =mysqli_prepare($connection, "UPDATE  categories SET cat_title = ? WHERE cat_id = ?");
                    // we must change string ($the_cat_title) with ?  
                    // and then defne ? as i or s in the blind_param

                       mysqli_stmt_bind_param($stmt, 'si', $the_cat_title, $cat_id);
                       mysqli_stmt_execute($stmt);

                
                    

                if(!$stmt){
                    die("QUERY FAILED" . mysqli_error($connection));
                    
                }

                mysqli_stmt_close($stmt);
                Redirect("categories.php");
               
                }
               
               
               ?>


                               
                     </div>

                   <div class="form_group">
                   <input class=" btn btn-primary" type="submit" name="update_category" value="update categories">

                 </div>

                            </form>