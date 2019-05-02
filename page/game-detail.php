<?php
$game_detail = $_GET["game-detail"];
$gam_det = mysqli_query($con,"SELECT * FROM blog_vaneskha_game WHERE id = '$game_detail'");
$det_row = mysqli_fetch_array($gam_det);

$comment = mysqli_query($con,"SELECT * FROM blog_vaneskha_game_comment
                              WHERE id = '$game_detail'");
$jumlah = mysqli_num_rows($comment);

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $reply = $_POST["reply"];
    $post_id = $_POST["post_id"];
    $date = date("Y-m-d H:i:s");
    mysqli_query($con,"INSERT INTO blog_vaneskha_game_comment VALUES ('','$post_id','$name','$reply','0','$date')");
    header("location:index.php?game-detail=$post_id&success-comment#success");
}

$gaa = mysqli_query($con,"SELECT * FROM blog_vaneskha_game WHERE id != '$game_detail' ORDER BY id DESC");
?>

<div class="container-fluid">
	<div class="row">
    	<div class="col-sm-12 blue">
        	<h2>Games</h2>
        </div>
    </div>
</div>
            <div class="space">
            </div>
<div class="container-fluid">
	<div class="container">
    	<div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
        	<h2><?php echo $det_row["title"]?></h2>
            <hr>
            <div class="mini-space"></div>
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="game/<?php echo $det_row["game"]?>"></iframe>
            </div>       
          </div>
          <div class="col-sm-2">
          </div>
    </div>
</div>
</div>
<div class="container">
	<div class="row">
    	<div class="col-sm-4"></div>
    	<div class="col-sm-4">
        	<div class="cont">
            	<h2>Game Info</h2><hr>
                <p><?php echo $det_row["content"]?></p>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
<hr>
<div class="space">
</div>


<div class="container">
	<div class="row">
        <div class="col-sm-6">
        	<div class="panel panel-info">
            	<div class="panel-heading" id="success">
                	<h3><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comments</h3>
                </div>
                <div class="panel-body" >
                <?php if(isset($_GET["success-comment"])){?>
                                <p>Thank you! Your comment is in process.</p>
                            <?php }?>
                	<q><b>  <?php echo $jumlah?> Comment(s)  </b></q>
                    <?php if(mysqli_num_rows($comment)){?>
                        <?php while($cmt_row = mysqli_fetch_array($comment)){?>
                	<p><b><?php echo $cmt_row["name"]?>:</b><?php echo $cmt_row["reply"]?></p>
                        <?php }?>
                    <?php }else if($jumlah ==0){?>
                        <br /><br />
                        <p>There are no comments yet... Be the first to comment!</p>
                        <?php }?>
            </div>
        </div>
        </div>
        <div class="col-sm-6">
        	<div class="panel panel-info">
            	<div class="panel-heading">
                	<h3><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Add a Comment</h3>
                </div>
                <div class="panel-body">
                	<form method="post">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name">
                      </div>
                     <div class="form-group">
                     <label for="comment">Comment</label>
                     <textarea  name="reply" class="form-control" rows="3"></textarea>
                    </div>
                        <input type="hidden" name="post_id" value="<?php echo $game_detail?>"/>
                      <button type="submit" name="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
    </div>
</div>
</div>

<div class="spacing">
</div>

<div class="container">
	<div class="col-sm-9">
    	<h3>Other Games</h3>
        <?php if(mysqli_num_rows($gaa)){?>
            <?php while($gaa_row = mysqli_fetch_array($gaa)){?>
        <a href="index.php?game-detail=<?php echo $gaa_row["id"]?>"><img src="img/<?php echo $gaa_row["image"]?>"/></a>
            <?php }?>
        <?php }?>
    </div>
    <div class="col-sm-3">
                	<h2> Category &raquo;</h2>
                    <div class="mini-space"></div>
                    <div class="game-cate">
    					<a href=""><p>&loz; Fanbased</p> </a>
                        <a href=""><p>&loz; Edugame</p> </a>
                        <a href=""><p>&loz; Misc</p> </a>
                   </div>
        </div>
</div>
<div class="spacing">
</div>