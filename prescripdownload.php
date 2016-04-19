<?php

    $filename = $_GET["name"];
	$contenttype = "application/force-download";	
	header("Content-Type: " . $contenttype);
	header("Content-Disposition: attachment; filename=\"" . basename($filename) . "\";");


    readfile('C:\\wamp\\www\\droid\\prescrips\\'.$filename); //showing the path to the server where the file is to be download
    exit;
?>