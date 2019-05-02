<?php
if(isset($_GET["gam-cmt-del"])){
    $id = $_GET["gam-cmt-del"];
    $cek = mysqli_query($con,"SELECT blog_vaneskha_game_comment.* , blog_vaneskha_game.title , blog_vaneskha_game.comment
                              FROM blog_vaneskha_game_comment , blog_vaneskha_game
                              WHERE blog_vaneskha_game_comment.post_id = blog_vaneskha_game.id
                              AND blog_vaneskha_game_comment.id = '$id'");
    $stat = mysqli_fetch_array($cek);
    $post = $stat["post_id"];
    $cmt = $stat["comment"];
    $sta_t = $stat["status"];
    if($sta_t == 1){
        $cmt = $cmt-1;
        mysqli_query($con,"UPDATE blog_vaneskha_game SET comment = '$cmt' WHERE id ='$post'");
        mysqli_query($con,"DELETE FROM blog_vaneskha_game_comment WHERE id = '$id'");
        header("location:index.php?gam-comment");
    }else{
        mysqli_query($con,"DELETE FROM blog_vaneskha_game_comment WHERE id = '$id'");
        header("location:index.php?gam-comment");
    }
    
}
?>