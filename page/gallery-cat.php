<?php
$gal_cat = mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery_cat");


/** paging **/

$category_id = $_GET["gallery-cat"];

$per_page = 9;
$cur_page = 1;

if(isset($_GET["gal-cat"])){
    $cur_page = $_GET["gal-cat"];
    $cur_page = ($cur_page>1) ? $cur_page : 1;
}

$tot_data = mysqli_num_rows(mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery 
                                               WHERE category_id = '$category_id'"));
$tot_page = ceil($tot_data/$per_page);
$offset = ($cur_page - 1) * $per_page;

$query = mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery
             WHERE category_id = '$category_id'
             ORDER BY id DESC
             LIMIT $per_page OFFSET $offset");


/** ---------------------------------- **/

$nam = mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery_cat WHERE id = '$category_id'");
$nam_row = mysqli_fetch_array($nam);

?>
<div class="container-fluid">
	<div class="row">
    	<div class="col-sm-12 blue">
        	<h2>Gallery<span> <a href="index.php?gallery#browse">Browse</a></span></h2>
        </div>
    </div>
</div>

<div class="spacing">
</div>
<div class="container-fluid coloring">                    
<div class="container">
    <div class="col-sm-9">
	<h1><?echo $nam_row["category_name"]?></h1>
    <div class="space"></div>
    <div class="row">
     <?php if(mysqli_num_rows($query)){?>
        <?php while($galerow = mysqli_fetch_array($query)){?>
      <div class="col-sm-6 col-md-4">
      <div class="thumbnail fix">
          <img src="../img/<?php echo $galerow["image"]?>" width="200px" height="200px">
          <div class="caption">
            <h3><a href="index.php?gallery-detail=<?php echo $galerow["id"]?>"><?php echo $galerow["title"]?></a></h3>
          </div>
        </div>
      </div>
        <?php }?>
      <?php }?>
      
      
      
      
</div>
<?php if(isset($tot_page)){?>
            <?php if($tot_page > 1){?>
        <nav>
          <ul class="pager">
          <?php if($cur_page > 1){?>
            <li class="previous"><a href="index.php?gal-cat=<?php echo ($cur_page - 1) . "&gallery-cat=" . $category_id?>"><span aria-hidden="true">&larr;</span></a></li>
            <?php }else{?>
            <?php }?>
            
             <?php if($cur_page < $tot_page){?>
            <li class="next"><a href="index.php?gal-cat=<?php echo ($cur_page + 1) . "&gallery-cat=" . $category_id?>"> <span aria-hidden="true">&rarr;</span></a></li>
            <?php }else{?>
            <?php }?>
          </ul>
        </nav>
        <?php }?>
        <?php }?>
</div>

<div class="col-sm-3">
                	<h2> Category &raquo;</h2>
                    <div class="mini-space"></div>
                    <div class="game-cate">
                        <?php if(mysqli_num_rows($gal_cat)){?>
                            <?php while($cat_row = mysqli_fetch_array($gal_cat)){?>
    					<a href="index.php?gallery-cat=<?php echo $cat_row["id"]?>"><p>&loz; <?php echo $cat_row["category_name"]?></p></a>
                        <?php }?>
                        <?php }?>
                   </div>
                    <div class="spacing">
        </div>
        </div>
       
        </div>
        </div>
<div class="space">
</div>