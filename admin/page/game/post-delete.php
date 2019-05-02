<?php
if(isset($_GET["gam-post-del"]) && $_GET["cat-id"]){
    $id = $_GET["gam-post-del"];
    $cat = $_GET["cat-id"];
    mysqli_query($con,"DELETE FROM blog_vaneskha_game WHERE id = '$id'");
    mysqli_query($con,"DELETE FROM blog_vaneskha_game_comment WHERE post_id = '$cat'");
    header("location:index.php?gam-post");
}
?>