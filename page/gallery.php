<?php
$galle = mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery ORDER BY id DESC LIMIT 3");
$ga = mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery");
$cate = mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery_cat");
$gaa = mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery ORDER BY fav DESC LIMIT 1");
?>
<div class="container-fluid stop">
	<div class="row">
    	<div class="col-sm-12 blue yello">
        	<h2>Gallery<span> <a href="index.php?gallery#browse" class="yellotxt">Browse</a></span></h2>
        </div>
    </div>
</div>
<div class="container">
	<div class="row">
    	<div class="col-sm-12">
	<img width="100%" height="400px" class="opening" src="img/">
    	<h3>Latest Posts &darr;</h3>
        <div class="col-sm-4">
        	<ul class="bxslider">
            <?php if(mysqli_num_rows($galle)){?>
                <?php while($galle_row = mysqli_fetch_array($galle)){?>
              <li><a href="index.php?gallery-detail=<?php echo $galle_row["id"]?>"><img src="img/<?php echo $galle_row["image"]?>"/></a></li>
              <?php }?>
              <?php }?>
            </ul>
            </div>
            <div class="col-sm-4"></div>
            
            <div class="col-sm-4">
            	<img src="img/"/>
            </div>
            
        </div>
    </div>
</div>
<div class="spacing">
</div>
<div class="container-fluid">
	<div class="container">
    	<div class="row">
        <div class="col-sm-4">
        	            	
                	<h2> By Category &raquo;</h2><hr>
                    
                    <div class="game-cate">
                        <?php if(mysqli_num_rows($cate)){?>
                            <?php while($cate_row = mysqli_fetch_array($cate)){?>
    					<a href="index.php?gallery-cat=<?php echo $cate_row["id"]?>"><h3>&loz; <?php echo $cate_row["category_name"]?> </h3></a>
                            <?php }?>
                        <?php }?>
                   </div>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
                	 <h2>Top Artworks</h2>
                     <div class="mini-space"></div>
                     <?php if(mysqli_num_rows($gaa)){?>
                        <?php while($gaa_row = mysqli_fetch_array($gaa)){?>
                     <h3><?php echo $gaa_row["title"]?></h3>
                     <div class="mini-space"></div>
                     <img class="img-responsive" src="img/<?php echo $gaa_row["image"]?>" width="400px"/>
                     <div class="mini-space"></div>
                     <a class="btn btn-warning btn-lg" href="index.php?gallery-detail=<?php echo $gaa_row["id"]?>" role="button">View</a>
                         <?php }?>
                     <?php }?>
          </div>
          </div>
    </div>
</div>
<div class="spacing">
</div>

<div class="container-fluid coloring-y" id="browse">                    
<div class="container">
	<h1>Browse Gallery</h1>
    <div class="space"></div>
    <div class="row">
     <?php if(mysqli_num_rows($ga)){?>
        <?php while($galerow = mysqli_fetch_array($ga)){?>
      <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
          <a href="index.php?gallery-detail=<?php echo $galerow["id"]?>"><img src="img/<?php echo $galerow["image"]?>" width="100%" height="100%"></a>
          <div class="caption">
            <h3><a href="index.php?gallery-detail=<?php echo $galerow["id"]?>"><?php echo $galerow["title"]?></a></h3>
          </div>
        </div>
      </div>
        <?php }?>
      <?php }?>
</div>
</div>
<div class="spacing"></div>
    </div>
