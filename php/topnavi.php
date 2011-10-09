<?php 
	// HTML Code for highlighting the active tab
	$activeTabCode = "class=\"active\"";
?>
		
		<div class="topbar"  id="topbar">
			<div class="fill">
				<div class="container">
					<h3><a href="/">Embed SWF</a></h3>
					<ul class="nav">
						<li <?php if($pageId == 1) print_r($activeTabCode) ?>>
							<a href="/">Home</a>
						</li>
						<li <?php if($pageId == 2) print_r($activeTabCode) ?>>
							<a href="embed-swf.php">Configurator</a>
						</li>
						<li <?php if($pageId == 3) print_r($activeTabCode) ?>>
							<a href="flash-player-version.php">Flash Player Version</a>
						</li>	
						<li class="dropdown" data-dropdown="dropdown"  >
    						<a href="#" class="dropdown-toggle">More</a>
						    <ul class="dropdown-menu">
						      <li><a href="documentation.php">Documentation</a></li>
						      <li><a href="links-ressources.php">Links and Ressources</a></li>						      
						      <li class="divider"></li>
						      <li><a href="contact.php">Feedback</a></li>
						    </ul>					
					</ul>
					
				</div>
			</div>
		</div>