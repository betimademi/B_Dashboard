<?php
$dom = new DOMDocument();
$dom->load('newrepoAL.xml');
$xpath = new DOMXPath($dom);

$nodeOne = $xpath->query('//category_path');

$filename = 'cat.csv';
$file = fopen($filename,'a');
 fputs( $file, "\xEF\xBB\xBF" );
 foreach ($nodeOne as $label) {

	fputcsv($file,array($label->nodeValue));
}

fclose($file);

// $nodeOne = $xpath->query('//Ozellik'); 
// $filename = 'color.csv';
// $file = fopen($filename,'a');
// fputs( $file, "\xEF\xBB\xBF" );
// foreach ($nodeOne as $color) {

// 	if($color->getAttribute("Tanim")==="Ngjyra"){
// 	# code...
// 	fputcsv($file,array($color->nodeValue));
// }
// }

// fclose($file);




?>