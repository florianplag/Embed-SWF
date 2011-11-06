<?php
	$pageId = 1;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Embed SWF: Easily embed Flash files in a web page.</title>
		<meta name="description" content="Embed your SWF files! Easily embed Flash content in a web page. Just click through the online configurator to get your HTML code which uses SWFObject, a standards-friendly JavaScript Library.">
		<meta name="author" content="Florian Plag">
		<?php
		include "php/js-includes.php";
		?>

		<script src="jslibs/swfobject.js"></script>
		<script src="js/PluginDetect.js"></script>
	</head>
	<body itemscope itemtype="http://schema.org/Article">
		<!-- ::::::::::::::: TOP ::::::::::::::::::::: -->
		<?php
		include "php/topnavi.php";
		?>

		<!-- ::::::::::::::: CONTAINER ::::::::::::::::::::: -->
		<div class="container">

			<!-- ::: CONTENT ::: -->
			<div class="content">
				<!-- Main hero unit for a primary marketing message or call to action -->
				<div class="hero-unit">
					<h1 itemprop="name">Embed your SWF files! <span class="label notice"> Beta</span> </h1>
					<p itemprop="description">
						Easily embed Flash content in a web page. Just click through the online configurator to get your HTML code which uses SWFObject, a standards-friendly JavaScript Library.  
					</p>
					<p>
						<a class="btn primary large" href="embed-swf.php">Let's start &raquo;</a>
					</p>
				</div>
				
				
     <!-- Example row of columns -->
      <div class="row">
        <div class="span6">
          <h2>Documentation</h2>
          <p>If you want to learn more about this project, just have a look at the documentation.</p>
          <p><a class="btn" href="documentation.php">View details &raquo;</a></p>
        </div>
        <div class="span5">
          <h2>Flash Player Version</h2>
          <p>Check your installed Flash Player version and compare it with the latest releases.</p>
          <p><a class="btn" href="flash-player-version.php">Check it &raquo;</a></p>
        </div>
        <div class="span5">
          <h2>Feedback</h2>
          <p>Just contact me if you have any feedback about this project.</p>
          <p><a class="btn" href="contact.php">Contact &raquo;</a></p>
        </div>
      </div>
				

			</div>
			<!-- /CONTENT -->

		<?php
include "php/footer.php";
		?>
		
		</div>
		<!-- /container -->		
		
	</body>
</html>
