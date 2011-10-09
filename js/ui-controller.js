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
	$("body").keypress(function(event) {
  		if ( event.which == 101 ) {
     		event.preventDefault();
     		exportIt();
   		}

	});
	*/
	
	/*
	 * Init all button on the UI
	 */
	function initButtons() {
		
		$('#exportButton').click(function(event) {
	  		exportIt();
		});		
		
		$("#resetFormButton").click(function(event) {
			event.preventDefault();
			$('.content').slideUp().slideDown();			
			swfObjConf.recoverDefaults();
		});			
		$("#applyCustomSetingsButton").click(function(event) {
			event.preventDefault();
			var newSettings = JSON.parse ($("#customSettingsTextArea").val());
			swfObjConf.initWithNewContent(newSettings );
		});	
				
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
			
	}
	
	function exportIt() {

			// prepare model for the export
			swfObjConf.updateForExport();
			
			// show modal dialog
			$('#modalExportDialog').modal('toggle');
			
			// reset textarea and get the new embed code
			$('#exportCodeTxt').html("");
			$('#exportCodeTxt').append(template.renderTemplate());
			
	}


}); 

