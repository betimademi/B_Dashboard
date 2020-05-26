<?php
$dom = new DOMDocument();
$dom->load('NEWproductsYOK27052019EN.xml');
$xpath = new DOMXPath($dom);



$nodeOne = $xpath->query('//Kategori'); 

$filename = 'kategori.csv';
$file = fopen($filename,'a');
fputs( $file, "\xEF\xBB\xBF" );
foreach ($nodeOne as $color) {
	# code...
	fputcsv($file,array($color->nodeValue));
}
fclose($file);

//$filename = 'color.csv';
//$file = fopen($filename,'a');
//foreach ($nodeOne as $color) {

//fputcsv($file,array($color->nodeValue);

//}
//fclose($file);


?>