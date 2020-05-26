<?php
$dom = new DOMDocument();
$dom->load('newrepo.xml');
$xpath = new DOMXPath($dom);

$nodeOne = $xpath->query('//type1');

$filename = 'renk.csv';
$file = fopen($filename,'a');
 fputs( $file, "\xEF\xBB\xBF" );
 foreach ($nodeOne as $label) {

	fputcsv($file,array($label->nodeValue));
}

fclose($file);

// $nodeOne = $xpath->query('//subCategory_id'); 
// $filename = 'subID.csv';
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