<?php
$pageId = 3;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Find out your current Flash Player Version</title>
		<meta name="description" content="This page shows your currently installed Flash player version.">
		<meta name="author" content="">
		<?php
			include "php/js-includes.php";
		?>

		<script src="jslibs/swfobject.js"></script>
		<script src="js/player-detection.js"></script>
	</head>
	<body itemscope itemtype="http://schema.org/Article">
		<!-- ::::::::::::::: TOP ::::::::::::::::::::: -->
		<?php
			include "php/topnavi.php";
		?>

		<!-- ::::::::::::::: CONTAINER ::::::::::::::::::::: -->
		<div class="container-fluid">
			<!-- ::: SIDEBAR ::: -->
			<div class="sidebar">
				<script type="text/javascript">
					<!--
					google_ad_client ="ca-pub-8894247493793366";
					/* embedSwf-200x200-sideBarPlayerVersion */
					google_ad_slot = "9616959292";
					google_ad_width = 200;
					google_ad_height = 200;
					//-->
				</script>
				<script type="text/javascript"
				src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
			</div>
			<!-- ::: CONTENT ::: -->
			<div class="content">
				<div class="row">
					<div class="span12">
						<h2 itemprop="name">Check your Flash Player Version</h2>
						<p itemprop="description">
							This page shows your currently installed Flash player version. It's uses the player detection written in JavaScript of <em>SWFObject</em>. Note: Only the first 3 numbers shown, because in most browsers the 4th number is not detectable.
						</p>
						<div class="alert-message block-message info" style="font-size:1.2em; margin-top: 20px;margin-bottom: 30px;">
							Your current Flash Player Version is: <strong id="resultTxt"></strong>
							<p class="help-block"></p>
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
							<tbody id="playerVersionTable"></tbody>
						</table>
						<small>Source: <a href="http://www.adobe.com/software/flash/about/">www.adobe.com</a></small>
					</div>
				</div>
			</div>	<!-- /CONTENT -->
		</div>
		<!-- /container -->
		<?php
			include "php/footer.php";
		?>
	</body>
</html>
