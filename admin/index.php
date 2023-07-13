<?php include "includes/admin_header.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to the admin
                        <small> <?php echo $_SESSION['username'];?> </small>
                    </h1>
                    <h1>
                    
                    </h1>
                    

                </div>
            </div>
            <!-- correct -->
            <!-- /.row -->





<!-- correct -->
            <div class="row">
                <!-- Posts -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">


                                    
                                        
                            <!-- this is a short cut for function to count rows for a column -->
                             <div class='huge'><?php echo $post_count = recordCount('posts');  ?></div>
                                    
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>

                        
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>








<!-- correct -->
                <!-- Comments -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>

                                <div class="col-xs-9 text-right">

                                   

                        <!-- and i need to change var for each one $post_comments ,$count_user  -->
                        <div class='huge'><?php echo $post_comments = recordCount('comments');  ?></div>

                        


                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>

                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>


                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>







<!-- correct -->
<!-- 3 -->
    <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">




                          <!-- and i need to change var for each one $post_comments ,$count_user  -->
                        <div class='huge'><?php echo $count_user = recordCount('users');  ?></div>

                                <div> Users</div>
                            </div>
                        </div>
                    </div>

                    <a href="users.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>










<!-- correct -->
<!-- 4 -->
                <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-list fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">

                      <!-- and i need to change var for each one $post_comments ,$count_user  -->
                      <div class='huge'><?php echo $post_categories = recordCount('categories');  ?></div>



                            <div>Categories</div>
                        </div>
                    </div>
                </div>

                <a href="categories.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

<!-- /#page-wrapper -->

<!-- until here -->
 <!-- /.row -->



            <?php

            $query = "SELECT * FROM posts WHERE post_status = 'published'";
            $select_all_published_posts = mysqli_query($connection,$query);
            $post_published_count = mysqli_num_rows($select_all_published_posts);


        //  $post_published_counts =  checkStatus('posts','post_status','published');
            
            $query = "SELECT * FROM posts WHERE post_status = 'draft'";
            $select_all_draft_posts = mysqli_query($connection,$query);
            $post_draft_count = mysqli_num_rows($select_all_draft_posts);

// $select_all_draft_posts = checkStatus('posts','post_status','draft');



            $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
            $select_all_unapproved_posts = mysqli_query($connection,$query);
            $post_unapproved_count = mysqli_num_rows($select_all_unapproved_posts);




            $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
            $select_all_subscribers_users = mysqli_query($connection,$query);
            $subscribers_users = mysqli_num_rows($select_all_subscribers_users);

            ?>








                

<!-- correct -->
<!-- charts -->



<!-- this for flowchart -->

  <div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

            <?php
            
            $element_text = ['All posts','Active Posts', 'Draft Posts', 'Comments','Pending Comments','Users','subscribers','Categories'];
            $element_count = [   $post_count ,
                                $post_published_count,
                                $post_draft_count,
                                $post_comments,
                                $post_unapproved_count,
                                $count_user, 
                                $subscribers_users,
                                $post_categories ];
            
            for($i=0; $i < 8; $i++){
                echo"['{$element_text [$i]}' " . "," . "{$element_count [$i]}],";

            }
            
            
            ?>

        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  
  </div>
    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>







        </div>
            <!-- /.container-fluid -->
    </div>
    
            
            
            
<?php include "includes/admin_footer.php" ?>

