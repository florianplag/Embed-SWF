<?php
$pageId = 2;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Embed SWF</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<?php
		include "php/js-includes.php";
		?>

		<script src="js/SwfObjConf.js"></script>
		<script src="js/Template.js"></script>
		<script src="js/FormView.js"></script>
		<script src="js/ui-controller.js"></script>
		<script src="jslibs/jquery.generateFile.js"></script>
	</head>
	<body>
		<!-- ::::::::::::::: MODAL ::::::::::::::::::::: -->
		<div class="modal hide" id="modalExportDialog">
			<div class="modal-header">
				<a href="#" class="close">&times;</a>
				<h3>Your HTML code</h3>
			</div>
			<div class="modal-body">
				<textarea id="exportCodeTxt" class="copy-code" readonly="readonly" onclick="this.focus();this.select()"  style=' height:300px; width:100%; overflow:scroll'></textarea>
			</div>
			<div class="modal-footer">
				<p class="">
					<a class="btn large primary" id="downloadButton">Download</a>Download this .html file and add your .swf file. <span id="downloadSwfObjectNote">Don't forget to add <a href="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js" target="_blank">swfobject.js</a> (right click and „save as”).</span>
				</p>
			</div>
		</div>
		<!-- ::::::::::::::: TOP ::::::::::::::::::::: -->
		<?php
		include "php/topnavi.php";
		?> <!-- ::::::::::::::: CONTAINER ::::::::::::::::::::: -->
		<div class="container-fluid">
			<!-- ::: SIDEBAR ::: -->
			<div class="sidebar">
				<!--<img class="thumbnail" src="http://placehold.it/160x600" alt="">-->
				<div class="well">
					<h4>Settings</h4>
					<p>
						You can <a  id="resetFormButton">restore the default settings</a> of the form.
					</p>
					</ul> <h5>Import / Export</h5>
					<p>
						Import and export custom settings using a JSON object. <a id="showExportTextArea">Show</a>
					</p>
					<div id="importExportDiv" style="display:none">
						<h6>Import</h6>
						<textarea  id="customSettingsTextArea" style="width:160px;height:100px"></textarea>
						<a href="" id="applyCustomSetingsButton" class="btn small">Apply</a>
						<h6>Export</h6>
						Store the following snippet as a text file. You can import it later using the panel above. 						<textarea id="exportSettingsTextArea" style="width:160px;height:100px;"></textarea>
					</div>
				</div>
			</div>
			<!-- ::: CONTENT ::: -->
			<div class="content">
				<!-- ::: TABS ::: -->
				<ul class="tabs" data-tabs="tabs">
					<li class="active">
						<a href="#tab1">SWF Configuration</a>
					</li>
					<li>
						<a href="#tab2">HTML Definition</a>
					</li>
					<li>
						<a href="#tab3">Parameters</a>
					</li>
					<li>
						<a href="#tab4">FlashVars</a>
					</li>
					<li>
						<a href="#tab5"><strong>Export</strong></a>
					</li>
				</ul>
				<div class="row">
					<div class="span12">
						<form id="configForm" class="configForm tab-content" >
							<!--  :::::: TAB1 ::::: -->
							<fieldset id="tab1" class="active tab-pane" >
								<legend>
									Flash Content
									<p class="help-block">
										In this section, all basic settings for the flash content are provided. You have to customize the fields "Flash file" and "Dimensions" to your needs.
									</p>
								</legend>
								<div class="clearfix">
									<label data-content="<p><strong>Path and filename of your SWF file.</strong></p><p>The relative or absolute path to your flash content. Examples: <code>main.swf</code> or <code>subfolder/app.swf</code> or <code>http://example.com/main.swf</code>.</p>">Flash file (.swf)</label>
									<div class="input">
										<input class="xxlarge" id="f_flashFile" name="" size="30" type="text" value="" />
									</div>
								</div><!-- /clearfix -->
								<div class="clearfix">
									<label data-content="<p><strong>The width and height of your flash content.</strong></p><p>Default unit is pixel, you can also choose percent (<code>%</code>).</p>">Dimensions</label>
									<div class="input">
										<input class="mini" id="f_dimensionWidth" name="" size="30" type="text" />
										x
										<input class="mini" id="f_dimensionHeight" name="" size="30" type="text" />
										<select class="mini" name="" id="f_dimensionUnit">
											<option value=""></option>
											<option value="%">%</option>
										</select>
									</div>
								</div><!-- /clearfix -->
								<div class="clearfix">
									<label data-content="<p><strong>Background color of your flash content.</strong></p><p>The background color is specified as Hex RGB value in the format <code>#rrggbb</code> (for instance <code>#FF0000</code> for red). It overrides the background color setting specified in the Flash file.</p>">Background Color</label>
									<div class="input">
										<input class="mini" id="f_param_bgcolor" name="" size="30" type="text" value="" />
									</div>
								</div><!-- /clearfix -->
								<div class="clearfix">
									<label data-content="<p><strong>The minimum Flash Player version.</strong></p><p>Adjust this setting to the required flash player version of your content. If the user doesn't have it, the alternative content is shown (or express install starts if activated).</p><p>See 'Flash Player Version' page for a list of important versions if you are not sure.</p>">Required Flash Player Version</label>
									<div class="input">
										<input class="mini" id="f_fpVersionMajor" name="" min="5" max="15" size="30" type="number"  />
										.
										<input class="mini" id="f_fpVersionMinor" name="" size="30" min="0" max="999" type="number"  />
										.
										<input class="mini" id="f_fpVersionRelease" name="" size="30" min="0" max="999" type="number"  />
									</div>
								</div><!-- /clearfix -->
								<div class="clearfix">
									<label data-content="<p><strong>Path to your Express Install SWF file.</strong></p>The relative or absolute path to your <code>expressInstall.swf</code> file (if this feature is activated). <p>Express install displays a standardized Flash plugin download dialog instead of your Flash content when the required plugin version is not available.</p>">Express Install</label>
									<div class="input">
										<div class="input-prepend">
											<input class="large" id="f_expressInstallSwfPath"  disabled="disabled" name="" size="16" type="text" />
											<label class="add-on active">
												<input type="checkbox" id="f_expressInstallSwfPath_enabled"  />
											</label>
										</div>
									</div>
								</div><!-- /clearfix -->
							</fieldset>
							<fieldset id="tab2" class="tab-pane">
								<legend>
									HTML Definitions
									<p class="help-block">
										This section is about the HTML file you will generate.
									</p>
								</legend>
								<div class="clearfix">
									<label data-content="<p><strong>ID of the HTML Container for the Flash content.</strong></p><p>The ID of the HTML element you would like to have replaced by your Flash content (normally a div element). This element also contains your alternative content.</p><p>If you have several SWFs on a page, it's important to use a unique ID for each one (otherwise they will be messed up).</p>">Flash Content ID</label>
									<div class="input">
										<input class="xlarge" id="f_contentID"  name="" size="30" type="text" />
									</div>
								</div><!-- /clearfix -->
								<div class="clearfix">
									<label data-content="<p><strong>Path and filename of swfobject.js</strong></p><p>The relative or absolute path to your swfobject.js javascript file. Examples: <code>swfobject.js</code> or <code>js/swfobject.js</code> or <code>http://examples.com/swfobject.js</code>.</p><p>For your convience, you can also integrate swfobject.js from Google, then you don't even need to download swfobject.js because it comes directly from the Google Ajax Libraries.</p>">SWFObject (.js)</label>
									<div class="input">
										<input class="xlarge" id="f_swfObjectPath" name="" size="30" type="text" />
										or use SWFObject hosted by Google
										<input type="checkbox" name="" id="f_swfObjectPath_useGoogle" />
									</div>
								</div><!-- /clearfix -->
								<div class="clearfix">
									<label for="textarea" data-content="<p><strong>Alternative content when Flash is not available or supported.</strong></p><p>The alternative content will be displayed if Flash is not installed or supported (for example on iOS) or the installed version is below the required minimum version. So you could use it for a Flash Player error message or even better an alternative HTML version of your Flash file (if possible...). Furthermore, this content will also be picked up by search engines, so place for your search-engine content and keywords here.</p>">Alternative Content</label>
									<div class="input">
										<textarea class="xxlarge" id="f_alternativeContent" name="textarea"></textarea>
									</div>
								</div><!-- /clearfix -->
								<legend>
									Attributes
									<p class="help-block">
										Optional section.
									</p>
								</legend>
								<br />
								<div class="clearfix">
									<label data-content="You can specify a class name that will be assigned to the Flash content. So you can style it with CSS.">Class</label>
									<div class="input">
										<input class="xlarge" id="f_attributeClass" name="" size="30" type="text" value="" />
									</div>
								</div><!-- /clearfix -->
								<div class="clearfix">
									<label data-content="Defines the name for an object (to use in scripts).">Name</label>
									<div class="input">
										<input class="xlarge" id="f_attributeName" name="" size="30" type="text" value="" />
									</div>
								</div><!-- /clearfix -->
								<div class="clearfix">
									<label data-content="HTML alignment of the object element. If this attribute is omitted, it by default centers the movie and crops edges if the browser window is smaller than the movie.">Align</label>
									<div class="input">
										<select class="small" name="" id="f_attributeAlign">
											<option></option>
											<option>middle</option>
											<option>left</option>
											<option>right</option>
											<option>top</option>
											<option>bottom</option>
										</select>
									</div>
								</div><!-- /clearfix -->
							</fieldset>
							<fieldset id="tab3" class="tab-pane">
								<legend>
									Parameter
									<p class="help-block">
										Flash Player provides a lot of parameters. If don't need or know them, just skip this section.
									</p>
								</legend>
								<div class="row">
								<div class="span5">
									<div class="clearfix">
										<label data-content="<p><strong>Specifies whether the movie begins playing immediately on loading in the browser</strong></p><p>Default is <code>true</code>. Has no effect on Flex Applications.</p>">play</label>
										<div class="input">
											<select class="small" name="" id="f_param_play">
												<option></option>
												<option>true</option>
												<option>false</option>
											</select>
										</div>
									</div><!-- /clearfix -->
									<div class="clearfix">
										<label data-content="<p><strong>Specifies whether the movie repeats indefinitely or stops when it reaches the last frame</strong></p><p>Possible values are <code>true</code> (default) and <code>false</code>. This parameter has no effect on Flex Applications.</p>">loop</label>
										<div class="input">
											<select class="small" name="" id="f_param_loop">
												<option></option>
												<option>true</option>
												<option>false</option>
											</select>
										</div>
									</div><!-- /clearfix -->
									<div class="clearfix">
										<label data-content="<p><strong>Changes the appearance of the menu that appears when users right-click over an application.</strong></p><p><code>true</code> displays the entire menu (default). Set to <code>false</code> to display only the 'About' and 'Settings' options on the menu.</p> ">menu</label>
										<div class="input">
											<select class="small" name="" id="f_param_menu">
												<option></option>
												<option>true</option>
												<option>false</option>
											</select>
										</div>
									</div><!-- /clearfix -->
									<div class="clearfix">
										<label data-content="<p><strong>Specifies the display list Stage rendering quality</strong></p><p><code>low</code> favors playback speed over appearance and never uses anti-aliasing.</p><p><code>autolow</code> emphasizes speed at first but improves appearance whenever possible. Playback begins with anti-aliasing turned off. If Flash Player can handle it, anti-aliasing is turned on.</p><p><code>autohigh</code> emphasizes playback speed and appearance equally at first but sacrifices appearance for playback speed if necessary. Playback begins with anti-aliasing turned on. If the frame rate drops, anti-aliasing is turned off.</p><p><code>medium</code> applies some anti-aliasing and does not smooth bitmaps.<p><p><code>high</code> (default) favors appearance over playback speed and always applies anti-aliasing. If the movie does not contain animation, bitmaps are smoothed.</p><p><code>best</code> provides the best display quality and does not consider playback speed. All output is anti-aliased and all bitmaps are smoothed.</p>">quality</label>
										<div class="input">
											<select class="small" name="" id="f_param_quality">
												<option></option>
												<option>best</option>
												<option>high</option>
												<option>medium</option>
												<option>autohigh</option>
												<option>autolow</option>
												<option>low</option>
											</select>
										</div>
									</div><!-- /clearfix -->
									<br />
									<div class="clearfix">
										<label data-content="<p><strong>Defines how the browser fills the screen with the SWF file.</strong></p><p><code>showall</code> shows the SWF file in the specified area, while maintaining the original aspect ratio. Borders may appear on two sides.</p><p>Set to <code>noborder</code> to scale the SWF file to fill the specified area but possibly with some cropping, while maintaining the original aspect ratio.</p><p>Set to <code>exactfit</code> to make the entire SWF file visible in the specified area without trying to preserve the original aspect ratio. Distortion may occur.</p><p><code>noscale</code> prevents the SWF file from scaling to fit the area. Cropping can occur.</p>">scale</label>
										<div class="input">
											<select class="small" name="" id="f_param_scale">
												<option></option>
												<option>showall</option>
												<option>noborder</option>
												<option>exactfit</option>
												<option>noscale</option>
											</select>
										</div>
									</div><!-- /clearfix -->
									<div class="clearfix">
										<label data-content="<p><strong>Positions the SWF file within the Browser</strong></p> <p>At the <code>t</code> (top), <code>l</code> (left), <code>r</code> (right) or <code>b</code> (bottom) of the Browser. Or combinations of those positions (like top-left <code>tl</code>)</p>">salign</label>
										<div class="input">
											<select class="small" name="" id="f_param_salign">
												<option></option>
												<option>tl</option>
												<option>tr</option>
												<option>bl</option>
												<option>br</option>
												<option>l</option>
												<option>t</option>
												<option>r</option>
												<option>b</option>
											</select>
										</div>
									</div><!-- /clearfix -->
									<div class="clearfix">
										<label data-content="<p><strong>Sets the Window Mode property of the Flash movie for transparency, layering, and positioning in the browser.</strong></p><p>The default value is <code>window</code> and plays the SWF in its own rectangular window on a web page.</p><p>Set to <code>opaque</code> to hide everything on the page behind it (useless on OS X and Linux). Disables Hardware Rendering.</p><p>Set to <code>transparent</code> so that the background of the HTML page shows through all transparent portions of the SWF file. This can slow animation performance and disables Hardware Rendering.</p><p><code>gpu</code> was introduced with Flash Player 10, but since Flash Player 10.1 hardware rendering is automatically enabled on supported devices, so it's not necessary to add it.</p><p><code>direct</code> is recommended to provide the best performance for content playback. It enables hardware accelerated presentation of SWF content that uses Stage Video or Stage 3D.</p>">wmode</label>
										<div class="input">
											<select class="small" name="" id="f_param_wmode">
												<option></option>
												<option>window</option>
												<option>transparent</option>
												<option>opaque</option>
												<option>direct</option>
												<option>gpu</option>
											</select>
										</div>
									</div><!-- /clearfix -->
								</div><!-- span 5 columns -->
								<div class="span5">
									<div class="clearfix">
										<label data-content="Specifies whether users are allowed to use the Tab key to move keyboard focus out of a Flash movie and into the surrounding HTML (or the browser, if there is nothing focusable in the HTML following the Flash movie). The default value is true if this attribute is omitted.">seamlesstabbing</label>
										<div class="input">
											<select class="small" name="" id="f_param_seamlesstabbing">
												<option></option>
												<option>true</option>
												<option>false</option>
											</select>
										</div>
									</div><!-- /clearfix -->
									<div class="clearfix">
										<label data-content="<p><strong>Controls a SWF file's access to network functionality.</strong></p><p>The default value is <code>all</code> which means that there are no restrictions.</p><p><code>internal</code> means that the SWF file cannot call browser navigation or browser interaction APIs (such as ExternalInterface.call, fscommand, and navigateToURL), but other networking APIs.</p><p>In addition to the APIs restriced by the previous setting, <code>none</code> forbids that the SWF files can call networking or SWF-to-SWF file communication APIs (such as URLLoader.load(), Security.loadPolicyFile(), and SharedObject.getLocal()).</p>">allownetworking</label>
										<div class="input">
											<select class="small" name="" id="f_param_allownetworking">
												<option></option>
												<option>all</option>
												<option>internal</option>
												<option>none</option>
											</select>
										</div>
									</div><!-- /clearfix -->
									<div class="clearfix">
										<label data-content="<p><strong>Controls the ability to perform outbound scripting from within a SWF file.</strong> This affects operations like ExternalInterface.call, fscommand or navigateToUrl.</p><p>The default value is <code>always</code> (outbound scripting always succeeds).</p><p>With <code>samedomain</code> outbound scripting only succeeds when the application is from the same domain as the HTML page.</p>Outbound scripting always fails if set to <p><code>never</code>.</p>">allowscriptaccess</label>
										<div class="input">
											<select class="small" name="" id="f_param_allowscriptaccess">
												<option></option>
												<option>always</option>
												<option>sameDomain</option>
												<option>never</option>
											</select>
										</div>
									</div><!-- /clearfix -->
									<div class="clearfix">
										<label data-content="<p><strong>Allows Full-screen mode.</strong></p><p><code>true</code> allows the SWF file to enter full screen mode via ActionScript. Default is <code>false</code>. Full-screen mode requires Flash Player 9,0,28,0 or greater.</p>">allowfullscreen</label>
										<div class="input">
											<select class="small" name="" id="f_param_allowfullscreen">
												<option></option>
												<option>true</option>
												<option>false</option>
											</select>
										</div>
									</div><!-- /clearfix -->
									<div class="clearfix">
										<label>fullscreenonselection</label>
										<div class="input">
											<select class="small" name="" id="f_param_fullscreenonselection">
												<option></option>
												<option>true</option>
												<option>false</option>
											</select>
										</div>
									</div><!-- /clearfix -->
									<div class="clearfix">
										<label data-content="Specifies whether static text objects that the Device Font option has not been selected for will be drawn using device fonts anyway, if the necessary fonts are available from the operating system.">devicefont</label>
										<div class="input">
											<select class="small" name="" id="f_param_devicefont">
												<option></option>
												<option>true</option>
												<option>false</option>
											</select>
										</div>
									</div><!-- /clearfix -->
									<div class="clearfix">
										<label data-content="Specifies whether the browser should start Java when loading the Flash Player for the first time. The default value is false if this attribute is omitted. If you use JavaScript and Flash on the same page, Java must be running for the FSCommand to work.">swfliveconnect</label>
										<div class="input">
											<select class="small" name="" id="f_param_swfliveconnect">
												<option></option>
												<option>true</option>
												<option>false</option>
											</select>
										</div>
									</div><!-- /clearfix -->
									<div class="clearfix">
										<label data-content="<p><strong>Specifies the base directory or URL used to resolve all relative path statements in ActionScript.</strong></p> <p>This attribute is very helpful when your SWFs are kept in a different directory than your HTML file.</p><p>Using the value <code>.</code> (just a dot) stands for the path where the main SWF is located.</p>">base</label>
										<div class="input">
											<input class="large" id="f_param_base" name="" size="30" type="text" value="" />
										</div>
									</div><!-- /clearfix -->
								</div><!-- span 6 columns -->
								</div><!--row-->
							</fieldset>
							<fieldset id="tab4" class="tab-pane">
								<div class="span12 columns">
									<legend>
										Flash Variables (Flashvars)
										<p class="help-block">
											Optional section: Flashvars are variables that will be passed from the HTML file to your Flash content.
										</p>
									</legend>
									<br />
									<table summary="flashvars">
										<thead>
											<tr>
												<th>#</th>
												<th>Key</th>
												<th>Value</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>
												<input class="xlarge" id="f_flashVar1_name" name="" size="30" type="text" value="" />
												</td>
												<td>
												<input class="xlarge" id="f_flashVar1_value" name="" size="30" type="text" value="" />
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>
												<input class="xlarge" id="f_flashVar2_name" name="" size="30" type="text" value="" />
												</td>
												<td>
												<input class="xlarge" id="f_flashVar2_value" name="" size="30" type="text" value="" />
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>
												<input class="xlarge" id="f_flashVar3_name" name="" size="30" type="text" value="" />
												</td>
												<td>
												<input class="xlarge" id="f_flashVar3_value" name="" size="30" type="text" value="" />
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>
												<input class="xlarge" id="f_flashVar4_name" name="" size="30" type="text" value="" />
												</td>
												<td>
												<input class="xlarge" id="f_flashVar4_value" name="" size="30" type="text" value="" />
												</td>
											</tr>
											<tr>
												<td>5</td>
												<td>
												<input class="xlarge" id="f_flashVar5_name" name="" size="30" type="text" value="" />
												</td>
												<td>
												<input class="xlarge" id="f_flashVar5_value" name="" size="30" type="text" value="" />
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</fieldset>
							<fieldset id="tab5" class="tab-pane">
								<legend>
									Templates
									<p class="help-block">
										Choose an export Template
									</p>
								</legend>
								<div class="input">
									<ul class="inputs-list">
										<li>
											<label>
												<input type="radio" checked name="templateOptions" value="1" />
												<span><strong>Dynamic</strong> (The dynamic publishing method is based on marked up alternative content and uses JavaScript to replace this content with Flash content if the minimal Flash Player version is installed and enough JavaScript support is available.)</span> </label>
										</li>
										<li>
											<label>
												<input type="radio" name="templateOptions" value="2" />
												<span><strong>Static</strong> (The static publishing method embeds both Flash content and alternative content using standards compliant markup, and uses JavaScript to resolve the issues that markup alone cannot solve)</span> </label>
										</li>
										<li>
											<label>
												<input type="radio" name="templateOptions" value="99" />
												<span><strong>Custom</strong> (Use your own HTML template.)</span> </label>
										</li>
									</ul>
									<p>
										<textarea id="customTemplateTextArea" disabled="disabled" style="width:100%;height:200px"></textarea>
									</p>
									<br />
									<a class="btn large primary" id="exportButton">Show HTML Code</a>
								</div>
							</fieldset>
						</form>
					</div><!-- /span12 columns -->
				</div><!-- /row -->
				<!-- ::: TAB1 ::: -->
			</div>
			<!-- /CONTENT -->
			<?php
			include "php/footer.php";
			?>
		</div>
		<!-- /container -->
	</body>
</html>
