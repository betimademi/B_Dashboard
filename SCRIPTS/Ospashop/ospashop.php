<?php
 
    $dom = new DOMDocument();
    $dom->load("newospashop1.xml");
    $dom->formatOutput = true;

    require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;
 $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile("subcategori.xlsx");
$reader->setReadDataOnly(true);
$excelObj= $reader->load("subcategori.xlsx");


$worksheet = $excelObj->getSheet(0);
        $lastRow = $worksheet->getHighestRow();

$root = $dom->getElementsByTagName("Product");
         foreach($root as $urun){
           
           $subkategori = $urun->getElementsByTagName("subCategory_id");

           for ($row = 0; $row <= $lastRow; $row++) {


                    $subkategori->item(0)->nodeValue = str_replace($worksheet->getCell('A'.$row)->getValue(),$worksheet->getCell('B'.$row)->getValue(),htmlspecialchars($subkategori->item(0)->nodeValue));
                }               
          
      }

      $dom->save("newospashop1.xml");
        
?>