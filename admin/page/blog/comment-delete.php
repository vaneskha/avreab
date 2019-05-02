<?php
if(isset($_GET["comment-delete"])){
    $id = $_GET["comment-delete"];
    $cek = mysqli_query($con,"SELECT blog_vaneskha_post_comment.* , blog_vaneskha_post.title , blog_vaneskha_post.comment
                              FROM blog_vaneskha_post_comment , blog_vaneskha_post
                              WHERE blog_vaneskha_post_comment.post_id = blog_vaneskha_post.id
                              AND blog_vaneskha_post_comment.id = '$id'");
    $stat = mysqli_fetch_array($cek);
    $post = $stat["post_id"];
    $cmt = $stat["comment"];
    $sta_t = $stat["status"];
    if($sta_t == 1){
        $cmt = $cmt-1;
        mysqli_query($con,"UPDATE blog_vaneskha_post SET comment = '$cmt' WHERE id ='$post'");
        mysqli_query($con,"DELETE FROM blog_vaneskha_post_comment WHERE id = '$id'");
        header("location:index.php?comment");
    }else{
        mysqli_query($con,"DELETE FROM blog_vaneskha_post_comment WHERE id = '$id'");
        header("location:index.php?comment");
    }
    
}
?>