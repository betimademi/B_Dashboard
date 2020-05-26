<?php


require 'translate.php';
$body = "Fantazi/Kostümler";
$text["Fantazi/Kostümler"] = "Femër|Veshje per Femra|Të Brendshme|Fantazi|Fantazi Kostume|";
#$text1 = array("Fantazi/Kostümler"=>"Femër|Veshje per Femra|Të Brendshme|Fantazi|Fantazi Kostume|");
$str = preg_replace('~\h*\K.*\S~', '($0)', $body);

	foreach ($TreeTRAL as $key => $value) {
		
	    $placeholder = sprintf('(%s)', $key);

	    $body1    = str_replace($placeholder, $value, $str);

	    $array = array();

	   $array[] = $body1;
	
	 }
	 	print_r($array);
	
   	

