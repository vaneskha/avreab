<?php 
$comt = mysqli_query($con,"SELECT blog_vaneskha_post_comment.* , blog_vaneskha_post.title , blog_vaneskha_post.comment FROM blog_vaneskha_post_comment , blog_vaneskha_post WHERE blog_vaneskha_post_comment.post_id = blog_vaneskha_post.id  AND status = '0'");
$cs = mysqli_query($con,"SELECT blog_vaneskha_gallery_comment.* , blog_vaneskha_gallery.title , blog_vaneskha_gallery.fav
                              FROM blog_vaneskha_gallery_comment , blog_vaneskha_gallery
                              WHERE blog_vaneskha_gallery_comment.post_id = blog_vaneskha_gallery.id
                              AND status = '0'
                              ORDER BY id DESC");
$ga = mysqli_query($con,"SELECT blog_vaneskha_game_comment.* , blog_vaneskha_game.title , blog_vaneskha_game.comment
                              FROM blog_vaneskha_game_comment , blog_vaneskha_game
                              WHERE blog_vaneskha_game_comment.post_id = blog_vaneskha_game.id
                              AND status = '0'
                              ORDER BY id DESC");
                              
$name = $_SESSION['admin_username'];
$sqla = mysqli_query($con,"SELECT * FROM blog_vaneskha_admin WHERE username = '$name'");
$row_admin = mysqli_fetch_array($sqla);
$chek = $row_admin["type"];
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> <?php echo $_SESSION['admin_username'] . "'s"?> dashboard</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
   
            <?php if(isset($_GET["approve-success"])){?>
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    Approve Comment Berhasil.
                </div>
                <?php }else if(isset($_GET["approve-fail"])){?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    Approve Comment Gagal.
                </div>
                <?php }else{?>
                <p> </p>
                <?php }?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Approve Comments : Blog
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Post ID</th>
                                <th>Name</th>
                                <th>Comment</th>
                                <th>Datetime</th>
                                <th>Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($comt)){?>
                            <?php while($commen = mysqli_fetch_array($comt)){?>
                            <tr>
                                <td><?php echo $commen["title"]?></td>
                                <td><?php echo $commen["post_id"]?></td>
                                <td><?php echo $commen["name"]?></td>
                                <td><?php echo $commen["reply"]?></td>
                                <td class="center"><?php echo $commen["date"]?></td>
                                <td class="center"><a href="index.php?comment-approve=<?php echo $commen["id"]?>&post-id=<?php echo $commen["post_id"]?>&commenta=<?php echo $commen["comment"]?>" class="btn btn-primary btn-xs" type="button">Approve</a></td>
                            </tr>
                            <?php }?>
                            <?php }else if(mysqli_num_rows($comt)==0){?>
                                </tbody></table><h2><?php echo "None.";?></h2>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Approve Comments : Gallery
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Post ID</th>
                                <th>Name</th>
                                <th>Comment</th>
                                <th>Datetime</th>
                                <th>Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($cs)){?>
                            <?php while($commen = mysqli_fetch_array($cs)){?>
                            <tr>
                                <td><?php echo $commen["title"]?></td>
                                <td><?php echo $commen["post_id"]?></td>
                                <td><?php echo $commen["name"]?></td>
                                <td><?php echo $commen["reply"]?></td>
                                <td class="center"><?php echo $commen["date"]?></td>
                                <td class="center"><a href="index.php?commen-approve=<?php echo $commen["id"]?>&post-id=<?php echo $commen["post_id"]?>&commenta=<?php echo $commen["fav"]?>" class="btn btn-primary btn-xs" type="button">Approve</a></td>
                            </tr>
                            <?php }?>
                            <?php }else if(mysqli_num_rows($comt)==0){?>
                                </tbody></table><h2><?php echo "None.";?></h2>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php if($chek ==1){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Approve Comments : Game
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Post ID</th>
                                <th>Name</th>
                                <th>Comment</th>
                                <th>Datetime</th>
                                <th>Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($ga)){?>
                            <?php while($commen = mysqli_fetch_array($ga)){?>
                            <tr>
                                <td><?php echo $commen["title"]?></td>
                                <td><?php echo $commen["post_id"]?></td>
                                <td><?php echo $commen["name"]?></td>
                                <td><?php echo $commen["reply"]?></td>
                                <td class="center"><?php echo $commen["date"]?></td>
                                <td class="center"><a href="index.php?commn-approve=<?php echo $commen["id"]?>&post-id=<?php echo $commen["post_id"]?>&commenta=<?php echo $commen["comment"]?>" class="btn btn-primary btn-xs" type="button">Approve</a></td>
                            </tr>
                            <?php }?>
                            <?php }else if(mysqli_num_rows($comt)==0){?>
                                </tbody></table><h2><?php echo "None.";?></h2>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php }else{
            
        }?>
    </div>
    
</div>