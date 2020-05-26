<html>
<head>
    <title>Feed</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
<div class="container-fluid">
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>Status</th>
            <th>ID</th>
        </tr>

<?php
$xml1 = new XMLReader();
$xml1->open('oldyok.xml');
 
while($xml1->read() && $xml1->name != 'Urun')
{
  ;
}
 
while($xml1->name == 'Urun')
{
  $element = new SimpleXMLElement($xml1->readOuterXML());
  
  $prodold[]= array(
    
    'UrunKartiID' => strval($element->UrunKartiID),
   // 'UrunAdi' => strval($element->UrunAdi)
  );
  
  $xml1->next('Urun');
  unset($element);
}


$xml2 = new XMLReader();
$xml2->open('newyok.xml');
 
while($xml2->read() && $xml2->name != 'Urun')
{
  ;
}
 
while($xml2->name == 'Urun')
{
  $element1 = new SimpleXMLElement($xml2->readOuterXML());

  $prodnew[]= array(
    
    'UrunKartiID' => strval($element1->UrunKartiID),
    //'UrunAdi' => strval($element1->UrunAdi)
  );
  
  $xml2->next('Urun');
  unset($element1);
}


    function arrdiff($a1, $a2) {
  $res = array();
  foreach($a2 as $a) if (array_search($a, $a1) === false) $res[] = $a;
  return $res;
  }
  $array = arrdiff($prodnew, $prodold);

  foreach ($array as $fields) {

        echo '<tr class="danger">';
                    echo '<td>Out of stock</td>';
                    echo '<td>'.array_values($fields).'</td>';
                    echo '</tr>';
                    
     }
 
 
            //End the loop

            //  foreach($newxml->xpath('Urunler/Urun') as $newproduct){
            //     ob_start();
            //     //Add the current product's Id to $y
            //     $y = $newproduct->UrunKartiID;
            //     //Test to see if the current product's Id is in the array of old products
            //     //if it is not it must be back in stock
            //     if(!(in_array($y, $oldproductsarray))) {
            //         echo '<tr class="success">';
            //         echo '<td>In stock</td>';
            //         echo '<td>' . $newproduct->UrunAdi . '</td>';
            //         echo '<td>' . $newproduct->UrunKartiID . '</td>';
            //         echo '</tr>';
                    
            //     }
            //     echo ob_get_contents();
            //     ob_end_flush();
            // }

            // unset($newproduct);//End loop

?>