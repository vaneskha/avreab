<?php
$game = mysqli_query($con,"SELECT * FROM blog_vaneskha_game ORDER BY id DESC LIMIT 1");
$gamme = mysqli_query($con,"SELECT * FROM blog_vaneskha_game ORDER BY id DESC");
$top = mysqli_query($con,"SELECT * FROM blog_vaneskha_game ORDER BY comment DESC LIMIT 1");
$gss = mysqli_query($con,"SELECT * FROM blog_vaneskha_game_cat");
?>

<div class="container-fluid stop">
	<div class="row">
    	<div class="col-sm-12 green">
        	<h2>Games<span> <a href="index.php?game#browse" class="greentxt">Browse</a></span></h2>
        </div>
    </div>
</div>
            <div class="space">
            </div>
            <div class="container">
            	<div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
            	<div class="jumbotron"> 
                	<h1 class="game-head">Latest Games</h1>
                     <div class="thumbnail">
                     <?php if (mysqli_num_rows($game)){?>
                        <?php while ($game_row = mysqli_fetch_array($game)){?>
                     	<img height="400px" width="550px" src="img/<?php echo $game_row["image"]?>"/>
                     </div>
                     
                      <p><a class="btn btn-success btn-lg" href="index.php?game-detail=<?php echo $game_row["id"]?>" role="button">Go to Game</a></p>
                </div>
                <?php } }?>
                </div>
                <div class="col-sm-2">
                </div>
                </div>
            </div>
<div class="spacing">
</div>
<div class="container-fluid">
	<div class="container">
    	<div class="row">
        <div class="col-sm-4">
        	            	
                	<h2> By Category &raquo;</h2>
                    <div class="mini-space"></div>
                    <div class="game-cate">
                        <?php if(mysqli_num_rows($gss)){?>
                            <?php while ($gs_row = mysqli_fetch_array($gss)){?>
    					<a href="index.php?game-cat=<?php echo $gs_row["id"]?>"><h3>&loz; <?php echo $gs_row["category_name"]?> </h3></a>
                            <?php }?>
                        <?php }?>
                   </div>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
                	 <h2>Top Games</h2>
                     <?php if(mysqli_num_rows($top)){?>
                        <?php while ($top_row = mysqli_fetch_array($top)){?>
                     <div class="mini-space"></div>
                     <h3><?php echo $top_row["title"]?></h3>
                     <div class="mini-space"></div>
                     <img class="img-responsive" src="img/<?echo $top_row["image"]?>"/>
                     <div class="mini-space"></div>
                     <a class="btn btn-success btn-lg" href="index.php?game-detail=<?php echo $top_row["id"]?>" role="button">Go to Game</a>
                        <?php }?>
                     <?php }?>
          </div>
          </div>
    </div>
</div>
<div class="spacing">
</div>

<div class="container-fluid coloring-g" id="browse">                    
<div class="container">
	<h1>Browse Games</h1>
    <div class="space"></div>
    <div class="row">
    <?php if (mysqli_num_rows($gamme)){?>
        <?php while($gamee = mysqli_fetch_array($gamme)){?>
      <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
          <img src="img/<?php echo $gamee["image"]?>" alt="<?php echo $gamee["title"]?>">
          <div class="caption">
            <h3><?php echo $gamee["title"]?></h3>
            <p><?php echo $gamee["description"]?></p>
            <a href="index.php?game-detail=<?php echo $gamee["id"]?>" class="btn btn-success">Go to Page</a>
          </div>
        </div>
      </div>
      <?php }?>
      <?php }?>
</div>
</div>
<div class="spacing"></div>
    </div>