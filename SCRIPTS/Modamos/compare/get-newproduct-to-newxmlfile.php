<?php  

$oldXml = new DOMDocument;
$oldXml->load('newmodamoss.xml');
$oldproductsarray = array();
foreach ($oldXml->getElementsByTagName('Urun') as $product) {
     $productdata = array(
        'UrunKartiID'=>(int)$product->getElementsByTagName('UrunKartiID')->item(0)->nodeValue
        );
        $oldproductsarray[] = $productdata;
        
    
}
 //print_r($oldproductsarray);

$newXml = new DOMDocument;
$newXml->load('modamoss.xml');
$xp = new DOMXPath($newXml);
$newproductsarray = array();
foreach ($newXml->getElementsByTagName('Urun') as $productnew) {
    $oldproductsarray[] = (int)$productnew->getElementsByTagName('UrunKartiID')->item(0)->nodeValue;
  }
  

    $dstDom = new DOMDocument('1.0', 'utf-8');
     $dstDom->appendChild($dstDom->createElement('Urunler'));
    foreach ($oldXml->getElementsByTagName('Urun') as $oldproduct) {

      $x = $oldproduct->getElementsByTagName('UrunKartiID')->item(0)->nodeValue;

      if(!(in_array($x, $oldproductsarray))) {

       //$t = $oldproduct->getElementsByTagName('UrunKartiID')->item(0)->nodeValue;
        //echo "'$t' is not in array";

      $dstDom->appendChild($dstDom->createElement('Urun'));
      $dstDom->documentElement->appendChild($dstDom->importNode($oldproduct, true));
      $allEventsForUrun = $xp->query($oldproduct->getElementsByTagName('UrunKartiID')->item(0)->nodeValue
    );
      foreach ($allEventsForUrun as $event) {
        // add event element tree to current destination document
        $dstDom->documentElement->appendChild($dstDom->importNode($event, true));
    }
    $dstDom->formatOutput = true;

     
}
$dstDom->save('newproducts1.xml', $oldproduct->getElementsByTagName('UrunKartiID')->item(0)->nodeValue);

}

?>