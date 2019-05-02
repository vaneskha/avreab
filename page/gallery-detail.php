<?php
$detail_id = $_GET["gallery-detail"];
$query = mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery 
                            WHERE id = '$detail_id'");
                            
if(mysqli_num_rows($query)==0) header("location:index.php?gallery ");
$query_row = mysqli_fetch_array($query);


/** comment **/

$comment = mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery_comment 
                              WHERE post_id = '$detail_id' AND status = '1' 
                              ORDER BY id DESC");
$jumlah = mysqli_num_rows($comment);


/** input comment **/
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $reply = $_POST["reply"];
    $date = date("Y-m-d H:i:s");
    $post_id = $_POST["post_id"];
    mysqli_query($con,"INSERT INTO blog_vaneskha_gallery_comment VALUES('','$post_id','$name','$reply','0','$date')");
    header("loaction:index.php?gallery-detail=$post_id&success-comment#success");
}



/** ------------------------  **/


$galee = mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery WHERE id !='$detail_id' ORDER BY id ASC LIMIT 3 OFFSET 1");
$gal_cat = mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery_cat");

?>

<div class="container-fluid">
	<div class="row">
    	<div class="col-sm-12 blue">
        	<h2>Gallery</h2>
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
        <div class="col-sm-8 ins">
        	<h2><?php echo $query_row["title"]?></h2>
            <div class="mini-space"></div>
            <img class="img-responsive" src="<?php echo $query_row["image"]?>"/>      
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
            	<h2>Art Info</h2><hr>
                <p><?php echo $query_row["description"]?></p>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>

<div class="spacing">
</div>


<div class="container">
	<div class="row">
        <div class="col-sm-6">
        	<div class="panel panel-info">
            	<div class="panel-heading">
                	<h3><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comments</h3>
                </div>
                <div class="panel-body">
                	<q><b>  <?php echo $jumlah?> Comment(s)  </b></q>
                    <?php if(mysqli_num_rows($comment)){?>
                        <?php while($comment_row = mysqli_fetch_array($comment)){?>
                	<p><b><?php echo $comment_row["name"]?> :</b> <?php echo $comment_row["reply"]?></p>
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
                <div class="panel-body" id="success">
                 <?php if(isset($_GET["success-comment"])){?>
                                <p>Thank you! Your comment is in process.</p>
                            <?php }?>
                	<form method="post">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name">
                      </div>
                     <div class="form-group">
                     <label for="exampleInputEmail1">Comment</label>
                     <textarea name="reply" class="form-control" rows="3"></textarea>
                    </div>
                        <input type="hidden" name="post_id" value="<?php echo $detail_id?>"/>
                      <button type="submit" name="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
    </div>
</div>
</div>
<div class="container ot">
	<div class="col-sm-8">
    	<h3>Other Images</h3>
        <div class="row">
        <?php if(mysqli_num_rows($galee)){?>
        <?php while($galerow = mysqli_fetch_array($galee)){?>
        <div class="col-sm-6 col-md-4">
      <div class="thumbnail fix">
         <a href="index.php?gallery-detail=<?php echo $galerow["id"]?>"><img src="img/<?php echo $galerow["image"]?>" width="200px" height="200px"></a>
          <div class="caption">
            <h3><a href="index.php?gallery-detail=<?php echo $galerow["id"]?>"><?php echo $galerow["title"]?></a></h3>
          </div>
        </div>
      </div>
      
        <?php }?>
        <?php }?>
        </div>
    </div>
    <div class="col-sm-4">
                	<h2> Category &raquo;</h2>
                    <div class="mini-space"></div>
                    <div class="game-cate">
                        <?php if(mysqli_num_rows($gal_cat)){?>
                            <?php while($cat_row = mysqli_fetch_array($gal_cat)){?>
    					<a href="index.php?gallery-cat=<?php echo $cat_row["id"]?>"><p>&loz; <?php echo $cat_row["category_name"]?></p></a>
                        <?php }?>
                        <?php }?>
                   </div>
        </div>
</div>
<div class="spacing">
</div>