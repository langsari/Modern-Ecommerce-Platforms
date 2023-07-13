<table class="table table-bordered table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>comment</th>
                                <th>email</th>
                                <th>status</th>
                                
                                
                                <th>In response to</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>UnApprove</th>
                                <th>Delete</th>
                               
                            </tr>
                        </thead>
<tbody>

<?php


$query = "SELECT * FROM comments";
$select_comments = mysqli_query($connection,$query);


while($row = mysqli_fetch_assoc($select_comments)){
    $comment_id = $row['comment_id']; 
    $comment_post_id  = $row['comment_post_id'];
    $comment_author   = $row['comment_author'];
    $comment_content  = $row['comment_content'];
    $comment_email  = $row['comment_email'];
    $comment_status  = $row['comment_status'];
    $comment_date   = $row['comment_date'];

   

    //to display
    echo "<tr>";
    echo "<td>$comment_id </td>";
    echo "<td>$comment_author</td>";
    echo "<td>$comment_content</td>";
     
   


    echo "<td>$comment_email</td>";
    echo"<td>$comment_status</td>";


        // to give me a link of comment post
        $query = "SELECT * FROM posts WHERE post_id =  $comment_post_id ";
        $select_post_id = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_post_id)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];

                 echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
        }  


    echo "<td>$comment_date</td>";
    echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
    echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
    
    echo "<td><a href='post_comments.php?delete=$comment_id'>Delete</a></td>";
    
    echo "</tr>";
}

?>

                    </tbody>
                    </table>

<?php



if(isset($_GET['approve'])){
    $the_comment_id = $_GET['approve'];
    // WHERE comment_id = {$the_approve_id}
    // 

    $query = "UPDATE comments  SET comment_status = 'approved' WHERE comment_id = {$the_comment_id} ";
    $approve_comment_query = mysqli_query($connection, $query);
    header("Location: comments.php");
    // echo "approved already"; 
}


if(isset($_GET['unapprove'])){
     
    $the_comment_id = $_GET['unapprove'];
    //if i do not write will unapproove everything
    // = {$the_unapprove_id} 
    // WHERE comment_id = {$the_comment_id}
    $query = "UPDATE comments  SET comment_status = 'unapproved' WHERE comment_id = {$the_comment_id}   ";
    $unapprove_comment_query = mysqli_query($connection, $query);
    header("Location: comments.php");
   
}











          if(isset($_GET['delete'])){
            $the_comment_id = $_GET['delete'];

            $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: post_comments.php?id=". $_GET['id']."");



            echo "hello"; //to check if delete show this message just to make sure

          }
                    ?>