<!-- <?php /**
if(isset($_SESSION['user_username']))header("location:index.php");

/** -----------  LOGIN  ---------- /**
if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $sql_login = mysqli_query($con,"SELECT * FROM blog_vaneskha_user WHERE username = '$username'
                                    AND password = '$password'");
    if(mysqli_num_rows($sql_login)>0){
        $row_admin = mysqli_fetch_array($sql_login);
        $_SESSION['user_id'] = $row_admin["id"];
        $_SESSION['user_username'] = $row_admin["username"];
        header("location:login.php?usernew");
    }else{
        header("location:login.php");
    }
} **/


?>

<div class="col-md-4">
</div>
<div class="col-md-4">
<div class="space">
</div>
<div class="space">
</div>
<div class="well well-lg">
    	
        <h3><span class="glyphicon glyphicon-user"></span> Login</h3>
        <form class="form-group" method="post">
                        <div class="form-group">
                            <label>Username</label>
                                <input class="form-control" type="text" name="name" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                                <input class="form-control" type="password" name="password" />
                        </div>
                         
                         
                        <p> Don't have an account? <a href="index.php?sign-up">Sign Up!</a></p>
                        <div class="mini-space">
                         </div>
                        <button type="submit" class="btn btn-danger" name="login">Login!</button>               
                    
                </form>
                </div>
</div>
<div class="col-md-4">
</div>
<?php
?> -->