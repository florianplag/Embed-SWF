/*
 * Version 0.5
 * Copyright Florian Plag, www.video-flash.de, 2011
 */
$(document).ready(function(){ 
   getVersion();    
   updateCurrentRuntimes();
});


function getVersion() {
   	var playerVersion = swfobject.getFlashPlayerVersion(); // returns a JavaScript object
   	console.log(playerVersion);
   	
   	var os = "";
   	if (swfobject.ua.mac == true) os = "Mac";
   	if (swfobject.ua.win == true) os = "Windows";
  	var majorVersion = playerVersion.major; // access the major, minor and release version numbers via their respective properties   
	updateFlashPlayerDisplay(majorVersion + "." + playerVersion.minor + "." + playerVersion.release, os);
}   

function updateFlashPlayerDisplay(fpVersionString, operatingSystem) {  
	var resultString;        
	resultString = fpVersionString;    
	if (operatingSystem != "") resultString += " on " + operatingSystem; 
	//resultString += " | Silverlight: " + PluginDetect.getVersion('Silverlight');
	//resultString += " | Java: " + PluginDetect.getVersion('Java'); 
	//resultString += " | QuickTime: " + PluginDetect.getVersion('QuickTime'); 
	document.getElementById('resultTxt').innerHTML =  resultString; 

}
    
    
                           
function updateCurrentRuntimes() {
		
	var uc = new CurrentPlayerVersions();
	
}

 window.CurrentPlayerVersions = Backbone.View.extend({   
 	
 	template: _.template("<tr><td><%= platform %></td><td><%= browser %></td><td><%= version %></td></tr>"),
 	
 	dataProvider: {},
 	
    initialize: function() {
    	this.loadTemplate("php/currentplayers.json");
    },
      
	loadTemplate : function(templUrl) {

		// fix the scope
		_.bindAll(this, "onLoaded");
		
		$.getJSON(templUrl, this.onLoaded);

	},
	onLoaded : function(data) {
		this.dataProvider = data;
		this.render();		
	},
    
    render: function() {
      for (var i=0; i < this.dataProvider.length; i++) {
             $("#playerVersionTable").append( this.template(this.dataProvider[i]) );
      };
      return this;
    }
 });
