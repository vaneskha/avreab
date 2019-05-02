<?php if(isset($_GET["loginn"])){
    
}else{?>
<div class="search-circle">
	<p><span class="glyphicon glyphicon-search"></span><span> </span> ||</p>
</div>

<div class="floaty well well-lg">
	<div class="close"><span class="clicker" aria-hidden="true">&times;</span></div>
            	<h3><span class="glyphicon glyphicon-search"></span> Search</h3>
                <form class="form-group" method="post" action="index.php?search">
                        <input type="text" class="form-control" name="keyword" placeholder="type a keyword"/>
                        <div class="mini-space">
                        </div>
                         <label class="radio-inline">
                            <input type="radio"  name="ga" id="inlineRadio1" value="1" required> Gallery
                         </label>
                         <label class="radio-inline">
                            <input type="radio"  name="ga" id="inlineRadio2" value="2" required> Game
                         </label>
                         <label class="radio-inline">
                            <input type="radio"  name="ga" id="inlineRadio3" value="3" required> Blog
                         </label>
                         <div class="mini-space">
                         </div>
                        <button type="submit" class="btn btn-danger" name="search">Search!</button>               
                    
                </form>
            </div>
            
            <?php }?>