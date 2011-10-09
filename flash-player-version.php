<?php
	$pageId = 3;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Find out your current Flash Player Version</title>
		<meta name="description" content="">
		<meta name="author" content="">

		<?php include "php/js-includes.php"; ?> 
		
		<script src="jslibs/swfobject.js"></script>  
		<script src="js/player-detection.js"></script>
		
	</head>
	<body>
				
		<!-- ::::::::::::::: TOP ::::::::::::::::::::: -->
		<?php include "php/topnavi.php"; ?>	
		
		
		<!-- ::::::::::::::: CONTAINER ::::::::::::::::::::: -->
		<div class="container-fluid">
			
			
			<!-- ::: SIDEBAR ::: -->
			<div class="sidebar">
				<script type="text/javascript"><!--
					google_ad_client = "ca-pub-8894247493793366";
					/* embedSwf-200x200-sideBarPlayerVersion */
					google_ad_slot = "9616959292";
					google_ad_width = 200;
					google_ad_height = 200;
					//-->
					</script>
					<script type="text/javascript"
					src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
			</div>
			
			<!-- ::: CONTENT ::: -->
			<div class="content">
				
		         
			<h2>Check your Flash Player Version</h2>
		

			<div class="alert-message block-message info" style="font-size:1.2em; margin-top: 20px;margin-bottom: 30px;">
		          Your current Flash Player Version is: <strong id="resultTxt"></strong> 
			</div>
             
            <h2>Latest Flash Player Versions</h2> 
             
	     <table class="zebra-striped">
	        <thead>
	          <tr>
	            <th>Platform</th>
	            <th>Browser</th>
	            <th>Version</th>
	          </tr>
	        </thead>
	        <tbody id="playerVersionTable">
	        </tbody>
	      </table>
			<small>Source: <a href="http://www.adobe.com/software/flash/about/">www.adobe.com</a></small>
			
				
			</div>
			<!-- /CONTENT -->
		</div>
		<!-- /container -->
		
		<?php include "php/footer.php"; ?>			
		
	</body>
</html>
