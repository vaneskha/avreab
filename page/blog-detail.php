<?php
$detail_id = $_GET["blog-detail"];
$query = mysqli_query($con,"SELECT * FROM blog_vaneskha_post 
                            WHERE id = '$detail_id'");
if(mysqli_num_rows($query)==0) header("location:index.php?blog");
$query_row = mysqli_fetch_array($query);

/** comment **/
$comment = mysqli_query($con,"SELECT * FROM blog_vaneskha_post_comment 
                              WHERE post_id = '$detail_id' AND status = '1' 
                              ORDER BY date DESC");
$jumlah = mysqli_num_rows($comment);

/** input comment **/
if(isset($_POST["submit"])){
    $comment = $_POST["comment"];
    $name = $_POST["name"];
    $post_id = $_POST["post_id"];
    $date = date("Y-m-d H:i:s");
    /** mysqli_query($con,"UPDATE blog_vaneskha_post SET comment =+1 WHERE id = '$post_id'"); **/
    mysqli_query($con,"INSERT INTO blog_vaneskha_post_comment VALUES('','$post_id','$name','$comment','0','$date')");
    header("location:index.php?blog-detail=$post_id&success-comment#success");
}

?>

<div class="container">
	<div class="row">
        <div class="col-sm-9">
        	<div class="container-fluid blue">
                <h1>Blog <small> &raquo; <a href="index.php?blog">Back</a></small></h1>
            </div>
            <div class="space"></div>
            <div class="container">
            	<div class="row">
                    <div class="col-sm-1 mini-blue">
                        <p><?php echo tgl_indo($query_row["date"])?></p>
                    </div>
                    <div class="col-sm-11 title">
                        <p><?php echo $query_row["title"]?></p>
                    </div>
            	</div>
            </div>
            <hr>
                	<p><?php echo $query_row["content"]?> </p>
                    <hr>
                    <div class="mini-space"></div>
                    	<div class="col-sm-12">
                            <div class="comment-blog">
                                <h3>Comments &ndash; <?php echo $jumlah?></h3>
                                <hr>
                                <br />
                            </div> 
                            <?php if(mysqli_num_rows($comment)){?>
                                <?php while($comment_row = mysqli_fetch_array($comment)){?>
                        <p class="comment"><b><?php echo $comment_row["name"]?>: </b><?php echo $comment_row["reply"]?></p>
                        <br>
                            <?php }?>
                            <?php }else if($jumlah ==0){?>
                                <p class="comment"> No comments yet..  Be first to comment!</p>
                            
                        <?php }?>
                        <div class="comment-close"> <br /><br></div>
                       		<div class="space" ></div><div class="space"></div>
                            
                            <div class="comment-blog" id="success">
                                <h3>Add A Comment</h3>
                            </div>
                            <br>
                            <?php if(isset($_GET["success-comment"])){?>
                                <p>Thank you! Your comment is in process.</p>
                            <?php }?>
                            <form class="blog-comment" method="post">
                              <div class="form-group" >
                                <p class="form-control-static">Name</p>
                                <input type="text" class="form-control" name="name" placeholder="Name">
                              </div>
                             <div class="form-group">
                             <p class="form-control-static">Comment</p>
                             <textarea class="form-control" rows="3" name="comment" placeholder="comment here.."></textarea>
                            </div>
                              <button type="submit" name="submit" class="btn btn-info">Submit</button>
                              <input type="hidden" name="post_id" value="<?php echo $detail_id?>"/>
                            </form>
                            <div class="spacing"></div>
                        </div>
                    </div>
            <?php include "include/category.php";?>
    </div>
</div>