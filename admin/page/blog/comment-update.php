<?php
$update_id = $_GET["comment-update"];
$edit = mysqli_query($con,"SELECT * FROM blog_vaneskha_post_comment WHERE id = '$update_id'");
$row = mysqli_fetch_array($edit);

$post = mysqli_query($con,"SELECT * FROM blog_vaneskha_post ORDER BY id DESC");
$comment = mysqli_query($con,"SELECT blog_vaneskha_post_comment.* , blog_vaneskha_post.title
                              FROM blog_vaneskha_post_comment , blog_vaneskha_post
                              WHERE blog_vaneskha_post_comment.post_id = blog_vaneskha_post.id
                              ORDER BY id DESC");
                              
$old_stat = $row["status"];                              
$old_post = $row["post_id"];
                             

if(isset($_POST["update"])){
    $name   = $_POST["name"];
    $reply  = $_POST["reply"];
    $status = $_POST["status"];
    $date   = date("Y-m-d H:i:s");
    $post_id= $_POST["posting"];
    $id     = $_POST["id"];
    $post_slt = mysqli_query($con,"SELECT * FROM blog_vaneskha_post_comment WHERE post_id = '$post_id' AND status = 1 ");
    $cur_cmt = mysqli_num_rows($post_slt);
    
    $old_slt = mysqli_query($con,"SELECT * FROM blog_vaneskha_post_comment WHERE post_id = '$old_post' AND status = 1");
    $old_cmt = mysqli_num_rows($old_slt);
       
    
   if(($status == 1) && ($post_id == $old_post)){
    
        if($old_stat==0){
            $cur_stat = $cur_cmt+1;
            echo $cur_stat;
            mysqli_query($con,"UPDATE blog_vaneskha_post SET comment = '$cur_stat' WHERE id = '$post_id'");
            mysqli_query($con,"UPDATE blog_vaneskha_post_comment SET name = '$name', post_id = '$post_id' , reply = '$reply' , status ='$status', date ='$date' WHERE id = '$id'");
        }else { 
            mysqli_query($con,"UPDATE blog_vaneskha_post_comment SET name = '$name', post_id = '$post_id' , reply = '$reply' , status ='$status', date ='$date' WHERE id = '$id'") or die (mysqli_error());
        } 
    
    
    } else if($_POST["status"]==1 && $post_id !=$old_post){
        if($old_stat==0){
            $old_stat = $old_cmt-1;
            $cur_stat = $cur_cmt+1;
            echo $old_stat;
            echo $cur_stat;
            mysqli_query($con,"UPDATE blog_vaneskha_post SET comment = '$old_stat' WHERE id = '$old_post'");
            mysqli_query($con,"UPDATE blog_vaneskha_post SET comment = '$cur_stat' WHERE id = '$post_id'");
            
            mysqli_query($con,"UPDATE blog_vaneskha_post_comment SET name = '$name', post_id = '$post_id' , reply = '$reply' , status ='$status', date ='$date' WHERE id = '$id'");
        }else if($old_stat==1){
            mysqli_query($con,"UPDATE blog_vaneskha_post_comment SET name = '$name', post_id = '$post_id' , reply = '$reply' , status ='$status', date ='$date' WHERE id = '$id'");
        }
    
    
    }else if($_POST["status"]==0 && $post_id ==$old_post){
        if($old_stat==1){
            $cur_stat = $cur_cmt-1;
            mysqli_query($con,"UPDATE blog_vaneskha_post SET comment = '$cur_stat' WHERE id = '$post_id'");
            mysqli_query($con,"UPDATE blog_vaneskha_post_comment SET name = '$name', post_id = '$post_id' , reply = '$reply' , status ='$status', date ='$date' WHERE id = '$id'");
        }else if($old_stat==0){
            mysqli_query($con,"UPDATE blog_vaneskha_post_comment SET name = '$name', post_id = '$post_id' , reply = '$reply' , status ='$status', date ='$date' WHERE id = '$id'");
        }
    
    
    
    }else if($_POST["status"]==0 && $post_id !=$old_post){
        if($old_stat==1){
            $old_stat = $old_cmt-1;
            $cur_stat = $cur_cmt+1;
            mysqli_query($con,"UPDATE blog_vaneskha_post SET comment = '$cur_stat' WHERE id = '$post_id'");
            mysqli_query($con,"UPDATE blog_vaneskha_post SET comment = '$old_stat' WHERE id = '$old_post'");
            
            mysqli_query($con,"UPDATE blog_vaneskha_post_comment SET name = '$name', post_id = '$post_id' , reply = '$reply' , status ='$status', date ='$date' WHERE id = '$id'");
        }else if($old_stat==0){
            mysqli_query($con,"UPDATE blog_vaneskha_post_comment SET name = '$name', post_id = '$post_id' , reply = '$reply' , status ='$status', date ='$date' WHERE id = '$id'");
        }
    }
  //  header("location:index.php?comment");
}

if(isset($_POST["can"])){
    header("location:index.php?comment");    
}
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Comment</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Data
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" action="" method="post">
                            <div class="form-group">
                                <label>Post</label>
                                <select class="form-control" name="posting">
                                    <option value=""> - choose - </option>
                                    <?php if (mysqli_num_rows($post)){?>
                                        <?php while($post_row = mysqli_fetch_array($post)){?>
                                    <option <?php echo $row["post_id"]==$post_row["id"] ? "selected='selected'" : "" ?>
                                    value="<?php echo $post_row["id"]?>"> <?php echo $post_row["title"]?></option>
                                        <?php }?>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>User</label>
                                <input class="form-control" type="text" name="name" value="<?php echo $row["name"]?>" />
                            </div>
                            <div class="form-group">
                                <label>Reply</label>
                                <textarea class="form-control" rows="3" name="reply"><?php echo $row["reply"]?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="0" name="status" <?php echo $row["status"]==0 ? "checked" : ""?> /> Not Active
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="1" name="status" <?php echo $row["status"]==1 ? "checked" : ""?> /> Active
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $row["id"]?>"/>
                            <button type="submit" name="update" class="btn btn-success">Save</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <button type="submit"  name="can" class="btn btn-danger">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                List Data
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Post</th>
                                <th>User</th>
                                <th>Reply</th>
                                <th>Status</th>
                                <th>Datetime</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($comment)){?>
                                <?php while($co_row = mysqli_fetch_array($comment)){
                                   
                                ?>
                            <tr>
                                <td><?php echo $co_row["title"]?></td>
                                <td><?php echo $co_row["name"]?></td>
                                <td><?php echo $co_row["reply"]?></td>
                                <?php if($co_row["status"] == 1 ){?>
                                <td>Active</td>
                                <?php }else{?>
                                <td>Not Active</td>
                                <?php }?>
                                <td><?php echo $co_row["date"]?></td>
                                
                                </tr>
                                <?php }?>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>