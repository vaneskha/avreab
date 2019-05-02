<?php 
$post = mysqli_query($con,"SELECT blog_vaneskha_post.* , blog_vaneskha_category.category_name 
                           FROM blog_vaneskha_post , blog_vaneskha_category
                           WHERE blog_vaneskha_post.category_id = blog_vaneskha_category.id ORDER BY id DESC");
$cat = mysqli_query($con,"SELECT * FROM blog_vaneskha_category ORDER BY id ASC");

$post_id = $_GET["post-update"];
$edit = mysqli_query($con,"SELECT * FROM blog_vaneskha_post WHERE id = '$post_id'");
$row = mysqli_fetch_array($edit);


if(isset($_POST["update"])){
    $title          = $_POST["title"];
    $description    = $_POST["description"];
    $content        = $_POST["content"];
    $category       = $_POST["category_id"];
    $date           = date("d-m-Y H:i:s");
    $id        = $_POST["id"];
    mysqli_query($con,"UPDATE blog_vaneskha_post SET category_id = '$category', title = '$title' , description = '$description', 
                       content = '$content', date = '$date' 
                       WHERE id = '$id' ");
    header("location:index.php?post");
}

if(isset($_POST["can"])){
    header("location:index.php?administrator");    
}
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Post</h1>
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
                                <label>Category</label>
                                <select class="form-control" name="category_id">
                                    <option value=""> - choose - </option>
                                    <?php if (mysqli_num_rows($cat)){?>
                                        <?php while ($cat_row = mysqli_fetch_array($cat)){?>
                                    <option <?php echo $row["category_id"]==$cat_row["id"] ? "selected='selected'" : "" ?>
                                    value="<?php echo $cat_row["id"]?>"><?php echo $cat_row["category_name"]?> </option>
                                        <?php }?>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" name="title" value="<?php echo $row["title"]?>" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description"><?php echo $row["description"]?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="5" name="content"><?php echo $row["content"]?></textarea>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $row["id"]?>"/>
                            <button type="submit" name="update" class="btn btn-success">Update</button>
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
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Content</th>
                                <th>Jumlah Komentar</th>
                            </tr>
                        </thead>
                        <tbody><?php if(mysqli_num_rows($post)){?>
                                    <?php while($post_row = mysqli_fetch_array($post)){
                                        $id_p = $post_row["id"];
                                        $old_slt = mysqli_query($con,"SELECT * FROM blog_vaneskha_post_comment WHERE post_id = '$id_p' AND status = 1");
                                        $old_cmt = mysqli_num_rows($old_slt);        
                                    ?>
                            <tr> 
                                <td><?php echo $post_row["category_name"]?></td>
                                <td><?php echo $post_row["title"]?></td>
                                <td><?php echo $post_row["description"]?></td>
                                <td><?php echo $post_row["content"]?></td>
                                <td><?php echo $old_cmt?></td>
                            </tr>    <?php }?>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>