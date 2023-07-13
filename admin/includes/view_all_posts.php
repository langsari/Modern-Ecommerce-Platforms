<?php
// code will hide the warning
error_reporting(E_ERROR | E_PARSE);



if(isset($_POST['checkboxArray'])) {
    foreach($_POST['checkboxArray'] as $post_value_id) {
//        echo $checkboxValue;
        $bulk_options = $_POST['bulk_options'];
        
        switch($bulk_options) {
            case 'published':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $post_value_id";
                $update_to_published = mysqli_query($connection, $query);
                confirm($update_to_published);
                break;
            case 'draft':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $post_value_id";
                $update_to_draft = mysqli_query($connection, $query);
                confirm($update_to_draft);
                break;
            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = $post_value_id";
                $delete_posts = mysqli_query($connection, $query);
                confirm($delete_posts);
                break; 
            case 'clone':
                $query = "SELECT * FROM posts WHERE post_id = $post_value_id ";
                $select_posts_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_posts_query)) {
//                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
//                    $post_comment_count = $row['post_comment_count'];
                    $post_date = $row['post_date'];   
                }
                $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
    
                $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status} ')";

                $copy_post_query = mysqli_query($connection, $query);
                
                if(!$copy_post_query) {
                    die("QUERY FAILED.".mysqli_error($connection));    
                }
                
                break;     
                
        }
    }
}

?>

<form action="" method="post">

<table class="table table-bordered table-hover">

    <div id="bulkOptionsContainer" class="col-xs-4">
        
        <select class="form-control" name="bulk_options" id="">
            <option value="">Select Options</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
            <option value="clone">Clone</option>
        </select>

    </div>
    
    <div class="col-xs-4">
        
        <input type="submit" class="btn btn-success" name="submit" value="Apply">
        <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
        
    </div>
    
    <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>Id</th>
            <th>User</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>View Post</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>View Count</th>
        </tr>
    </thead>
    
    <tbody>
                                
                                   
<?php

    $query = "SELECT * FROM posts ORDER BY post_id DESC";
    $select_posts = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_user = $row['post_user'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_views_count = $row['post_views_count'];
        
        echo "<tr>";
        
    ?>
        <td><input class='checkboxes' type='checkbox' name="checkboxArray[]" value='<?php echo $post_id ?>'></td>
    
    <?php
        echo "<td>{$post_id}</td>";
        
        if(/*isset($post_author) || */!empty($post_author)) { 
            echo "<td>{$post_author}</td>";
        } else if(/*isset($post_user) || */!empty($post_user)) {
//            $get_post_username = "SELECT username FROM users WHERE user_id = {$post_user}";
//            $select_post_username = mysqli_query($connection, $get_post_username);
//            
//            $row = mysqli_fetch_assoc($select_post_username);
//            $post_user = $row['username'];
//            
            echo "<td>{$post_user}</td>";
        }
            
        
        echo "<td>{$post_title}</td>";
        
        
        
        $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
        $select_categories_id = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];  
        
        echo "<td>{$cat_title}</td>";
        }
        
        
        echo "<td>{$post_status}</td>";
        echo "<td><img width='100' src='../images/{$post_image}'></td>";
        echo "<td>{$post_tags}</td>";
        
        $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
        $send_comment_query = mysqli_query($connection, $query);
        
        $row = mysqli_fetch_array($send_comment_query);
        $comment_id = $row['comment_id'];
        $count_comments = mysqli_num_rows($send_comment_query);
        
        echo "<td><a href='post_comments.php?id={$post_id}'>{$count_comments}</a></td>";
        
        
        echo "<td>{$post_date}</td>";
        echo "<td><a href='../post.php?&p_id={$post_id}'>View Post</a></td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "<td>{$post_views_count}</td>";
        echo "<td><a href='posts.php?reset_views={$post_id}'>Reset Views</a></td>";
        echo "</tr>";
    }
    
?>
                                
    </tbody>
    </table>
</form> 
                       
<?php 
    
    if(isset($_GET['delete'])) {
        $the_post_id = $_GET['delete'];
        
        $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
        
        $delete_query = mysqli_query($connection, $query);
        header("LOCATION: posts.php");
    }

    if(isset($_GET['reset_views'])) {
        $the_post_id = $_GET['reset_views'];
        
        $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = {$the_post_id}";
        
        $reset_views = mysqli_query($connection, $query);
        header("LOCATION: posts.php");
    }

?>
                     
                    
                   
                  
                 
                
               
              
             
            
           
          