<?php
$name = $_SESSION['admin_username'];
$sqla = mysqli_query($con,"SELECT * FROM blog_vaneskha_admin WHERE username = '$name'");
$row_admin = mysqli_fetch_array($sqla);
$chek = $row_admin["type"];
?>
 <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Administrator</a> 
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            
           
                
                    
              
            
            <ul class="dropdown-menu dropdown-user">
            <?php if($chek == 1){ ?>
                <li><a href="index.php?administrator"><i class="fa fa-user fa-fw"></i> Administrator</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
                <?php }else {?>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
                <?php }?>
               
            </ul>
            
        </li>
    </ul>
    <div class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li><a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Home</a></li>
                <li>
                    <a href="#"><i class="fa fa-pencil-square-o fa-fw"></i> Blog<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="index.php?post">Post</a></li>
                        <li><a href="index.php?comment">Comment</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="glyphicon glyphicon-picture"></i> Gallery<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="index.php?gal-post">Post</a></li>
                        <li><a href="index.php?gal-comment">Comment</a></li>
                    </ul>
                </li>
                <?php if($chek == 1){?>
                <li>
                    <a href="#"><i class="glyphicon glyphicon-star-empty"></i> Game<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="index.php?gam-post">Post</a></li>
                        <li><a href="index.php?gam-comment">Comment</a></li>
                    </ul>
                </li>
                <?php }else{}?>
            </ul>
        </div>
    </div>
</nav>