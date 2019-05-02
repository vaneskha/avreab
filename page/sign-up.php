<?php
if(isset($_POST["sign_up"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    mysqli_query($con,"INSERT INTO blog_vaneskha_user VALUES ('','$name','$username','$password')");
    header("location:index.php?usernew");
}

?>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign Up</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus="autofocus" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Real name" name="name" type="text" autofocus="autofocus" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" />
                                </div>
                                <input type="submit" name="sign_up" value="Login" class="btn btn-lg btn-success btn-block"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>