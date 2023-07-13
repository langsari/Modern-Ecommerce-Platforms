<?php

if(isset($_POST['checkBoxArray'])) {

    // to show the post id when i apply
    foreach($_POST['checkBoxArray'] as $postValueId ){
        // echo $checkBoxValue;
        // echo"<br>";
        $bulk_options = $_POST['bulk_options'];
        $connection = mysqli_connect('localhost', 'username', 'password', 'cms');
        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        switch($bulk_options){

            case 'published':
                $postValueId = mysqli_real_escape_string($connection, $postValueId);
                $bulk_options = mysqli_real_escape_string($connection, $bulk_options);

                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
                $update_publish = mysqli_query($connection,$query);
                confirm($update_publish);


                if (!$update_publish) {
                    die("QUERY FAILED " . mysqli_error($connection));
                }
                break;



                case 'draft':
                    $postValueId = mysqli_real_escape_string($connection, $postValueId);
                    $bulk_options = mysqli_real_escape_string($connection, $bulk_options);

                    $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
                    $update_draft = mysqli_query($connection,$query);
                    confirm($update_draft);
    
    
                    if (!$update_draft) {
                        die("QUERY FAILED " . mysqli_error($connection));
                    }
                    break;




                    case 'delete':
                        $postValueId = mysqli_real_escape_string($connection, $postValueId);
                        $bulk_options = mysqli_real_escape_string($connection, $bulk_options);

                        $query = "DELETE  FROM posts  WHERE post_id = {$postValueId} ";
                        $update_delete = mysqli_query($connection,$query);
                        confirm($update_delete);
                        break;



                        // to repeat posts more and more
                case 'clone':

                $query = "SELECT * FROM posts WHERE post_id = '{$postValueId}' ";
                $select_query_posts = mysqli_query($connection, $query);

                while($row = mysqli_fetch_array($select_query_posts)) {
                    $post_title   = $row['post_title'];
                    $post_category_id  = $row['post_category_id'];
                    $post_date   = $row['post_date'];

                    $post_author  = $row['post_author'];
                    $post_status  = $row['post_status'];
                    $post_image  = $row['post_image'];
                    $post_tags   = $row['post_tags'];
                    $post_content  = $row['post_content'];
              
                  
                    
                }

                    

            $query = " INSERT INTO posts(post_category_id,
                                        post_title,
                                        post_author, 
                                        post_date,
                                        post_image,
                                        post_content,
                                        post_tags,
                                        post_status)";

                            $query .= "VALUES({$post_category_id},
                                    '{$post_title}',
                                    '{$post_author}',
                                        now(),
                                    '{$post_image}',
                                    '{$post_content}',
                                    '{$post_tags}',
                                
                                    '{$post_status}') ";

                                $copy_query = mysqli_query($connection, $query);
                                if(!$copy_query){
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }
                                break;
        }
    }
    // echo "Re
}


















//                     // to repeat posts more and more
    //             case 'clone':

    //             $query = "SELECT * FROM posts WHERE post_id = '{$postValueId}' ";
    //             $select_query_posts = mysqli_query($connection, $query);

    //             while($row = mysqli_fetch_array($select_query_posts)) {
    //                 $post_title   = $row['post_title'];
    //                 $post_category_id  = $row['post_category_id'];
    //                 $post_date   = $row['post_date'];

    //                 $post_author  = $row['post_author'];
    //                 $post_status  = $row['post_status'];
    //                 $post_image  = $row['post_image'];
    //                 $post_tags   = $row['post_tags'];
    //                 $post_content  = $row['post_content'];
              
                  
                    
    //             }

                    

    //         $query = " INSERT INTO posts(post_category_id,
    //                                     post_title,
    //                                     post_author, 
    //                                     post_date,
    //                                     post_image,
    //                                     post_content,
    //                                     post_tags,
    //                                     post_status)";

    //                         $query .= "VALUES({$post_category_id},
    //                                 '{$post_title}',
    //                                 '{$post_author}',
    //                                     now(),
    //                                 '{$post_image}',
    //                                 '{$post_content}',
    //                                 '{$post_tags}',
                                
    //                                 '{$post_status}') ";

    //                             $copy_query = mysqli_query($connection, $query);
    //                             if(!$copy_query){
    //                                 die("QUERY FAILED" . mysqli_error($connection));
    //                             }
    //                             break;