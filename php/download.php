<?php

if(empty($_POST['filename']) || empty($_POST['content'])){
	exit;
}

//$filename = preg_replace('/[^a-z0-9\-\_\.]/i','',$_POST['filename']);
$filename = preg_replace('/[^a-z0-9\-\_\.]/i','', "embed-swf.html");

header("Cache-Control: ");
header("Content-type: text/html");
header('Content-Disposition: attachment; filename="'.$filename.'"');

echo stripcslashes($_POST['content']);

?>