<?php


require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    

if (isset($_POST['add2'])){

       
        $turkish2 = $_POST['turkish2'];
        $english2 = $_POST['english2'];

    if ($turkish2 !== "" && $english2 !== "")
    {

       

if(file_exists('translate.xlsx')){

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("translate.xlsx");
    $spreadsheet->setActiveSheetIndex(0);
    $row = $spreadsheet->getActiveSheet()->getHighestRow('Q')+1;
    $sheet = $spreadsheet -> getActiveSheet();
   
    $sheet -> setCellValue('Q'.$row,$turkish2)
    	   -> setCellValue('R'.$row,$english2);      
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
$writer->save("translate.xlsx");
    header('location: tren.php');
}

else
{
    $spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet -> setCellValue('Q1',$turkish2)
       -> setCellValue('R1',$english2);
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

   
    $turkish2 ="";
    $english2 = "";
}






?>

