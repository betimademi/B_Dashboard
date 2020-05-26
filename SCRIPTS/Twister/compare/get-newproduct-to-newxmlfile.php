<?php  

$oldXml = new DOMDocument;
$oldXml->load('newtwister.xml');
$oldproductsarray = array();
foreach ($oldXml->getElementsByTagName('Urun') as $product) {
     $productdata = array(
        'UrunKartiID'=>(int)$product->getElementsByTagName('UrunKartiID')->item(0)->nodeValue
        );
        $oldproductsarray[] = $productdata;
        
    
}
 //print_r($oldproductsarray);

$newXml = new DOMDocument;
$newXml->load('twister.xml');
$xp = new DOMXPath($newXml);
$newproductsarray = array();
foreach ($newXml->getElementsByTagName('Urun') as $productnew) {
    $newproductsarray[] = (int)$productnew->getElementsByTagName('UrunKartiID')->item(0)->nodeValue;
  }
  

    $dstDom = new DOMDocument('1.0', 'utf-8');
     $dstDom->appendChild($dstDom->createElement('Urunler'));
    foreach ($oldXml->getElementsByTagName('Urun') as $oldproduct) {

      $x = $oldproduct->getElementsByTagName('UrunKartiID')->item(0)->nodeValue;

      if(!(in_array($x, $newproductsarray))) {

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
$dstDom->save('newtwisterproducts.xml', $oldproduct->getElementsByTagName('UrunKartiID')->item(0)->nodeValue);

}

?>