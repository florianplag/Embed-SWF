/*
 * 
 * Controller for all the generic UI stuff
 * 
 * Version 0.5
 * Copyright Florian Plag, www.video-flash.de, 2011
 */
$(document).ready(function(){
	   
	// initiate form view	   
	var formView = new FormView({model: swfObjConf});
	window.formView = formView;
	formView.render();			   						   
	
			   
	// setup tab bar	
	$('.tabs').tabs();
		
	// init top bar
	$('#topbar').dropdown();	
	
	// setup export dialog		
	$('#modalExportDialog').modal(
				{
					backdrop: true,
					keyboard: false					
	});	

	// setup the template radio buttons		   
	$("input:radio[name='templateOptions']").click(function() {
		
		// Load template
		template.loadTemplate( Number($(this).val()) );
		if (Number($(this).val()) == 99) {
			$('#customTemplateTextArea').removeAttr("disabled", "disabled");
			template.set({useCustomTemplate: true});
		} else {
			$('#customTemplateTextArea').attr("disabled", "disabled");
			template.set({useCustomTemplate: false});			
		}
	});  


	initButtons();
	
	
	/*
	 * Init all button on the UI
	 */
	function initButtons() {
		
		// trigger export of the final HTML code
		$('#exportButton').click(function(event) {
	  		exportIt();
		});		
		
		// reset all settings in the form
		$("#resetFormButton").click(function(event) {
			event.preventDefault();
			$('.content').slideUp().slideDown();			
			swfObjConf.recoverDefaults();
		});			
		
		// apply an imported setting
		$("#applyCustomSetingsButton").click(function(event) {
			event.preventDefault();
			var newSettings = JSON.parse ($("#customSettingsTextArea").val());
			swfObjConf.initWithNewContent(newSettings );
		});	
				
		// show/hide the import/export panel at the left side		
		$("#showExportTextArea").click(function(event) {
			event.preventDefault();
			$("#importExportDiv").toggle(function() {
  				if ($("#showExportTextArea").is(":visible")) {
					console.log("true");
					$("#showExportTextArea").html("Hide");
				} else {
					$("#showExportTextArea").html("Show");
				}
  			});
  			
  			
		});		
		
		$("#downloadButton").click(function() {
			$.generateFile({
				filename	: 'embed-swf.html',
				content		: $('#exportCodeTxt').val(),
				script		: 'php/download.php'
		});
		
		});	
			
	}
	
	/*
	 * Export function when the users wants the final HTML code
	 */
	function exportIt() {

			// prepare model for the export
			swfObjConf.updateForExport();
			
			// decide if the note to download swfobject.js shall be shown  			
  			if(swfObjConf.get("swfObjectPath_useGoogle") == true) {
  				$("#downloadSwfObjectNote").hide();
  			} else {
  				$("#downloadSwfObjectNote").show();	
  			}			
			
			// show modal dialog
			$('#modalExportDialog').modal('toggle');
			
			// reset textarea and get the new embed code
			$('#exportCodeTxt').html("");
			$('#exportCodeTxt').append(template.renderTemplate());
			
	}


}); 

