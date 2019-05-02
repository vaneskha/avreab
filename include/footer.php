<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script>
    $(document).ready(function(e) {
       $(".circle").click(function(e) {
        	$(".navbar-fixed-bottom").fadeToggle("slow");
    	});
        
		$(".gallery").click(function(e) {
			$(".box").fadeToggle("fast");
		});
		 $(".search-circle").click(function(e) {
        	$(".floaty").fadeToggle("fast");
			$(".search-circle").fadeToggle("fast");
    	}); 
		$(".box").mouseenter(function(e) {
            $(".redd").fadeIn("fast");
        });
		$(".box").mouseleave(function(e) {
            $(".redd").fadeOut("fast");
        });
		
		$(".box2").mouseenter(function(e) {
            $(".yel").fadeIn("fast");
        });
		$(".box2").mouseleave(function(e) {
            $(".yel").fadeOut("fast");
        });
		
		$(".box3").mouseenter(function(e) {
            $(".bluee").fadeIn("fast");
        });
		$(".box3").mouseleave(function(e) {
            $(".bluee").fadeOut("fast");
        });
				
		 $(".clicker").click(function(e) {
        	$(".floaty").fadeToggle("fast");
			$(".search-circle").fadeToggle("slow");
    	}); 
    });
	
	$(document).ready(function(){
  $('.bxslider').bxSlider();
});
    </script>
    	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="js/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="lib/jquery.fancybox.css?v=2.1.5" media="screen" />
		<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});


			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
  </body>
</html>