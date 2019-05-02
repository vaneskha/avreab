<?php 
$admin = mysqli_query($con,"SELECT * FROM blog_vaneskha_admin ORDER BY id DESC");

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    mysqli_query($con,"INSERT INTO blog_vaneskha_admin VALUES ('','$username','$password','')");
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
                                <input class="form-control" name="username" type="text" name="username" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control"  name="password" type="password" name="password" />
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
                                <th>Username</th>
                                <th>Password</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php if(mysqli_num_rows($admin)){?>
                                    <?php while($admin_row = mysqli_fetch_array($admin)){?>
                                <td><?php echo $admin_row["username"]?></td>
                                <td><?php echo $admin_row["password"]?></td>
                                <td class="center"><a href="index.php?administrator-update=<?php echo $admin_row["id"]?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                <td class="center"><a href="index.php?administrator-delete=<?php echo $admin_row["id"]?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
                                 
                            </tr>   <?php }?>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>