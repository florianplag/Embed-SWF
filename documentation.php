<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Links & Ressources</title>
		<meta name="description" content="">
		<meta name="author" content="">
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
			<br />
			<br />
			<br />
			<!-- ::: SIDEBAR ::: -->
			<div class="sidebar">
				<div class="well">
					..
				</div>
			</div>
			<!-- ::: CONTENT ::: -->
			<div class="content">
				<div class="span12 columns">
					<h2>Release Notes</h2>
					<p>
						Version 0.5 Beta. First public release (October 9, 2011).
					</p>
					<ul>
						<li>
							<span class="label success">New</span> Configurator for embedding SWF files using SWFObject
							<ul>
								<li>
									All options and settings for embedding SWF files.
								</li>
								<li>
									Your current settings are stored if you leave the web page (HTML5 / LocalStorage)
								</li>
								<li>
									Powerful template engine for rendering in custom HTML templates.
								</li>
								<li>
									Export and import your settings using a JSON object.
								</li>
							</ul>
						</li>
						<li>
							<span class="label success">New</span> Flash Player detection and latest runtime version.
						</li>
						<li>
							<span class="label success">New</span> Links & Ressources for Adobe Flash Player
						</li>
						<li>
							<span class="label success">New</span> Basic version of the documentation.
						</li>
					</ul>
					<p>
						At the moment, this site is only tested in the latest version of Safari, Chrome and Firefox. You can file bugs and requests at <a href="https://github.com/florianplag/Embed-SWF/issues">Github</a>. 
					</p>
					<h2>About</h2>
					<p>
						The main goal of this site is to provide an easy way for embedding a flash file (.swf) in an HTML page. A lot of people don't know exactly how this works and what options you have. By using <em>SWFObject</em>, an Open Source JavaScript Library, you benefit from all the features of this popular library (standards-friendly, HTML fallback, Flash Player detection, etc.) which is well-known as the best solution for embedding SWF files.
					</p>
					<h2>Instructions</h2>
					Let's start with an easy example: Download this <a href="flash-demos/sample1/sample1.zip">ZIP-File</a> containing a flash demo file and we'll create an HTML template for it.
					<ol>
						<li>
							Open the <a href="embed-swf.php">Configurator</a> (Restore the default settings using the button on the left side in case you already played with the configurator). The most important fields are "Flash file" and "Dimensions" on the first tab. Put the name of your flash file ("sample1.swf") and choose the size (300x300).
						</li>
						<li>
							Jump to the last tab (Export) and click the "Show HTML Code" Button. Copy the source code from the window and save it as "index.html" in the same folder as the downloaded demo assets.
						</li>
						<li>
							Open the index.html in your browser and you should see the <a href="flash-demos/sample1/index.html">flash content.</a>
						</li>
					</ol>
					<p>
						That's it!
					</p>
					<h2>Troubleshooting</h2>
					<p>
						If your Flash content isn't displayed properly, check these points:
					</p>
					<p>
						<ul>
							<li>
								<strong>Flash area is empty</strong>
								<ul>
									<li>
										Right click on the Flash area. If the context menu displays „Movie not loaded…” it's likely that the path to your Flash file is not correct. So the Flash Player is initialized but your movie couldn't be loaded which results in an empty Flash area. In order to find out what's exactly the problem have a look at the HTTP Requests for this page („Web Developer > Web Console” in Firefox; „Window > Activity” in Safari). You can see exactly the (wrong) path from where the browser tries to load the SWF file (404 error).
									</li>
								</ul>
							</li>
							<li>
								<strong>The alternative content is always displayed / Flash Player Detection is wrong</strong>
								<ul>
									<li>
										This problem can occur when the swfobject.js is not included properly. If this file is missing, you always see the alternative content. That's because SWFObject isn't loaded and doesn't overwrite the alternative content with the Flash content. And if the alternative content says something like "Get Adobe Flash Player", this message is confusing and leads you to the wrong assumption that Flash Player isn't installed (but in reality SWFObject is missing). 
									</li>
								</ul>
							</li>
						</ul>
					You can also check the <a href="http://code.google.com/p/swfobject/wiki/faq">SWFObject FAQ</a> for more specific problems.
					</p>
					
					
					<h2>Custom Settings</h2>
					<p>
						You can import and export your settings. Technically, this is a JSON object. Here's an example.
					</p>
					<pre>
{
"alternativeContent" : "",
"attributeAlign": "",
"attributeClass": "",
"attributeName": "",
"contentID" : "",
"flashFile" : "",
"fpVersionMajor" : 11,
"fpVersionMinor" : 0,
"fpVersionRelease" : 0,
"dimensionWidth" : 640,
"dimensionHeight" : 480,
"dimensionUnit" : "",
"expressInstallSwfPath_enabled" : false,
"expressInstallSwfPath" : "expressInstall.swf",
"flashVars": {    
	"demo": "demo123"  
},
"params" : {
	 "allownetworking": "internal",
	 "allowscriptaccess": "always",
	 "allowfullscreen": "",
	 "base": "",
	 "bgcolor": "#FFFFFF",
	 "devicefont": "",
	 "fullscreenonselection": "",
	 "menu": "",
	 "loop": "",
	 "play": "",
	 "quality": "",
	 "scale": "",
	 "salign": "",
	 "seamlesstabbing": "",
	 "swfliveconnect": ""   		
},
"swfObjectPath": "swfobject.js",
"swfObjectPath_useGoogle" : false
}						
					</pre>
					<h2>Custom Templates</h2>
					<p>
						If you want to use your own custom HTML file, you can create a template. The template engine supports inserting variables as well as running JavaScript code inside (for loops, if-statements, etc.).
						<ul>
							<li>
								Variables are inserted using the syntax
								<code>
									<%= variableName %>
								</code>
								.
							</li>
							<li>
								You can write an if-statement using
								<code>
									<%= variable1 == true ? 'hardcoded value' : variable2 %>
								</code>
							</li>
							<li>
								You can loop through the flashvars and parameters:
								<code>
									<% _.each(flashVars, function(name, key) {
									%>flashvars.<%= key %>="<%= name %>";
									<% });%>
								</code>
							</li>
						</ul>
					</p>
					<p>
						[to do: List of all variable names.]
					</p>
					<pre>
