<?php


require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    

if (isset($_POST['add3'])){

       
        $turkish3 = $_POST['turkish3'];
        $albanian3 = $_POST['albanian3'];

    if ($turkish3 !== "" && $albanian3 !== "")
    {

       

if(file_exists('translate.xlsx')){

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("translate.xlsx");
    $spreadsheet->setActiveSheetIndex(0);
    $row = $spreadsheet->getActiveSheet()->getHighestRow('L')+1;
    $sheet = $spreadsheet -> getActiveSheet();
   
    $sheet -> setCellValue('L'.$row,$turkish3)
    	   -> setCellValue('M'.$row,$albanian3);      
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
$writer->save("translate.xlsx");
    header('location: tral.php');
}

else
{
    $spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet -> setCellValue('L1',$turkish3)
       -> setCellValue('M1',$albanian3);
$writer = new Xlsx($spreadsheet);
$writer->save('translate.xlsx');
    header('location: tral.php');
}
}
else
{
    //print ("You're not a member of this site");
    header('location: tral.php');
}
}
else
{

   
    $turkish3 ="";
    $albanian3 = "";
}






?>

