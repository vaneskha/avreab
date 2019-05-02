<?php 
$cat = mysqli_query($con,"SELECT * FROM blog_vaneskha_category");


$posst = mysqli_query($con,"SELECT * FROM blog_vaneskha_post
                            ORDER BY comment DESC
                            LIMIT 2");
?>
<div class="col-sm-3">
            <div class="panel panel-info">
            	<div class="panel-heading">
                	<h3><span class="glyphicon glyphicon-star"></span> Top Articles</h3>
                </div>
                <ul class="list-group">
                    <?php if(mysqli_num_rows($posst)){?>
                        <?php while($post_row = mysqli_fetch_array($posst)){?>
                    <li class="list-group-item"><a href="index.php?blog-detail=<?php echo $post_row["id"]?>"><h4><?php echo $post_row["title"]?></h4></a></li>
                        <?php }?>
                    <?php }?>
                </ul>
            </div>
            
            <br><br>
            
            <h3>Category</h3>
            <?php if(mysqli_num_rows($cat)){?>
                    <?php while($cat_row = mysqli_fetch_array($cat)){?>
            	<a class="btn btn-default btn-lg btn-block" href="index.php?blog-category=<?php echo $cat_row["id"]?>"><?php echo $cat_row["category_name"]?></a>
                    <?php }?>
              <?php }?>  
        </div>