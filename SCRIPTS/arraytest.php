<?php 

$prodnew = array(
  array(
    "ID" => "1",
    "stokCode" => "14A",
    "Barcode" => "1111",
    "Stok" =>"5"
  ),
  array(
    "ID" => "2",
    "stokCode" => "14B",
    "Barcode" => "1112",
    "Stok" =>"6"
  ),
  array(
   "ID" => "3",
    "stokCode" => "14C",
    "Barcode" => "1113",
    "Stok" =>"7"
  ),
  array(
   "ID" => "4",
    "stokCode" => "14E",
    "Barcode" => "1114",
    "Stok" =>"7"
  ),
  array(
   "ID" => "5",
    "stokCode" => "14D",
    "Barcode" => "1115",
    "Stok" =>"11"
  )
);

$prodold = array(
  
  array(
    "ID" => "2",
    "stokCode" => "14B",
    "Barcode" => "1112",
    "Stok" =>"5"
  ),
  array(
    "ID" => "1",
    "stokCode" => "14A",
    "Barcode" => "1111",
    "Stok" =>"4"
  ),
  array(
   "ID" => "3",
    "stokCode" => "14C",
    "Barcode" => "1113",
    "Stok" =>"8"
  )
);



 

  function arrdiff($a1, $a2) {
  $res = array();
  foreach($a2 as $a) if (array_search($a, $a1) === false) $res[] = $a;
  return $res;
  }
  $array = arrdiff($prodold, $prodnew);

 //print_r($array);
 
$intersect = array_uintersect($array, $prodold, 'compareID');
print_r($intersect);

function compareID($val1, $val2)
{
   return strcmp($val1['ID'], $val2['ID']);
}


    // foreach ($prodnew as $key => $mainData){
    //     foreach ($prodold as $subData){
    //         if($mainData['ID'] != $subData['ID']){
    //             unset($prodnew[$key]);
    //             break;
    //         }
    //     }
    // }

    // print_r($prodnew);


  ?>