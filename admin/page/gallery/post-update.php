<?php
$post_id = $_GET["gal-post-up"];
$edit = mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery WHERE id = '$post_id'");
$row_edit = mysqli_fetch_array($edit);
$cat = mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery_cat ORDER BY id DESC");
$post = mysqli_query($con,"SELECT blog_vaneskha_gallery.* , blog_vaneskha_gallery_cat.category_name 
                           FROM blog_vaneskha_gallery , blog_vaneskha_gallery_cat
                           WHERE blog_vaneskha_gallery.category_id = blog_vaneskha_gallery_cat.id 
                           ORDER BY id DESC");

if(isset($_POST["update"])){
    $post_id = $_POST["id_post"];
    $title   = $_POST["title"];
    $category_id = $_POST["category_id"];
    $description = $_POST["description"];
    
    $file_name = $_FILES["file"]["name"];
    $tmp_name = $_FILES["file"]["tmp_name"];
    if($file_name =="" || empty($file_name)){
        mysqli_query($con,"UPDATE blog_vaneskha_gallery SET post_id = '$category_id' , title = '$title' ,
                          description = '$description' WHERE id = '$post_id'  ");
    }else{
        move_uploaded_file($tmp_name,"../img/".$file_name);
        mysqli_query($con,"UPDATE blog_vaneskha_gallery SET post_id = '$category_id' , title = '$title' ,
                          description = '$description' , image='$file_name' WHERE id = '$post_id'  ");
    }
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
                                    <option <?php echo $row_edit["category_id"]==$cat_row["id"] ? "selected='selected'" : "" ?> 
                                    value="<?php echo $cat_row["id"]?>"> <?php echo $cat_row["category_name"]?> </option>
                                    <?php } }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" name="title" value="<?php echo $row_edit["title"]?>" required />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description"><?php echo $row_edit["description"]?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <p><img src="../img/<?php echo $row_edit["image"]?>" width="88" /></p>
                                <input type="file" name="file"  />
                            </div>
                            <button type="submit" name="update" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <input type="hidden" value="<?php echo $row_edit["id"]?>" name="id_post"/>
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
                                <td class="center"><a href="index.php?gal-post-del=<?php echo $post_row["id"]?>" class="btn btn-primary " type="button">Delete</a></td>
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