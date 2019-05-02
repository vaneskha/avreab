<?php
if(isset($_POST["search"])){
    $_SESSION['session_search'] = $_POST["keyword"];
    $keyword = $_SESSION['session_search'];
    $ga   = $_POST["ga"];
}else{
    $keyword = $_SESSION['session_search'];
}
/** paging **/
$per_page = 5;
$cur_page = 1;
if(isset($_GET["search-p"])){
    $cur_page = $_GET["search-p"];
    $cur_page = ($cur_page> 1) ? $cur_page : 1;
    
    }
if($ga == 1){
    $total_data = mysqli_num_rows(mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery 
                                                     WHERE title LIKE '%$keyword%' 
                                                     OR description LIKE '%$keyword%'"));
   
}else if($ga == 2){
    $total_data = mysqli_num_rows(mysqli_query($con,"SELECT * FROM blog_vaneskha_game 
                                                     WHERE title LIKE '%$keyword%' 
                                                     OR description LIKE '%$keyword%'"));
 
}else if($ga == 3){
    $total_data = mysqli_num_rows(mysqli_query($con,"SELECT * FROM blog_vaneskha_post 
                                                     WHERE title LIKE '%$keyword%' 
                                                     OR description LIKE '%$keyword%'"));

}
    

$total_page = ceil($total_data/$per_page);
$offset = ($cur_page - 1) * $per_page;
$process = 1;

if($ga==1){
    $query = mysqli_query($con,"SELECT * FROM blog_vaneskha_gallery 
                                WHERE title LIKE '%$keyword%' 
                                OR description LIKE '%$keyword%' 
                                ORDER BY id DESC 
                                LIMIT $per_page OFFSET $offset");
}else if($ga==2){
    $query = mysqli_query($con,"SELECT * FROM blog_vaneskha_game 
                                WHERE title LIKE '%$keyword%' OR description LIKE '%$keyword%' 
                                ORDER BY id DESC 
                                LIMIT $per_page OFFSET $offset");
}else if($ga==3){
    $query = mysqli_query($con,"SELECT * FROM blog_vaneskha_post 
                                WHERE title LIKE '%$keyword%' 
                                OR description LIKE '%$keyword%' 
                                ORDER BY id DESC
                                LIMIT $per_page OFFSET $offset");
}else {
    $process == 0;
}
$data = $total_data;
/** -------------- **/


?>

<div class="container-fluid">
	<div class="row">
        <div class="col-sm-12">
        	<div class="container-fluid blue">
                <h1>Search<small>  &andand;<a href="index.php">Home</a></small></h1>
            </div>
            <?php if ($process == 0 ){
                echo "Please select one of the options.";
            }else{?>
            <br />
            <h3>Found <?php echo $data?> posts related to <?php echo $keyword?>. </h3>
            <br> 

<div class="container-fluid">
<div class="col-sm-6 well well-lg">
            	<h3><span class="glyphicon glyphicon-search"></span> Search Again</h3>
                <form class="form-group" method="post" action="index.php?search">
                        <input type="text" class="form-control" name="keyword" placeholder="type a keyword"/>
                        <div class="mini-space">
                        </div>
                         <label class="radio-inline">
                            <input type="radio"  name="ga" id="inlineRadio1" value="1"> Gallery
                         </label>
                         <label class="radio-inline">
                            <input type="radio"  name="ga" id="inlineRadio2" value="2"> Game
                         </label>
                         <label class="radio-inline">
                            <input type="radio"  name="ga" id="inlineRadio3" value="3"> Blog
                         </label>
                         <div class="mini-space">
                         </div>
                        <button type="submit" class="btn btn-danger" name="search">Search!</button>               
                    
                </form>
                </div>
                <div class="col-sm-6"></div>
            </div>
            </div>
            <div class="container-fluid">
            <div class="row">
            
            <?php if(mysqli_num_rows($query)){?>
                    <?php while($blog = mysqli_fetch_array($query)){?>
                    <div class="col-sm-4">
                <div class="panel panel-info panel-heading">
               
                    <a href="index.php?blog-detail=<?php echo $blog["id"]?>" class="heading-link"><h3 class="bordered"><?php echo $blog["title"]?></h3></a>
                        
                        <div class="panel-body">
                            <p><?php echo $blog["description"]?></p>
                           
                            
                        </div>
                        </div></div><?php }?>
        <?php }?>
               </div>
               </div>
        
        
        
        <?php if(isset($total_page)){?>
            <?php if($total_page > 1){?>
        <nav>
          <ul class="pager">
          <?php if($cur_page > 1){?>
            <li class="previous"><a href="index.php?search-p=<?php echo $cur_page - 1?>">
                    <span aria-hidden="true">&larr;</span>
                </a>
            </li>
            <?php }else{?>
            <?php }?>
            
             <?php if($cur_page < $total_page){?>
            <li class="next"><a href="index.php?search-p=<?php echo $cur_page + 1?>"> 
                    <span aria-hidden="true">&rarr;</span>
                </a>
            </li>
            <?php }else{?>
            <?php }?>
          </ul>
        </nav>
            <?php }?>
        <?php }?>
        </div>
    </div>
</div> <?php }?>