<?php
if(isset($_GET["commen-approve"])){
    $comment_id = $_GET["commen-approve"];
    $id = $_GET["post-id"];
    $cur_cmt = 1 + $_GET["commenta"];
    
    mysqli_query($con,"UPDATE blog_vaneskha_gallery SET fav = '$cur_cmt' WHERE id ='$id'"); 
    mysqli_query($con,"UPDATE blog_vaneskha_gallery_comment SET status = '1' WHERE id = '$comment_id'");
    header("location:index.php?approve-success");
}else{
header("location:index.php?approve-failed");
}
    

?>