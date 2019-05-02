<?php
if(isset($_GET["gal-post-del"]) && $_GET["cat-id"]){
    $post_id = $_GET["gal-post-del"];
    $cat = $_GET["cat-id"];
    mysqli_query($con,"DELETE FROM blog_vaneskha_gallery WHERE id = '$post_id'");
    mysqli_query($con,"DELETE FROM blog_vaneskha_gallery_comment WHERE post_id = '$cat'");
    header("location:index.php?gal-post");
}

?>