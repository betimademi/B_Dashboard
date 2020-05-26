<?php


require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    

if (isset($_POST['add1'])){

       
        $turkish = $_POST['turkish'];
        $english = $_POST['english'];

    if ($turkish !== "" && $english !== "")
    {

       

if(file_exists('translate.xlsx')){

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("translate.xlsx");
    $spreadsheet->setActiveSheetIndex(0);
    $row = $spreadsheet->getActiveSheet()->getHighestRow('O')+1;
    $sheet = $spreadsheet -> getActiveSheet();
   
    $sheet -> setCellValue('O'.$row,$turkish)
    	   -> setCellValue('P'.$row,$english);      
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
$writer->save("translate.xlsx");
    header('location: tren.php');
}

else
{
    $spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet -> setCellValue('O1',$turkish)
       -> setCellValue('P1',$english);
$writer = new Xlsx($spreadsheet);
$writer->save('translate.xlsx');
    header('location: tren.php');
}
}
else
{
    //print ("You're not a member of this site");
    header('location: tren.php');
}
}
else
{

   
    $turkish ="";
    $english = "";
}






?>

