/*
 * Version 0.5
 * Copyright Florian Plag, www.video-flash.de, 2011
 */
$(document).ready(function(){
	
	// Update the Flash Check Display
  	var os = "";
   	if (swfobject.ua.mac == true) os = "Mac";
   	if (swfobject.ua.win == true) os = "Windows";   	
	updateFlashPlayerDisplay(getFlashPlayerVersionDotNotation() , os);	
	 
	var runtimeTable = new CurrentPlayerVersions();
	 
});


function getVersion() {
   	
}   

/*
 * Just a helper to get x.x.x notation
 */
function getFlashPlayerVersionDotNotation() {
   	var playerVersion = swfobject.getFlashPlayerVersion(); // returns a JavaScript object	   	
	return playerVersion.major + "." + playerVersion.minor + "." + playerVersion.release
}


/*
 * Update the display
 */
function updateFlashPlayerDisplay(fpVersionString, operatingSystem) {  
	var resultString;        
	resultString = fpVersionString;    
	if (operatingSystem != "") resultString += " on " + operatingSystem; 
	//resultString += " | Silverlight: " + PluginDetect.getVersion('Silverlight');
	//resultString += " | Java: " + PluginDetect.getVersion('Java'); 
	//resultString += " | QuickTime: " + PluginDetect.getVersion('QuickTime'); 
	document.getElementById('resultTxt').innerHTML =  resultString; 

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
      
      // get the latest version (note: just checking against the first entry for all OS)
      var s = this.dataProvider[0].version;
      
      // compare latest with installed version
     if (s.indexOf(getFlashPlayerVersionDotNotation() ) != -1) {
     	
     	// player is up-to-date
		$(".alert-message").removeClass('info');
		$(".alert-message").addClass('success');
		$('.help-block:first').text('Seems like your Flash Player is up to date.'); 			
	 } else {
	 	// player is not up-to-date
		$(".alert-message").removeClass('info');
		$(".alert-message").addClass('error');	
		$('.help-block:first').text('Seems like your Flash Player is not up to date.'); 	
	 }
      
      return this;
    }
 });
