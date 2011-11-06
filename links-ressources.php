<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Flash Player Links & Ressources</title>
		<meta name="description" content="Useful links and ressources about Flash Player and embedding Flash Content (SWF files) in HTML.">
		<meta name="author" content="Florian Plag">
		<?php
			include "php/js-includes.php";
		?>

		<script src="jslibs/swfobject.js"></script>
		<script src="js/PluginDetect.js"></script>
	</head>
	<body>
		<!-- ::::::::::::::: TOP ::::::::::::::::::::: -->
		<?php
			include "php/topnavi.php";
		?>

		<!-- ::::::::::::::: CONTAINER ::::::::::::::::::::: -->
		<div class="container-fluid">
			<!-- ::: SIDEBAR ::: -->
			<div class="sidebar">
				...
			</div>
			<!-- ::: CONTENT ::: -->
			<div class="content">
				<div class="span12 columns">
					<h2>Links & Ressources</h2>
					<h3>Embedding Flash Content</h3>
					<table class="zebra-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><a href="http://code.google.com/p/swfobject/">SWFObject</a></td>
								<td>SWFObject is an easy-to-use and standards-friendly method to embed Flash content, which utilizes one small JavaScript file. This is the official project site. Especially helpful are the <a href="http://code.google.com/p/swfobject/wiki/documentation">documentation</a> and the <a href="http://code.google.com/p/swfobject/wiki/faq">FAQ</a>). </td>
							</tr>
							<tr>
								<td><a href="http://code.google.com/intl/de-DE/apis/libraries/devguide.html">Google AJAX Libraries</a></td>
								<td>The Google Libraries API is a content distribution network and loading architecture for the most popular, open-source JavaScript libraries (including SWFObject).</td>
							</tr>
							<tr>
								<td><a href="http://kb2.adobe.com/cps/127/tn_12701.html">Adobe Flash Embed Settings</a></td>
								<td>This document lists the required and optional attributes of the object and embed tags used to publish SWF (Flash-enabled) content in HTML pages for display in web browsers. Contains also detailed explanations about wmode settings.</td>
							</tr>
							<tr>
								<td><a href="http://help.adobe.com/en_US/flex/using/WS2db454920e96a9e51e63e3d11c0bf69084-7f18.html">About the object and embed tags</a></td>
								<td>This document lists explanatins for the object and embed tags.</td>
							</tr>
						</tbody>
					</table>
					
					<h3>Flash Player (Runtime)</h3>
					<table class="zebra-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><a href="http://get.adobe.com/flashplayer/">Adobe Flash Player</a></td>
								<td>Get latest runtime versions of Adobe Flash Player (Desktop version).</td>
							</tr>
							<tr>
								<td><a href="https://market.android.com/details?id=com.adobe.flashplayer">Adobe Flash Player for Android</a></td>
								<td>Flash Player for Android in the Android Market.</td>
							</tr>
							<tr>
								<td><a href="http://kb2.adobe.com/cps/141/tn_14157.html">Uninstall Flash Player</a></td>
								<td>Tech note from Adobe how to uninstall Flash Player.</td>
							</tr>
							<tr>
								<td><a href="http://www.adobe.com/support/flashplayer/downloads.html">Debug and Stand-alone Flash Player</a></td>
								<td>Developers can download updated Flash Players for use with Flash from this page.</td>
							</tr>
							<tr>
								<td><a href="http://www.adobe.com/support/flashplayer/downloads.html">Archived Flash Player versions</a></td>
								<td>If you are a developer who is testing a site using different versions of Flash Player, download them from this page.</td>
							</tr>
						</tbody>
					</table>					
					
					<h3>Libraries used for embed-swf.org</h3>
					<table class="zebra-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><a href="http://twitter.github.com/bootstrap/">Twitter Bootstrap</a></td>
								<td>Bootstrap is a toolkit from Twitter designed to kickstart development of webapps and sites.
								It includes base CSS and HTML for typography, forms, buttons, tables, grids, navigation, and more.</td>
							</tr>
							<tr>
								<td><a href="http://documentcloud.github.com/backbone/">Backbone.js</a></td>
								<td>Backbone supplies structure to JavaScript-heavy applications by providing models with key-value binding and custom events, collections with a rich API of enumerable functions, views with declarative event handling, and connects it all to your existing application over a RESTful JSON interface.</td>
							</tr>
						</tbody>
					</table>					
					
					<p>If you think that something's missing here, drop me a <a href="contact.php">note</a>.</p>
					
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
