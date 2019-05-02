<?if (isset($_GET["loginn"])){
    
}else{?>
<a class="login-tri" href="index.php?loginn">
	<p> Login </p>
</a>

<div class="floata well well-lg">
    	<div class="close"><span class="clicker-log" aria-hidden="true">&times;</span></div>
        <h3><span class="glyphicon glyphicon-user"></span> Login</h3>
        <form class="form-group" method="post" action="index.php?loginn">
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
<?php }?>