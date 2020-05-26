<?php

$dom = new DOMDocument();
    $dom->load("newfondi.xml");
    $dom->formatOutput = true;

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;
 $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile("translate.xlsx");
$reader->setReadDataOnly(true);
$excelObj= $reader->load("translate.xlsx");



$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();

$root = $dom->getElementsByTagName("Urun");
         foreach($root as $urun){
           
            $kategori = $urun->getElementsByTagName("Kategori");
           $kategoriTree = $urun->getElementsByTagName("KategoriTree");

           for ($row = 1; $row <= $lastRow; $row++) {


					$kategoriTree->item(0)->nodeValue = str_replace($worksheet->getCell('A'.$row)->getValue(),$worksheet->getCell('B'.$row)->getValue(),htmlspecialchars($kategoriTree->item(0)->nodeValue));
				}         		
          

      }

                 



		// echo "<table class=\"table table-sm\">";
		// for ($row = 1; $row <= $lastRow; $row++) {
		// 	 echo "<tr><td scope=\"row\">";
		// 	 echo $worksheet->getCell('A'.$row)->getValue();
		// 	 echo "</td><td>";
		// 	 echo $worksheet->getCell('B'.$row)->getValue();
		// 	 echo "</td><td>";
			 
		// }
		// echo "</table>";	
		$dom->save("testtesttest.xml");
?>