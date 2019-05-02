<?php
$per_page = 5;
$cur_page = 1;
if(isset($_GET["page"])){
    $cur_page = $_GET["page"];
    $cur_page = ($cur_page> 1) ? $cur_page : 1;
}

$total_data = mysqli_num_rows(mysqli_query($con,"SELECT * FROM blog_vaneskha_post"));
$total_page = ceil($total_data/$per_page);
$offset = ($cur_page - 1) * $per_page;

$query = mysqli_query($con,"SELECT * FROM blog_vaneskha_post ORDER BY id DESC LIMIT $per_page OFFSET $offset");
$cat = mysqli_query($con,"SELECT * FROM blog_vaneskha_category");
?>
<div class="container-fluid blue stop">
                <h1>Blog <small><!-- &raquo; category --></small></h1>
            </div>
            <div class="space"></div><div class="mini-space"></div><div class="mini-space"></div><hr /><div class="mini-space"></div>
<div class="container">
	<div class="row">
        <div class="col-sm-9">
        	
            <br> <?php if(mysqli_num_rows($query)){?>
                    <?php while($blog = mysqli_fetch_array($query)){?>
                <div class="panel panel-info panel-heading">
               
                    <a href="index.php?blog-detail=<?php echo $blog["id"]?>" class="heading-link"><h3 class="bordered"><?php echo $blog["title"]?></h3></a>
                        <div class="panel-body">
                            <p><?php echo $blog["description"]?></p>
                        </div>
                </div>
        
        <?php }?>
        <?php }?>
        
        <?php if(isset($total_page)){?>
            <?php if($total_page > 1){?>
        <nav>
          <ul class="pager">
          <?php if($cur_page > 1){?>
            <li class="previous"><a href="index.php?page=<?php echo ($cur_page - 1)?>"><span aria-hidden="true">&larr;</span></a></li>
            <?php }else{?>
            <?php }?>
            
             <?php if($cur_page < $total_page){?>
            <li class="next"><a href="index.php?page=<?php echo ($cur_page + 1)?>"> <span aria-hidden="true">&rarr;</span></a></li>
            <?php }else{?>
            <?php }?>
          </ul>
        </nav>
            <?php }?>
        <?php }?>
        </div>
        <?php include "include/category.php";?>
    </div>
</div>