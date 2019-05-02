<?php
if(isset($_GET["administrator-delete"])){
    $id = $_GET["administrator-delete"];
    mysqli_query($con,"DELETE FROM blog_vaneskha_admin WHERE id = '$id'");
    header("location:index.php?administrator");
}



?>