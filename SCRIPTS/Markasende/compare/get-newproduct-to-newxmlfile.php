<?php  

$oldXml = new DOMDocument;
$oldXml->load('newmarkasende.xml');
$oldproductsarray = array();
foreach ($oldXml->getElementsByTagName('Product') as $product) {
     $productdata = array(
        'Id'=>(int)$product->getAttribute('Id')
        );
        $oldproductsarray[] = $productdata;
        
    
}
 //print_r($oldproductsarray);

$newXml = new DOMDocument;
$newXml->load('markasende.xml');
$xp = new DOMXPath($newXml);
$newproductsarray = array();
foreach ($newXml->getElementsByTagName('Product') as $productnew) {
    $oldproductsarray[] = (int)$productnew->getAttribute('Id');
  }
  

    $dstDom = new DOMDocument('1.0', 'utf-8');
     $dstDom->appendChild($dstDom->createElement('Products'));
    foreach ($oldXml->getElementsByTagName('Product') as $oldproduct) {

      $x = $oldproduct->getAttribute('Id');

      if(!(in_array($x, $oldproductsarray))) {

       //$t = $oldproduct->getElementsByTagName('UrunKartiID')->item(0)->nodeValue;
        //echo "'$t' is not in array";

      $dstDom->appendChild($dstDom->createElement('Porduct'));
      $dstDom->documentElement->appendChild($dstDom->importNode($oldproduct, true));
      $allEventsForUrun = $xp->query($oldproduct->getAttribute('Id')
    );
      foreach ($allEventsForUrun as $event) {
        // add event element tree to current destination document
        $dstDom->documentElement->appendChild($dstDom->importNode($event, true));
    }
    $dstDom->formatOutput = true;

     
}
$dstDom->save('newmarkesendeproducts25052019.xml', $oldproduct->getAttribute('Id'));

}

?>