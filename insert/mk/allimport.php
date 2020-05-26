<?php
// header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
// header( 'Cache-Control: post-check=0, pre-check=0', false ); 
// header( 'Pragma: no-cache' ); 

require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    

if (isset($_POST['add1'])){

        $turkish = $_POST['turkish1'];
        $macedonian = $_POST['macedonian'];

        

    if ($turkish !== "" && $macedonian !== "")
    {

if(file_exists('translate.xlsx')){

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("translate.xlsx");
    $spreadsheet->setActiveSheetIndex(0);
    $row = $spreadsheet->getActiveSheet()->getHighestRow('A')+1;
    $sheet = $spreadsheet -> getActiveSheet();
    $sheet -> setCellValue('A'.$row,$turkish)
           -> setCellValue('B'.$row,$macedonian);
    
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
$writer->save("translate.xlsx");
    header('location: index.php');
}

else
{
    $spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1',$turkish);
$sheet->setCellValue('B1',$macedonian);

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

    $turkish ="";
    $macedonian = "";
   
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

