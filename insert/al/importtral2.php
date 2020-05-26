<?php


require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    

if (isset($_POST['add2'])){

       
        $turkish2 = $_POST['turkish2'];
        $albanian2 = $_POST['albanian2'];

    if ($turkish2 !== "" && $albanian2 !== "")
    {

       

if(file_exists('translate.xlsx')){

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("translate.xlsx");
    $spreadsheet->setActiveSheetIndex(0);
    $row = $spreadsheet->getActiveSheet()->getHighestRow('J')+1;
    $sheet = $spreadsheet -> getActiveSheet();
   
    $sheet -> setCellValue('J'.$row,$turkish2)
    	   -> setCellValue('K'.$row,$albanian2);      
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
$writer->save("translate.xlsx");
    header('location: tral.php');
}

else
{
    $spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet -> setCellValue('J1',$turkish2)
       -> setCellValue('K1',$albanian2);
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

   
    $turkish2 ="";
    $albanian2 = "";
}






?>

