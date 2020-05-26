<?php
$dom = new DOMDocument();
$dom->load('newospashopMK.xml');
$xpath = new DOMXPath($dom);

// $nodeOne = $xpath->query('//subCategory_id');

// $filename = 'subcategoriID.csv';
// $file = fopen($filename,'a');
//  fputs( $file, "\xEF\xBB\xBF" );
//  foreach ($nodeOne as $label) {

// 	fputcsv($file,array($label->nodeValue));
// }

// fclose($file);

$nodeOne = $xpath->query('//spec'); 
$filename = 'color.csv';
$file = fopen($filename,'a');
fputs( $file, "\xEF\xBB\xBF" );
foreach ($nodeOne as $color) {

	if($color->getAttribute("name")==="Color"){
	# code...
	fputcsv($file,array($color->nodeValue));
}
}

fclose($file);




?>