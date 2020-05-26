<?php

$xml1 = new XMLReader();
$xml1->open('2457.xml');
 
while($xml1->read() && $xml1->name != 'Urun')
{
  ;
}
 
while($xml1->name == 'Urun')
{
  $element = new SimpleXMLElement($xml1->readOuterXML());
  
  $prodnew[]= array(
    
    'UrunKartiID' => strval($element->UrunKartiID)
  );

  
   // print_r($prodnew);
   // print "\n";
  //$countIx++;
  
  $xml1->next('Urun');
  unset($element);
}

$xml2 = new XMLReader();
$xml2->open('2310.xml');
 
while($xml2->read() && $xml2->name != 'Urun')
{
  ;
}
 
while($xml2->name == 'Urun')
{
  $element1 = new SimpleXMLElement($xml2->readOuterXML());
  
  $prodold[] = array(
    
     'UrunKartiID' => strval($element1->UrunKartiID)
  );

  // print_r($prodold);
  //  print "\n";

  $xml2->next('Urun');
  unset($element1);
}
    //**************** DIFF ARRAYYYYYY ******************************
$xml1->close();
$xml2->close();

function arrdiff($a1, $a2) {
  $res = array();
  foreach($a2 as $a) if (array_search($a, $a1) === false) $res[] = $a;
  return $res;
  }
  $array = arrdiff($prodold, $prodnew);

  //print_r($array);

$newXml = new DOMDocument;
$newXml->load('2457.xml');
$xp = new DOMXPath($newXml);
 

	 $dstDom = new DOMDocument('1.0', 'utf-8');
     $dstDom->appendChild($dstDom->createElement('Urunler'));

   foreach ($newXml->getElementsByTagName('Urun') as $newproduct) {

      $x = $newproduct->getElementsByTagName('UrunKartiID')->item(0)->nodeValue;
      
      if(in_array($x, array_column($array,'UrunKartiID'))) {
       
	  $dstDom->appendChild($dstDom->createElement('Urun'));
      $dstDom->documentElement->appendChild($dstDom->importNode($newproduct, true));
      $allEventsForUrun = $xp->query($newproduct->getElementsByTagName('UrunKartiID')->item(0)->nodeValue
    );
      foreach ($allEventsForUrun as $event) {
        // add event element tree to current destination document
        $dstDom->documentElement->appendChild($dstDom->importNode($event, true));
    }
    $dstDom->formatOutput = true;
}
$dstDom->save('today.xml', $newproduct->getElementsByTagName('UrunKartiID')->item(0)->nodeValue);

}



?>