<?php
ob_start();
session_start();
include "include/config.php";
include "include/head.php";
include "include/navbar.php";
include "include/search.php";
include "include/function.php";
include "include/login.php";
date_default_timezone_set("Asia/Jakarta");
?>

<?php
if(isset($_GET["gallery"])){ include "page/gallery.php";}

else if(isset($_GET["game"])){ include "page/game.php";}
else if(isset($_GET["aboutt"])){ include "page/aboutt.php";}
else if(isset($_GET["search"])|| isset($_GET["search-p"])){ include "page/search.php";}
else if(isset($_GET["blog"])|| isset($_GET["page"])){ include "page/blog.php";}
else if(isset($_GET["blog-detail"])){ include "page/blog-detail.php";}
else if(isset($_GET["blog-category"])|| isset($_GET["cat-page"])){ include "page/blog-category.php";}
else if(isset($_GET["gallery-detail"])){ include "page/gallery-detail.php";}
else if(isset($_GET["game-detail"])){ include "page/game-detail.php";}
else if(isset($_GET["gallery-cat"])|| isset($_GET["gal-cat"])){ include "page/gallery-cat.php";}
else if(isset($_GET["game-cat"])|| isset($_GET["gam-cat"])){ include "page/game-cat.php";}
else if(isset($_GET["loginn"])){ header("location:admin/"); }
else{
include "page/index.php";
}
?>

<?php
include "include/footer.php";
mysqli_close($con);
ob_end_flush();
?>