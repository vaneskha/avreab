<?php
if(isset($_GET["gal-cmt-del"])){
    $id = $_GET["gal-cmt-del"];
    $cek = mysqli_query($con,"SELECT blog_vaneskha_gallery_comment.* , blog_vaneskha_gallery.title , blog_vaneskha_gallery.comment
                              FROM blog_vaneskha_gallery_comment , blog_vaneskha_gallery
                              WHERE blog_vaneskha_gallery_comment.post_id = blog_vaneskha_gallery.id
                              AND blog_vaneskha_gallery_comment.id = '$id'");
    $stat = mysqli_fetch_array($cek);
    $post = $stat["post_id"];
    $cmt = $stat["comment"];
    $sta_t = $stat["status"];
    if($sta_t == 1){
        $cmt = $cmt-1;
        mysqli_query($con,"UPDATE blog_vaneskha_gallery SET fav = '$cmt' WHERE id ='$post'");
        mysqli_query($con,"DELETE FROM blog_vaneskha_gallery_comment WHERE id = '$id'");
        header("location:index.php?comment");
    }else{
        mysqli_query($con,"DELETE FROM blog_vaneskha_gallery_comment WHERE id = '$id'");
        header("location:index.php?comment");
    }
    
}
?>