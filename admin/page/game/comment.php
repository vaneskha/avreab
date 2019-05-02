<?php
$post = mysqli_query($con,"SELECT * FROM blog_vaneskha_game ORDER BY id DESC");
$comment = mysqli_query($con,"SELECT blog_vaneskha_game_comment.* , blog_vaneskha_game.title
                              FROM blog_vaneskha_game_comment , blog_vaneskha_game
                              WHERE blog_vaneskha_game_comment.post_id = blog_vaneskha_game.id
                              ORDER BY id DESC");
                              

                             
if(isset($_POST["submit"])){
    $name   = $_POST["name"];
    $reply  = $_POST["reply"];
    $status = $_POST["status"];
    $post   = $_POST["post"];
    $date   = date("Y-m-d H:i:s");
    
    if($_POST["status"]== 1){
        $post_slt = mysqli_query($con,"SELECT * FROM blog_vaneskha_game_comment WHERE post_id = '$post' AND status = 1 ");
        $cur_cmt = mysqli_num_rows($post_slt);
        
        $cur_stat = $cur_cmt+1;
        mysqli_query($con,"UPDATE blog_vaneskha_game SET comment = '$cur_stat' WHERE id = '$post'");
        mysqli_query($con,"INSERT INTO blog_vaneskha_game_comment VALUES ('','$post','$name','$reply','$status','$date')");
        header("location:index.php?gam-comment");
    }else{
    mysqli_query($con,"INSERT INTO blog_vaneskha_game_comment VALUES ('','$post','$name','$reply','$status','$date')");
    header("location:index.php?gam-comment");
    }
}



?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Game &raquo; Comment</h1>
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
                                <select class="form-control" name="post" required >
                                    <option value=""> - choose - </option>
                                    <?php if (mysqli_num_rows($post)){?>
                                        <?php while($post_row = mysqli_fetch_array($post)){?>
                                    <option value="<?php echo $post_row["id"]?>"> <?php echo $post_row["title"]?></option>
                                        <?php }?>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>User</label>
                                <input class="form-control" type="text" name="name" required />
                            </div>
                            <div class="form-group">
                                <label>Reply</label>
                                <textarea class="form-control" rows="3" name="reply" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="0" name="status" checked /> Not Active
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="1" name="status"/> Active
                                    </label>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Save</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
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
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($comment)){?>
                                <?php while($co_row = mysqli_fetch_array($comment)){?>
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
                                <!--<td class="center"><a href="index.php?gam-=<?php echo $co_row["id"]?> " class="btn btn-primary btn-xs" type="button">Update</a></td>-->
                                <td class="center"><a href="index.php?gam-cmt-del=<?php echo $co_row["id"]?> " class="btn btn-primary btn-xs" type="button">Delete</a></td>
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