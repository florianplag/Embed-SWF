
/* 
 * 
 * Model for the HTML export templates. They contain placeholder for all of the swfobject user settings. 
 * 
 * 
 * Version 0.5
 * Copyright Florian Plag, www.video-flash.de, 2011
 * 
 * */

var Template = Backbone.Model.extend({

	currentTemplate : {},
	currentCode : {},

	validate : function(attrs) {
	},
	initialize : function() {
		this.loadTemplate(1);
	},
	loadTemplate : function(templNumber) {

		// fix the scope
		_.bindAll(this, "onLoaded");

		var templUrl = "";

		switch (templNumber) {
		  case 1:
		    templUrl = "1-dynamic-template.tmpl";
		    break;
		  case 2:
		    templUrl = "2-static-template.tmpl";
		    break;
		}	
		
		// if the string is not empty, load the template
		if (templUrl != "") {
			$.get("templates/" + templUrl, this.onLoaded)
				.error(this.onError);
		} 

	},
	onLoaded : function(data) {
		this.set({
			currentTemplate : data
		});
		
		// update custom text area
		$('#customTemplateTextArea').text(this.get('currentTemplate'));
	},
	onError : function() {
		alert("Sorry, there's a problem loading the template.");
	},
	
	/*
	 * This boolean values defines if the templates loaded from files should be used (false)
	 * or the code in the text area (true)
	 */
	useCustomTemplate: false,
	
	renderTemplate : function(unescapedOutput) {
		this.set({
			currentCode : ""
		});
		
		// get template from text area if custom is chosen
		if (this.get('useCustomTemplate') == true) {
			this.set({
				currentTemplate : $('#customTemplateTextArea').val()
			});
		}
		
		try {
		
			this.set({
				currentCode : _.template(this.get('currentTemplate'), swfObjConf.toJSON())
			});
		} 
		catch (e) {
			this.set({
				currentCode : "Sorry, the template can't be filled with your form content.\nFor details have a look at the following error message from the template framework.\n:::\n" + e
			});				
		}
				
		if (unescapedOutput) {
			return this.get("currentCode");
		} else {
			return this.escape("currentCode");
		}
	}
});

window.template = new Template();