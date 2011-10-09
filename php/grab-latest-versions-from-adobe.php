<!-- version 0.5 -->
<?php        
require_once('simplehtmldom_1_5/simple_html_dom.php');       
$html = file_get_html('http://www.adobe.com/software/flash/about/');

// get the content from the html table       
$gc =  $html->find('td');    

// saving the result
$result = array();  

for ($i = 0; $i < 8; $i++) { 
	// get row 1,2,3          	
	array_push($result, array("platform" => $gc[$i*3 + 0]->plaintext, "browser" => $gc[$i*3 + 1]->plaintext, "version" => $gc[$i*3 + 2]->plaintext));
}

$myFile = "currentplayers.json";
$fh = fopen($myFile, 'w') or die("can't open file");
fwrite($fh, json_encode($result));
fclose($fh);



?>