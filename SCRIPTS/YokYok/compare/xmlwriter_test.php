<?php
$xml=new XMLWriter();
$xml->openMemory();
$xml->startDocument('1.0', 'UTF-8');
$xml->startElement('Urunler');


$xml->endElement();

//Then we close all elements and write the contents of the memory to a file called ‘articles.xml’.
file_put_contents('xmlwriter.xml', $xml->outputMemory());

//To flush a file and free memory you can use the following snippet and flush the XML that is in memory out to the file in order to free it.
//(Append to the file xmlwriter.xml and flush the used memory so far)

file_put_contents('xmlwriter.xml', $xml->flush(true), FILE_APPEND);

?>