<?php
$category_id = $_GET["blog-category"];
/** paging **/
$per_page = 4;
$cur_page = 1;
if(isset($_GET["cat-page"])){
    $cur_page = $_GET["cat-page"];
    $cur_page = ($cur_page> 1) ? $cur_page : 1;
}

$total_data = mysqli_num_rows(mysqli_query($con,"SELECT * FROM blog_vaneskha_post WHERE category_id = '$category_id'"));
$total_page = ceil($total_data/$per_page);
$offset = ($cur_page - 1) * $per_page;


$query = mysqli_query($con,"SELECT * FROM blog_vaneskha_post 
                            WHERE category_id = '$category_id' 
                            ORDER BY id DESC LIMIT $per_page OFFSET $offset");

/** -------------- **/
$cate = mysqli_query($con,"SELECT blog_vaneskha_category.category_name FROM blog_vaneskha_category WHERE id = '$category_id'");

?>
<div class="container">
	<div class="row">
        <div class="col-sm-9">
        	<div class="container-fluid blue">
                <?php if(mysqli_num_rows($cate)){
                    while($cat = mysqli_fetch_array($cate)){?>
                <h1>Blog <small> &raquo; <?php echo $cat["category_name"]?> &andand;<a href="index.php?blog">Back</a></small></h1>
                <?php } }?>
            </div>
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
            <li class="previous"><a href="index.php?cat-page=<?php echo ($cur_page - 1) . "&blog-category=" . $category_id?>"><span aria-hidden="true">&larr;</span></a></li>
            <?php }else{?>
            <?php }?>
            
             <?php if($cur_page < $total_page){?>
            <li class="next"><a href="index.php?cat-page=<?php echo ($cur_page + 1) . "&blog-category=" . $category_id?>"> <span aria-hidden="true">&rarr;</span></a></li>
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