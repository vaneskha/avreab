<?php

$cat = mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery_cat ORDER BY id DESC");
$post = mysqli_query($con,"SELECT blog_vaneskha_gallery.* , blog_vaneskha_gallery_cat.category_name 
                           FROM blog_vaneskha_gallery , blog_vaneskha_gallery_cat
                           WHERE blog_vaneskha_gallery.category_id = blog_vaneskha_gallery_cat.id 
                           ORDER BY id DESC");

if(isset($_POST["submit"])){
    $title  = $_POST["title"];
    $cate   = $_POST["category"];
    $desc   = $_POST["description"];
    $date   = date("Y-m-d H:i:s");
    
    $file_name = $_FILES["file"]["name"];
    $tmp_name = $_FILES["file"]["tmp_name"];
    move_uploaded_file($tmp_name,"../img/".$file_name);
    
    mysqli_query($con,"INSERT INTO blog_vaneskha_gallery VALUES('','$cate','$title','$desc','$file_name','$date','0')");
    header("location:index.php?gal-post");
    
}


?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gallery &raquo; Post</h1>
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
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category" required >
                                    <option value=""> - choose - </option>
                                    <?php if(mysqli_num_rows($cat)){?>
                                        <?php while($cat_row = mysqli_fetch_array($cat)){?>
                                    <option value="<?php echo $cat_row["id"]?>"> <?php echo $cat_row["category_name"]?> </option>
                                    <?php } }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" name="title" required />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="file" required />
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
                    <table class="table table-striped  table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                                <?php if(mysqli_num_rows($post)){?>
                                    <?php while($post_row = mysqli_fetch_array($post)){?>
                                    <tr>
                                <td><?php echo $post_row["category_name"]?></td>
                                <td><?php echo $post_row["title"]?></td>
                                <td><?php echo $post_row["description"]?></td>
                                <td><img src="../img/<?php echo $post_row["image"]?>" width="88" class="img-responsive" /></td>
                                <td class="center"><a href="index.php?gal-post-up=<?php echo $post_row["id"]?>" class="btn btn-primary " type="button">Update</a></td>
                                <td class="center"><a href="index.php?gal-post-del=<?php echo $post_row["id"]?>&&cat-id=<?php echo $post_row["id"]?>" class="btn btn-primary " type="button">Delete</a></td>
                                    <?php }?>
                                <?php }?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>