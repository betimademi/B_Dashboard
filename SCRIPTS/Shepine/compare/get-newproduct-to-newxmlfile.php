<?php  

$oldXml = new DOMDocument;
$oldXml->load('newshepine.xml');
$oldproductsarray = array();
foreach ($oldXml->getElementsByTagName('brand') as $product) {
     $productdata = array(
        'code'=>(int)$product->getAttribute('code')
        );
        $oldproductsarray[] = $productdata;
        
    
}
 //print_r($oldproductsarray);

$newXml = new DOMDocument;
$newXml->load('shepine.xml');
$xp = new DOMXPath($newXml);
$newproductsarray = array();
foreach ($newXml->getElementsByTagName('brand') as $productnew) {
    $oldproductsarray[] = (int)$productnew->getAttribute('code');
  }
  

    $dstDom = new DOMDocument('1.0', 'utf-8');
     $dstDom->appendChild($dstDom->createElement('products'));
    foreach ($oldXml->getElementsByTagName('brand') as $oldproduct) {

      $x = $oldproduct->getAttribute('code');

      if(!(in_array($x, $oldproductsarray))) {

       //$t = $oldproduct->getElementsByTagName('UrunKartiID')->item(0)->nodeValue;
        //echo "'$t' is not in array";

      $dstDom->appendChild($dstDom->createElement('brand'));
      $dstDom->documentElement->appendChild($dstDom->importNode($oldproduct, true));
      $allEventsForUrun = $xp->query($oldproduct->getAttribute('code')
    );
      foreach ($allEventsForUrun as $event) {
        // add event element tree to current destination document
        $dstDom->documentElement->appendChild($dstDom->importNode($event, true));
    }
    $dstDom->formatOutput = true;

     
}
$dstDom->save('newshepineproducts.xml', $oldproduct->getAttribute('code'));

}

?>