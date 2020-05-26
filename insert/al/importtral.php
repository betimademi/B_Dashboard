<?php


require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    

if (isset($_POST['add1'])){

       
        $turkish = $_POST['turkish'];
        $albanian = $_POST['albanian'];

    if ($turkish !== "" && $albanian !== "")
    {

       

if(file_exists('translate.xlsx')){

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("translate.xlsx");
    $spreadsheet->setActiveSheetIndex(0);
    $row = $spreadsheet->getActiveSheet()->getHighestRow('H')+1;
    $sheet = $spreadsheet -> getActiveSheet();
   
    $sheet -> setCellValue('H'.$row,$turkish)
    	   -> setCellValue('I'.$row,$albanian);      
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
$writer->save("translate.xlsx");
    header('location: tral.php');
}

else
{
    $spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet -> setCellValue('H1',$turkish)
       -> setCellValue('I1',$albanian);
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

   
    $turkish ="";
    $albanian = "";
}






?>

