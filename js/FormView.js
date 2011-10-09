/* 
 * 
 * Controller that binds the model with the view components (and back) 
 * This class is responsible for the configurator form.
 * 
 * Note: Every form field in the HTML file is called:
 * "f_" + name of the variable (for instance "f_flashFile")
 * "f_param_" + name for parameters (for instance "f_param_base")
 * "f_flashVar" + number + "_name"/"_value" for flashvars (for instance "f_flashVar5_name" or "f_flashVar5_value")  
 *
 * Version 0.5
 * Copyright Florian Plag, www.video-flash.de, 2011
 * 
 * */

var FormView = Backbone.View.extend({
	tagName : "form",
	className : "configForm",

	/*
	 * initialize: 
	 * Setup a 2-way-binding for all the form elements
	 * Grab flashvars and transfer them to the fVarsHelpers (special case)
	 */
	initialize : function() {

		this.initTextInputBinding("alternativeContent");
		this.initTextInputBinding("attributeAlign");
		this.initTextInputBinding("attributeClass");
		this.initTextInputBinding("attributeName");
		this.initTextInputBinding("contentID");
		this.initTextInputBinding("dimensionWidth");
		this.initTextInputBinding("dimensionHeight");
		this.initTextInputBinding("dimensionUnit");
		this.initTextInputBinding("expressInstallSwfPath");		
		this.initCheckboxBindings("expressInstallSwfPath_enabled");
		this.initTextInputBinding("flashFile");
		this.initFlashvarBindings("flashVar1");
		this.initFlashvarBindings("flashVar2");
		this.initFlashvarBindings("flashVar3");
		this.initFlashvarBindings("flashVar4");
		this.initFlashvarBindings("flashVar5");
		this.initTextInputBinding("fpVersionMajor");
		this.initTextInputBinding("fpVersionMinor");
		this.initTextInputBinding("fpVersionRelease");
		this.initTextInputBinding("swfObjectPath");
		this.initCheckboxBindings("swfObjectPath_useGoogle");

		this.initParamBinding("allowfullscreen");
		this.initParamBinding("allownetworking");
		this.initParamBinding("allowscriptaccess");
		this.initParamBinding("base");
		this.initParamBinding("bgcolor");
		this.initParamBinding("devicefont");
		this.initParamBinding("fullscreenonselection");
		this.initParamBinding("loop");
		this.initParamBinding("menu");
		this.initParamBinding("play");
		this.initParamBinding("quality");
		this.initParamBinding("salign");
		this.initParamBinding("scale");
		this.initParamBinding("swfliveconnect");
		this.initParamBinding("seamlesstabbing");
		this.initParamBinding("wmode");     
		
		/*
		$("#f_flashFileViaInput").change(function() {
			var bindingConf = [];
			bindingConf.flashFile = $("#f_flashFileViaInput").val().split("\\").pop();
			swfObjConf.set(bindingConf);
		});		
		*/

		// if the model changes trigger the render of the UI		
		this.model.bind('change', this.render, this);
		
		swfObjConf.transferFlashVarsToHelpers();
		
		this.setupTooltips();
		
	},
	
	/*
	 * If the form field changes, update the model
	 */
	initTextInputBinding : function(confName) {

		$("#f_" + confName).change(function() {
			var bindingConf = [];
			bindingConf[confName] = $("#f_" + confName).val();
			swfObjConf.set(bindingConf);
		});
	},

	/*
	 * If the form field changes, update the model
	 */	
	initCheckboxBindings : function(confName) {

		$("#f_" + confName).change(function() {
			var bindingConf = [];
			bindingConf[confName] = $("#f_" + confName).is(':checked');
			swfObjConf.set(bindingConf);
		});		
		
	},
	
	/*
	 * If the form field changes, update the model
	 */	
	initFlashvarBindings : function(confName) {
		
		$("#f_" + confName + "_name").add("#f_" + confName + "_value").change(function() {
			var bindingConf = [];
			
			// get name and value of the form fields
			flashvarName = $("#f_" + confName + "_name").val();
			flashvarValue = $("#f_" + confName + "_value").val();
			
			// delete the old entry for this flashvar
			swfObjConf.get("fVarsHelper")[confName] = {};
			
			// write the new value
			if (flashvarName != "") {
				(swfObjConf.get("fVarsHelper")[confName])[flashvarName] = flashvarValue;
			}
			
			swfObjConf.forceUpdate();

		});
	},

	/*
	 * If the form field changes, update the model
	 */	
	initParamBinding : function(confName) {
		
		$("#f_param_" + confName).change(function() {
			
			var value = $("#f_param_" + confName).val();
			
			if (value != "") {
				(swfObjConf.get("params"))[confName] = value;
			} else { 
				delete (swfObjConf.get("params"))[confName];
			}
			
			swfObjConf.forceUpdate();
			
		});
	},	
	

	/*
	 * Render:
	 * If anythings in the model changes, this function is called. It updates the UI. 
	 */
	
	render : function() {
		this.renderTextInputField("alternativeContent");
		this.renderTextInputField("attributeAlign");
		this.renderTextInputField("attributeClass");
		this.renderTextInputField("attributeName");
		this.renderTextInputField("contentID");
		this.renderTextInputField("dimensionWidth");
		this.renderTextInputField("dimensionHeight");
		this.renderTextInputField("dimensionUnit");
		this.renderTextInputField("expressInstallSwfPath");
		this.renderCheckboxField("expressInstallSwfPath_enabled", "true");		
		this.renderTextInputField("flashFile");
		this.renderFlashVarInput("flashVar1");
		this.renderFlashVarInput("flashVar2");
		this.renderFlashVarInput("flashVar3");
		this.renderFlashVarInput("flashVar4");
		this.renderFlashVarInput("flashVar5");
		this.renderTextInputField("fpVersionMajor");
		this.renderTextInputField("fpVersionMinor");
		this.renderTextInputField("fpVersionRelease");
		this.renderTextInputField("swfObjectPath");
		this.renderCheckboxField("swfObjectPath_useGoogle", "false");

		this.renderParamInput("allowfullscreen");
		this.renderParamInput("allownetworking");
		this.renderParamInput("allowscriptaccess");
		this.renderParamInput("base");
		this.renderParamInput("bgcolor");
		this.renderParamInput("devicefont");
		this.renderParamInput("fullscreenonselection");
		this.renderParamInput("loop");
		this.renderParamInput("menu");
		this.renderParamInput("play");
		this.renderParamInput("quality");
		this.renderParamInput("salign");
		this.renderParamInput("scale");
		this.renderParamInput("swfliveconnect");
		this.renderParamInput("seamlesstabbing");
		this.renderParamInput("wmode");

		// write the current settings in the export settings text area
		$('#exportSettingsTextArea').val(JSON.stringify(swfObjConf.toJSON()));
	
		return this;
	},
	
	// helper function for rendering
	renderTextInputField : function(formField) {
		
		if ( checkIfExists ($("#f_" + formField)) == false) console.log("UI element missing: " + formField);		
		
		if (formField == "alternativeContent") {
			$("#f_" + formField).val(this.model.get(formField));
		} else {
			$("#f_" + formField).val(this.model.escape(formField));
		}
	},
	
	// helper function for rendering	
	renderFlashVarInput : function(formField) {

		if ( checkIfExists ($("#f_" + formField + "_name")) == false) console.log("UI for flashvars element missing: " + formField);
		if ( checkIfExists ($("#f_" + formField + "_value")) == false) console.log("UI for flashvars element missing: " + formField);

		var flashVarName;
		var flashVarValue;
		for (var key in this.model.get("fVarsHelper")[formField] ) {
			flashVarName = key;
			flashVarValue = this.model.get("fVarsHelper")[formField][key];
		}
		
		$("#f_" + formField + "_name").val(flashVarName);
		$("#f_" + formField + "_value").val(flashVarValue);
	},
	
	
	// helper function for rendering		
	renderParamInput : function(formField) {
		
		if ( checkIfExists ($("#f_param_" + formField)) == false) console.log("UI for param element missing: " + formField);
		
		if (this.model.get("params")[formField] != undefined) {
			value = this.model.get("params")[formField].toString();
			$("#f_param_" + formField).val( value ) ;
		} else {
			$("#f_param_" + formField).val("") ;
		}
	},

	// helper function for rendering	
	renderCheckboxField: function(formField, stringToCheck) {
		
		if ( checkIfExists ($("#f_" + formField)) == false) console.log("UI element missing: " + formField);
				
		
		// render checkbox state
		if(this.model.escape(formField) == "true") {
			$("#f_" + formField).attr("checked", "checked");
		} else {
			$("#f_" + formField).removeAttr('checked');
		}		
		
		// render disable state for corresponding input field (remove _xxxx from the end to find it)
		var nameOfBaseField = (formField.split("_")[0]);
				
		if ( checkIfExists ($("#f_" + nameOfBaseField)) == false) console.log("UI element missing: " + formField);				
				
		if(this.model.escape(formField) == stringToCheck) {
			$("#f_" + nameOfBaseField).removeAttr("disabled", "disabled");			
		} else {
			$("#f_" + nameOfBaseField).attr("disabled", "disabled");
		}		
	},
	
	/*
	 * Setup the toolstip for the labels
	 */
	setupTooltips: function() {
					   
		$('label').popover({
			placement: 'right',
			delayIn: 500,
			html: true
		});	
		
		// use label text as headline of the tooltip
		var labels = $('label');
		for (var i=0; i < labels.length; i++) {
			
			// only add tooltip if there's a text
			if( ($(labels[i]).attr("data-content")) != undefined ) {
				$(labels[i]).attr ("title", $(labels[i]).text()  );
				$(labels[i]).addClass('explanation');
			}
		};
		
		
	}
});

/*
 * Help function to check if a form element in HTML exists
 */
function checkIfExists(obj) {
	if (obj.length == 0) {
		return false
	} else {
		return true;
	} 
}

