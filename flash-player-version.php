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
							This page shows your currently installed Flash player version. It's uses the player detection written in JavaScript of <em>SWFObject</em>. Note: Only the first 3 numbers shown, because in most browsers the 4th number of the installed Flash Player version is not detectable.
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
						<p>
						<small>Source: <a href="http://www.adobe.com/software/flash/about/">www.adobe.com</a></small>
						</p>						
						<h2>Old Flash Player Versions</h2>
						<p>The following lists show the major releases of the Flash Player with some of their main features.</p>
						<ul>  
							<li><strong>Flash Player 11.2</strong> (11.2.202.228 / March 2012)<ul><li>Security Patches</li><li>Auto-Updater for Windows</li><li>Gaming: Mouse lock, relative coordinates, right and middle -click support</li><li>new multithreaded video decoding architecture</li></ul></li>
							<li><strong>Flash Player 11.1</strong> (11.1.102.55 / November 2011)<ul><li>Security Updates/Patches</li><li>Last official version for mobile browsers</li></ul></li>
							<li><strong>Flash Player 11</strong> (11.0.1.152 / October 2011)<ul><li>Stage 3D (via Direct X / Open GL)</li><li>H.264 Encoding for the Camera</li><li>64 Bit Support</li><li>Protected HTTP Dynamic Streaming (HDS)</li><li>JPEG XR Decoding</li></ul></li>
							<li><strong>Flash Player 10.3</strong> (10.3.181.14 / May 2011)<ul><li>Media Measurement</li><li>Acoustic Echo Cancellation (desktop only)</li><li>Local Storage in privacy mode</li><li>Native Control Panel</li></ul></li>
							<li><strong>Flash Player 10.2</strong> (10.2.152.26 / February 2011)<ul><li>Stage Video</li><li>Custom native mouse cursors</li><li>Multiple monitor full-screen support</li></ul></li>
							<li><strong>Flash Player 10.1</strong> (10.1.53.64 / June 2010)<ul><li>Hardware-based H.264 video decoding</li><li>HTTP Dynamic Streaming</li><li>Peer-assisted networking and Multicast</li><li>Multi-touch APIs</li><li>Support for browser privacy modes</li></ul></li>
							<li><strong>Flash Player 10</strong> (10.0.12.36 / October 2008)<ul><li>3D object transformations</li><li>pixel bender</li><li>speex Audio Codec</li><li>RTMFP</li><li>vector data type</li></ul></li>
							<li><strong>Flash Player 9</strong> (9.0.28.0 / November 2006)<ul><li>Official MPEG-4 Video Support (Codecs: H.264 + AAC)</li><li>hardware Acceleration</li><li>multicore Support</li></ul></li>
							<li><strong>Flash Player 8</strong> (8.0.22.0 / August 2005)<ul><li>Video Codec On2 VP6</li><li>New text rendering engine</li><li>Live filters</li><li>Blendmodes</li></ul></li>
						</ul>				
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
