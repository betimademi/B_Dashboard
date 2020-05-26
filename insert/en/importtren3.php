<?php


require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    

if (isset($_POST['add3'])){

       
        $turkish3 = $_POST['turkish3'];
        $english3 = $_POST['english3'];

    if ($turkish3 !== "" && $english3 !== "")
    {

       

if(file_exists('translate.xlsx')){

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("translate.xlsx");
    $spreadsheet->setActiveSheetIndex(0);
    $row = $spreadsheet->getActiveSheet()->getHighestRow('S')+1;
    $sheet = $spreadsheet -> getActiveSheet();
   
    $sheet -> setCellValue('S'.$row,$turkish3)
    	   -> setCellValue('T'.$row,$english3);      
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
$writer->save("translate.xlsx");
    header('location: tren.php');
}

else
{
    $spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet -> setCellValue('S1',$turkish3)
       -> setCellValue('T1',$english3);
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

   
    $turkish3 ="";
    $english3 = "";
}






?>

