<?php
if(isset($_GET["comment-approve"])){
    $comment_id = $_GET["comment-approve"];
    $id = $_GET["post-id"];
    $cur_cmt = 1 + $_GET["commenta"];
    
    mysqli_query($con,"UPDATE blog_vaneskha_post SET comment = '$cur_cmt' WHERE id ='$id'"); 
    mysqli_query($con,"UPDATE blog_vaneskha_post_comment SET status = '1' WHERE id = '$comment_id'");
    header("location:index.php?approve-success");
}else{
header("location:index.php?approve-failed");
}
    

?>