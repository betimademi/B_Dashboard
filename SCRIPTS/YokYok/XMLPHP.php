<?php

 
//$countIx = 0;
 
$xml1 = new XMLReader();
$xml1->open('newyok.xml');
 
while($xml1->read() && $xml1->name != 'Urun')
{
  ;
}
 
while($xml1->name == 'Urun')
{
  $element = new SimpleXMLElement($xml1->readOuterXML());
  
  foreach ($element->UrunSecenek->Secenek as $secenek) {

  $prodnew[]= array(
    
    'VaryasyonID' => strval($secenek->VaryasyonID),
    'StokKodu' => strval($secenek->StokKodu),
    'StokAdedi' => strval($secenek->StokAdedi)
  );
}
  
   // print_r($prodnew);
   // print "\n";
  //$countIx++;
  
  $xml1->next('Urun');
  unset($element);
}

$xml2 = new XMLReader();
$xml2->open('oldyok.xml');
 
while($xml2->read() && $xml2->name != 'Urun')
{
  ;
}
 
while($xml2->name == 'Urun')
{
  $element1 = new SimpleXMLElement($xml2->readOuterXML());

  foreach ($element1->UrunSecenek->Secenek as $secenek1) {
  
  $prodold[] = array(
    
     'VaryasyonID' => strval($secenek1->VaryasyonID),
    'StokKodu' => strval($secenek1->StokKodu),
    'StokAdedi' => strval($secenek1->StokAdedi)
  );
}
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

  //************************** ***************************************
  //


 $filename = 'stokfiles/YokStockUpdate.csv';

 if(file_exists($filename)){

$fp = fopen($filename, 'a');
 
$i = 0;
foreach ($array as $fields) {
  
    fputcsv($fp, array_values($fields));
    $i++;
}

fclose($fp);
}
else{
  $fp = fopen($filename, 'a');
  fputs( $fp, "\xEF\xBB\xBF" );
 
$i = 0;
foreach ($array as $fields) {
if($i == 0){

        fputcsv($fp, array_keys($fields));
    }
    
    fputcsv($fp, array_values($fields));
    $i++;
}

fclose($fp);
}

// //print "Number of items=$countIx".'<br>';
// print "memory_get_usage() =" . memory_get_usage()/1024 . "kb\n".'<br>';
// print "memory_get_usage(true) =" . memory_get_usage(true)/1024 . "kb\n".'<br>';
// print "memory_get_peak_usage() =" . memory_get_peak_usage()/1024 . "kb\n".'<br>';
// print "memory_get_peak_usage(true) =" . memory_get_peak_usage(true)/1024 . "kb\n".'<br>';
 
// print "custom memory_get_process_usage() =" . memory_get_process_usage() . "kb\n".'<br>';
 
 

 
/**
 * Returns memory usage from /proc<PID>/status in kbytes.
 *
 * @return int|bool sum of VmRSS and VmSwap in kbytes. On error returns false.
 */
function memory_get_process_usage()
{
  $status = file_get_contents('/proc/' . getmypid() . '/status');
  
  $matchArr = array();
  preg_match_all('~^(VmRSS|VmSwap):\s*([0-9]+).*$~im', $status, $matchArr);
  
  if(!isset($matchArr[2][0]) || !isset($matchArr[2][1]))
  {
    return false;
  }
  
  return intval($matchArr[2][0]) + intval($matchArr[2][1]);
}


// *********************** DIFFERENCE BETWEEN TWO MULTIDIMENSIONAL ARRAYS *************************

// function array_diff_assoc_recursive($array1, $array2)
// {
//   foreach($array1 as $key => $value)
//   {
//     if(is_array($value))
//     {
//       if(!isset($array2[$key]))
//       {
//         $difference[$key] = $value;
//       }
//       elseif(!is_array($array2[$key]))
//       {
//         $difference[$key] = $value;
//       }
//       else
//       {
//         $new_diff = array_diff_assoc_recursive($value, $array2[$key]);
//         if($new_diff != FALSE)
//         {
//           $difference[$key] = $new_diff;
//         }
//       }
//     }
//     elseif(!isset($array2[$key]) || $array2[$key] != $value)
//     {
//       $difference[$key] = $value;
//     }
//   }
//   return !isset($difference) ? 0 : $difference;
// }

// print_r(array_diff_assoc_recursive($prod, $prod1));
?>