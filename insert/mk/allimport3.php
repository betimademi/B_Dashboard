<?php


require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    

if (isset($_POST['add3'])){

       
        $turkish3 = $_POST['turkish3'];
        $macedonian3 = $_POST['macedonian3'];

    if ($turkish3 !== "" && $macedonian3 !== "")
    {

       

if(file_exists('translate.xlsx')){

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("translate.xlsx");
    $spreadsheet->setActiveSheetIndex(0);
    $row = $spreadsheet->getActiveSheet()->getHighestRow('E')+1;
    $sheet = $spreadsheet -> getActiveSheet();
   
    $sheet -> setCellValue('E'.$row,$turkish3)
    	   -> setCellValue('F'.$row,$macedonian3);      
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
$writer->save("translate.xlsx");
    header('location: index.php');
}

else
{
    $spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet -> setCellValue('E1',$turkish3)
       -> setCellValue('F1',$macedonian3);
$writer = new Xlsx($spreadsheet);
$writer->save('translate.xlsx');
    header('location: index.php');
}
}
else
{
    //print ("You're not a member of this site");
    header('location: index.php');
}
}
else
{

   
    $turkish3 ="";
    $macedonian3 = "";
}



// $filename = 'test.csv';
//  if(file_exists($filename)){
// $fp = fopen($filename, 'a');
 
// $i = 0;
// foreach ($array as $fields) {
  
//     fputcsv($fp, array_values($fields));
//     $i++;
// }

// fclose($fp);
// }
// else{
//   $fp = fopen($filename, 'a');
//   fputs( $fp, "\xEF\xBB\xBF" );
 
// $i = 0;
// foreach ($array as $fields) {
// if($i == 0){

//         fputcsv($fp, array_keys($fields));
//     }
    
//     fputcsv($fp, array_values($fields));
//     $i++;
// }

// fclose($fp);
// }





?>

