
/* 
 * 
 * A model for the the configuration/settings of the swfobject
 * (Model)
 *  
 * 
 * Notes:
 * flashVars: {
 * 		name: value
 * }
 * 
 *  fVarsHelper: {
 * 		flashVar1 : {
 * 			name: value
 * 		}
 * }
 * 
 * 
 * 
 * Version 0.5
 * Copyright Florian Plag, www.video-flash.de, 2011
 * 
 * */


var testContent = {
	alternativeContent : "asdasdasdasd.",
	attributeAlign: "",
	attributeClass: "",
	attributeName: "",
	contentID : "dfdfdfdfdf",
	flashFile : "23123123.swf",
	fpVersionMajor : 12,
	fpVersionMinor : 0,
	fpVersionRelease : 0,
	dimensionWidth : 640,
	dimensionHeight : 480,
	dimensionUnit : "%",
	expressInstallSwfPath_enabled : false,
	expressInstallSwfPath : "expressInstall.swf",
	fVarsHelper : {
	},
	flashVars: {
	},
	params : {

		
		allownetworking: "internal",
		allowscriptaccess: "always"/*
		

		allowfullscreen: "",
		base: "",
		bgcolor: "#FFFFFF",
		devicefont: "",
		fullscreenonselection: "",
		menu: "",
		loop: "",
		play: "",
		quality: "",
		scale: "",
		salign: "",
		seamlesstabbing: "",
		swfliveconnect: ""  
		*/
			
	},
	swfObjectPath: "swfobject.js",
	swfObjectPath_useGoogle : false
}

var defaultContent = {
	alternativeContent : "Get <a href=\"http://www.adobe.com/go/getflash\">Adobe Flash Player</a>. Embedded with the help of <a href=\"http://embed-swf.org\">embed-swf.org</a>.",
	attributeAlign: "",
	attributeClass: "",
	attributeName: "",
	contentID : "flashContent",
	flashFile : "default.swf",
	fpVersionMajor : 9,
	fpVersionMinor : 0,
	fpVersionRelease : 0,
	dimensionWidth : 640,
	dimensionHeight : 480,
	dimensionUnit : "",
	expressInstallSwfPath_enabled : false,
	expressInstallSwfPath : "expressInstall.swf",
	fVarsHelper : {
	},
	flashVars: {
	},
	params : {
		bgcolor: "#FFFFFF"
		/*
		allownetworking: "",
		allowscriptaccess: "",
		allowfullscreen: "",
		base: "",
		bgcolor: "#FFFFFF",
		devicefont: "",
		fullscreenonselection: "",
		menu: "",
		loop: "",
		play: "",
		quality: "",
		scale: "",
		salign: "",
		seamlesstabbing: "",
		swfliveconnect: ""  
		*/
			
	},
	swfObjectPath: "swfobject.js",
	swfObjectPath_useGoogle : true,
	
	embedSwfInternals: {
		dataModelVersion: 0.5
	}
	
}


var SwfObjConf = Backbone.Model.extend({

	validate : function(attrs) {
		/*
		if (attrs.flashFile == "123") {
			console.log(this.get("flashFile"));
			this.trigger("change");
			return "validation error";
		}*/
	},
	
	initialize: function() {
		
		// if anything changes, persist the data
		this.bind('change', this.updateLocalStorage, this);
		
		this.initializeLocalStorage();

	},
	
	initializeLocalStorage: function() {
		
		if ( this.localStorage.find(this) != undefined) {
			this.attributes = this.localStorage.find(this);
		} else {
			this.localStorage.create (this);
		}
	},
	
	updateLocalStorage: function() {
		this.localStorage.update (this);
	},
	
	// setup default values
	defaults : defaultContent,
	
	id: "currentModel",
	localStorage: new Store("embedSwfLocalStorageV1"),
		
			
	/*
	 * transferFlashVars  <-> fVarsHelpers:
	 * These methods copy all entries from FlashVars <-> fVarsHelper
	 * (in order to synchronize both)
	 */
	transferFlashVarsToHelpers: function() {

		flashVars = this.get("flashVars");				
		var fVarsHelperNew = {};	
		var counter = 1;		
				
		for (var key in flashVars ) {
			var pair = {};
			pair[key] = flashVars[key];
			fVarsHelperNew["flashVar" + counter] = pair;
  		 	counter++;
		}
		swfObjConf.set({fVarsHelper: fVarsHelperNew});		
	},	
	
	transferHelpersToFlashVars: function() {
		
		var result = {};
		
		for (var key in this.get("fVarsHelper") ) {
			for (var fVar in this.get("fVarsHelper")[key] ) {
				var key2 = fVar;
				var value = (this.get("fVarsHelper")[key])[fVar];
				result[key2] = value;
			}
   	
		}
		this.set({flashVars: result});
		
	},
	
	/*
	 * Pass an object to this function, to fill the form wih new settings
	 */
	initWithNewContent: function(newAttributes) {
		localStorage.clear();
		this.set({ attributes: newAttributes });
		this.transferFlashVarsToHelpers();
		this.trigger("change");		
	},
	
	/*
	 * Recover the default settings of the form
	 */
	recoverDefaults: function() {
		this.initWithNewContent(defaultContent);
		console.log("recover defaults");
	
	},  
	
	/*
	 * Prepare the model before exporting it.
	 */
	updateForExport: function() {
		this.transferHelpersToFlashVars();
				
	},
	
	/*
	 * Force an update of the model so that the UI will also update
	 * (because changes in nested variable are not be recognized by the framework .. so you have to trigger this manually) 
	 */
	forceUpdate: function() {
		this.transferHelpersToFlashVars();
		this.trigger("change");		
	}
	
	

});

window.swfObjConf = new SwfObjConf();

