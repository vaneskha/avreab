<?php 
$id_admin = $_GET["administrator-update"];
$edit = mysqli_query($con,"SELECT * FROM blog_vaneskha_admin WHERE id = '$id_admin'");
$row_edit = mysqli_fetch_array($edit);
$admin = mysqli_query($con,"SELECT * FROM blog_vaneskha_admin ORDER BY id DESC");

if(isset($_POST["update"])){
    $name   = $_POST["username"];
    $pass   = md5($_POST["password"]);
    $id_adm = $_POST["id"];
    mysqli_query($con,"UPDATE blog_vaneskha_admin SET username = '$name' , password = '$pass' 
                       WHERE id = '$id_adm'");
    header("location:index.php?administrator");
}

if(isset($_POST["can"])){
    header("location:index.php?administrator");    
}
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Administrator</h1>
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
                                <label>Username</label>
                                <input class="form-control" name="username" type="text" value="<?php echo $row_edit["username"]?>" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control"  name="password" type="password" value="<?php echo $row_edit["password"]?>" />
                            </div>
                            <input type="hidden" value="<?php echo $row_edit["id"]?>" name="id" />
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
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php if(mysqli_num_rows($admin)){?>
                                    <?php while($admin_row = mysqli_fetch_array($admin)){?>
                                <td><?php echo $admin_row["username"]?></td>
                                <td><?php echo $admin_row["password"]?></td>
                                
                            </tr>   <?php }?>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>