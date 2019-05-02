<?php 
ob_start();
session_start();
if(!isset($_SESSION['admin_id']))header("location:login.php");
include "../include/config.php";
include "../include/function.php";
?>
<!DOCTYPE html>
<html>
<?php include("include/head.php") ?>
<body>
    <div id="wrapper">
        <?php include("include/header.php") ?>
        <div id="page-wrapper">
            <?php
            if (isset($_GET["category"])) include("page/blog/category.php");
            else if (isset($_GET["post"])) include("page/blog/post.php");
            else if (isset($_GET["comment"])) include("page/blog/comment.php");
            else if (isset($_GET["category"])) include("page/gallery/category.php");
            else if (isset($_GET["gallery-post"])) include("page/galery/post.php");
            else if (isset($_GET["gallery-comment"])) include("page/gallery/comment.php");
            else if (isset($_GET["user"])) include("page/user/index.php");
            else if (isset($_GET["administrator"])) include("page/administrator/index.php");
            else if (isset($_GET["administrator-delete"])) include("page/administrator/delete.php");
            else if (isset($_GET["administrator-update"])) include("page/administrator/update.php");
            else if (isset($_GET["post-delete"])) include("page/blog/post-delete.php");
            else if (isset($_GET["post-update"])) include("page/blog/post-update.php");
            else if (isset($_GET["comment-delete"])) include("page/blog/comment-delete.php");
            else if (isset($_GET["comment-update"])) include("page/blog/comment-update.php");
            else if (isset($_GET["gal-post"])) include("page/gallery/post.php");
            else if (isset($_GET["gal-post-up"])) include("page/gallery/post-update.php");
            else if (isset($_GET["gal-post-del"])) include("page/gallery/post-delete.php");
            else if (isset($_GET["gal-comment"])) include("page/gallery/comment.php");
            else if (isset($_GET["gal-cmt-del"])) include("page/gallery/comment-delete.php");
            else if (isset($_GET["gam-comment"])) include("page/game/comment.php");
            else if (isset($_GET["gam-cmt-del"])) include("page/game/comment-delete.php");
            else if (isset($_GET["gam-post"])) include("page/game/post.php");
            else if (isset($_GET["gam-post-del"])) include("page/game/post-delete.php");
            else if (isset($_GET["gam-post-up"])) include("page/game/post-update.php");
            else if (isset($_GET["comment-approve"])) include("page/home/comment-approve.php");
            else if (isset($_GET["approve-success"])||isset($_GET["approve-fail"])) include("page/home/index.php");
            else if (isset($_GET["commen-approve"])) include("page/home/approve-gal.php");
            else if (isset($_GET["commn-approve"])) include("page/home/approve-gam.php");
            else include("page/home/index.php");
            ?>
        </div>
    </div>
    <?php include("include/footer.php") ?>
</body>
</html>
<?php
mysqli_close($con);
ob_end_flush();
?>
