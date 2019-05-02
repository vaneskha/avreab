<?php 
$id = $_GET["gam-post-up"];
$edit = mysqli_query($con,"SELECT * FROM blog_vaneskha_game WHERE id = '$id'");
$row_edit = mysqli_fetch_array($edit);

$post = mysqli_query($con,"SELECT blog_vaneskha_game.* , blog_vaneskha_game_cat.category_name 
                           FROM blog_vaneskha_game , blog_vaneskha_game_cat
                           WHERE blog_vaneskha_game.category_id = blog_vaneskha_game_cat.id ORDER BY id DESC");
$cat = mysqli_query($con,"SELECT * FROM blog_vaneskha_game_cat ORDER BY id ASC");

if(isset($_POST["update"])){
    $title = $_POST["title"];
    $id = $_POST["post_id"];
    $description = $_POST["description"];
    $content = $_POST["content"];
    $category_id = $_POST["category_id"];
    
    $file_name = $_FILES["file"]["name"];
    $tmp_name = $_FILES["file"]["tmp_name"];
    $img_name = $_FILES["img"]["name"];
    $tmp_eme  = $_FILES["img"]["tmp_name"];
    if($file_name =="" || empty($file_name)  && $img_name =="" || empty($img_name )){
        mysqli_query($con,"UPDATE blog_vaneskha_game SET title = '$title' , category_id = '$category_id' ,
                           description = '$description' , content = '$content'  WHERE id = '$id' ");
    }else if($file_name =="" || empty($file_name)){
        mysqli_query($con,"UPDATE blog_vaneskha_game SET title = '$title' , category_id = '$category_id' ,
                           description = '$description' , content = '$content' , image = '$img_name' WHERE id = '$id' ");
    }else if($img_name =="" || empty($img_name)){
        move_uploaded_file($tmp_eme,"../img/".$img_name);
        mysqli_query($con,"UPDATE blog_vaneskha_game SET title = '$title' , category_id = '$category_id' ,
                           description = '$description' , content = '$content' , game = '$file_name' WHERE id = '$id' ");
    }else {
        mysqli_query($con,"UPDATE blog_vaneskha_game SET title = '$title' , category_id = '$category_id' ,
                           description = '$description' , content = '$content' , image = '$img_name' , game = '$file_name'  WHERE id = '$id' ");
    }
    header("location:index.php?gam-post");
     
}

?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Game &raquo; Post</h1>
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
                                <select class="form-control" name="category_id" required >
                                    <option value=""> - choose - </option>
                                    <?php if (mysqli_num_rows($cat)){?>
                                        <?php while ($cat_row = mysqli_fetch_array($cat)){?>
                                    <option <?php echo $row_edit["category_id"]== $cat_row["id"] ? "selected='selected'" : "" ?>
                                    value="<?php echo $cat_row["id"]?>"><?php echo $cat_row["category_name"]?> </option>
                                        <?php }?>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" name="title" value="<?php echo $row_edit["title"]?>" required />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description" ><?php echo $row_edit["description"]?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="5" name="content" required><?php echo $row_edit["content"]?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <p><img src="../img/<?php echo $row_edit["image"]?>" width="88"/></p>
                                <input type="file" name="img" width="88" />
                            </div>
                            <div class="form-group">
                                <label>File</label>
                                <iframe src="../game/<?php echo $row_edit["game"]?>" width="120"></iframe>
                                <input type="file" name="file" width="88" />
                            </div>
                            <button type="submit" name="update" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <input type="hidden" name="post_id" value="<?php echo $row_edit["id"]?>" />
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
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Thumbnail</th>
                                <th>Game</th>
                                <th>Content</th>
                                <th>Description</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody><?php if(mysqli_num_rows($post)){?>
                                    <?php while($post_row = mysqli_fetch_array($post)){?>
                            <tr> 
                                <td><?php echo $post_row["category_name"]?></td>
                                <td><?php echo $post_row["title"]?></td>
                                <td><img src="../img/<?php echo $post_row["image"]?>" width="88" /></td>
                                <td><iframe class="embed-responsive-item" width="88" src="../game/<?php echo $post_row["game"]?>"></iframe></td>
                                <td><?php echo $post_row["content"]?></td>
                                <td><?php echo $post_row["description"]?></td>
                                <td class="center"><a href="index.php?gam-post-up=<?php echo $post_row["id"]?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                <td class="center"><a href="index.php?gam-post-del=<?php echo $post_row["id"] ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
                            </tr>    <?php }?>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>