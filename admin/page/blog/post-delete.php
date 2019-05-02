<?php
if(isset($_GET["post-delete"])){
    $post_id = $_GET["post-delete"];
    mysqli_query($con,"DELETE FROM blog_vaneskha_post WHERE id = '$post_id'");
    mysqli_query($con,"DELETE FROM blog_vaneskha_post_comment WHERE post_id = '$post_id'");
    header("location:index.php?post");
}

?>