&lt;html xmlns=&quot;http://www.w3.org/1999/xhtml&quot; lang=&quot;en&quot; xml:lang=&quot;en&quot;&gt;
	&lt;head&gt;
		&lt;title&gt;&lt;/title&gt;
		&lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=iso-8859-1&quot; /&gt;
		&lt;script type=&quot;text/javascript&quot; src=&quot;&lt;%= swfObjectPath_useGoogle == true ? &#x27;http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js&#x27; : swfObjectPath %&gt;&quot;&gt;&lt;/script&gt;
		&lt;script type=&quot;text/javascript&quot;&gt;
			var flashvars = {};
			var params = {};
			var attributes = {};
					
			&lt;% _.each(flashVars, function(name, key) { 
			%&gt;flashvars.&lt;%= key %&gt;=&quot;&lt;%= name %&gt;&quot;;
			&lt;% });%&gt;
			&lt;% _.each(params, function(name, key) { 
			%&gt;params.&lt;%= key %&gt;=&quot;&lt;%= name %&gt;&quot;; 
			&lt;% }); %&gt;
			swfobject.embedSWF(&quot;&lt;%= flashFile %&gt;&quot;, &quot;&lt;%= contentID %&gt;&quot;, &quot;&lt;%= dimensionWidth %&gt;&lt;%= dimensionUnit %&gt;&quot;, &quot;&lt;%= dimensionHeight %&gt;&lt;%= dimensionUnit %&gt;&quot;, &quot;&lt;%= fpVersionMajor %&gt;.&lt;%= fpVersionMinor %&gt;.&lt;%= fpVersionRelease %&gt;&quot;, &lt;%= expressInstallSwfPath_enabled == true ? &#x27;&quot;&#x27; + expressInstallSwfPath + &#x27;&quot;&#x27; : &#x27;false&#x27; %&gt;, flashvars, params, attributes);
		&lt;/script&gt;
	&lt;/head&gt;
	&lt;body&gt;
		&lt;div id=&quot;&lt;%= contentID %&gt;&quot;&gt;
			&lt;%= alternativeContent %&gt;
		&lt;/div&gt;
	&lt;/body&gt;
&lt;/html&gt;
					</pre>
					<p>
						By the way, the template engine used in this project is from <a href="http://documentcloud.github.com/underscore/#template">Underscore.js</a>
					</p>
					<h2>Thanks</h2>
					<p>Thanks to creators of SWFObject for this great open source project!</p>
					
					<h2>Trademarks</h2>
					<p>Adobe and Flash Player are either registered trademarks or trademarks of Adobe Systems Incorporated in the United States and/or other countries.</p>
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
