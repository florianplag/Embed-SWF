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
				<p>
					Please save this source code as .html file. Then add your .swf file (and <a href="http://code.google.com/p/swfobject/downloads/list" target="_blank">swfobject.js</a> if you don't use the Google hosted version).
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
					</ul>
					<h5>Import / Export</h5>
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
				<ul class="tabs">
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
					<div class="span12 columns">
						<form id="configForm" class="configForm tab-content">
							<!--  :::::: TAB1 ::::: -->
							<fieldset id="tab1" class="active" >
								<legend>
									Flash Content
									<p class="help-block">
										In this section, all basic settings for the flash content are provided. You have to customize the fields "Flash file" and "Dimensions" to your needs.
									</p>
								</legend>
								<div class="clearfix">
									<label data-content="The relative or absolute path to your flash content (.swf file).">Flash file (.swf)</label>
									<div class="input">
										<input class="xxlarge" id="f_flashFile" name="" size="30" type="text" value="" />
									</div>
								</div><!-- /clearfix -->
								<div class="clearfix">
									<label data-content="The width and height of your flash content. Default unit is pixel, you can also choose percent.">Dimensions</label>
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
									<label data-content="The background color of your flash content (Hex RGB value in the format #rrggbb). It overrides the background color setting specified in the Flash file.">Background Color</label>
									<div class="input">
										<input class="mini" id="f_param_bgcolor" name="" size="30" type="text" value="" />
									</div>
								</div><!-- /clearfix -->
								<div class="clearfix">
									<label data-content="The required flash player version (major, minor and release version, for instance 10.0.0).">Required Flash Player Version</label>
									<div class="input">
										<input class="mini" id="f_fpVersionMajor" name="" min="5" max="15" size="30" type="number"  />
										.
										<input class="mini" id="f_fpVersionMinor" name="" size="30" min="0" max="999" type="number"  />
										.
										<input class="mini" id="f_fpVersionRelease" name="" size="30" min="0" max="999" type="number"  />
									</div>
								</div><!-- /clearfix -->
								<div class="clearfix">
									<label data-content="The relative or absolute path to your expressInstall.swf file (if activated). Express install displays a standardized Flash plugin download dialog instead of your Flash content when the required plugin version is not available.">Express Install</label>
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
							<fieldset id="tab2" class="tabContent">
								<legend>
									HTML Definitions
									<p class="help-block">
										This section is about the HTML file you will generate.
									</p>
								</legend>
								<div class="clearfix">
									<label data-content="The ID of the HTML element (containing your alternative content) you would like to have replaced by your Flash content.">Flash Content ID</label>
									<div class="input">
										<input class="xlarge" id="f_contentID"  name="" size="30" type="text" />
									</div>
								</div><!-- /clearfix -->
								<div class="clearfix">
									<label data-content="The relative or absolute path to your swfobject.js file. You can also integrate swfobject.js directly from Google, then you don't need to host it for yourself.">SWFObject (.js)</label>
									<div class="input">
										<input class="xlarge" id="f_swfObjectPath" name="" size="30" type="text" />
										or use SWFObject hosted by Google
										<input type="checkbox" name="" id="f_swfObjectPath_useGoogle" />
									</div>
								</div><!-- /clearfix -->
								<div class="clearfix">
									<label for="textarea" data-content="It will be displayed if Flash is not installed or supported. This content will also be picked up by search engines, making it a great tool for creating search-engine-friendly content.">Alternative Content</label>
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
									<label data-content="Specifies a classname for an element">Class</label>
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
							<fieldset id="tab3" class="tabContent">
								<legend>
									Parameter
									<p class="help-block">
										Flash Player provides a lot of parameters. If don't need or know them, just skip this section.
									</p>
								</legend>
								<div class="span5 columns">
									<div class="clearfix">
										<label data-content="Specifies whether the movie begins playing immediately on loading in the browser (default: true).">play</label>
										<div class="input">
											<select class="small" name="" id="f_param_play">
												<option></option>
												<option>true</option>
												<option>false</option>
											</select>
										</div>
									</div><!-- /clearfix -->
									<div class="clearfix">
										<label data-content="Specifies whether the movie repeats indefinitely or stops when it reaches the last frame (default: true).">loop</label>
										<div class="input">
											<select class="small" name="" id="f_param_loop">
												<option></option>
												<option>true</option>
												<option>false</option>
											</select>
										</div>
									</div><!-- /clearfix -->
									<div class="clearfix">
										<label data-content="Shows a shortcut menu when users right-click on the flash content. To show only About Flash in the shortcut menu, select false (default: true).">menu</label>
										<div class="input">
											<select class="small" name="" id="f_param_menu">
												<option></option>
												<option>true</option>
												<option>false</option>
											</select>
										</div>
									</div><!-- /clearfix -->
									<div class="clearfix">
										<label data-content="Specifies the trade-off between processing time and appearance (default: high).">quality</label>
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
										<label data-content="Specifies scaling, aspect ratio, borders, distortion and cropping for if you have changed the document's original width and height (default: ).">scale</label>
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
										<label data-content="Specifies where the content is placed within the application: top (t), left (l), right (r) or bottom (b) or combinations between them.">salign</label>
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
										<label data-content="Sets the Window Mode property of the Flash movie for transparency, layering, and positioning in the browser. The default value is 'window' if this attribute is omitted.">wmode</label>
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
								<div class="span5 columns">
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
										<label data-content="Controls a SWF file's access to network functionality. The default value is 'all' if this attribute is omitted.">allownetworking</label>
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
										<label data-content="Controls the ability to perform outbound scripting from within a Flash SWF. The default value is 'always' if this attribute is omitted.">allowscriptaccess</label>
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
										<label data-content="Enables full-screen mode. The default value is false if this attribute is omitted. You must have version 9,0,28,0 or greater of Flash Player installed to use full-screen mode.">allowfullscreen</label>
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
										<label data-content="Specifies the base directory or URL used to resolve all relative path statements in the Flash Player movie. This attribute is helpful when your Flash Player movies are kept in a different directory from your other files.">base</label>
										<div class="input">
											<input class="mini" id="f_param_base" name="" size="30" type="text" value="" />
										</div>
									</div><!-- /clearfix -->
								</div><!-- span 6 columns -->
							</fieldset>
							<fieldset id="tab4">
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
							<fieldset id="tab5">
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
		</div>
		<!-- /container -->
		<?php
		include "php/footer.php";
		?>
	</body>
</html>
