 <body>
 <?php if(isset($_GET["game"])){?>
  <div class="circle circ-green">
  <?php }else if (isset($_GET["gallery"])){?>
  <div class="circle circ-yellow">
  <?php }else {?>
    <div class="circle">
  <?php }?>

	<p class="glyphicon glyphicon-chevron-up" aria-hidden="true"></p>
</div>
    <nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Navigation</span>
      </button>
       <a class="navbar-brand" href="#" style="background-image:url(img/icon.gif);background-repeat:no-repeat;width:60px; margin:0 1px;">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="index.php?aboutt">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?game">Games</a></li>
        <li><a href="index.php?gallery">Gallery</a></li>
        <li><a href="index.php?blog">Blog</a></li>
      </ul>
    </div><!-- /.navbar-collapse --> 
  </div><!-- /.container-fluid -->
</nav>

