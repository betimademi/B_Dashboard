<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'betim.ademi@gmail.com';
$mail->Password = '1234Beto@';
$mail->setFrom('betim.ademi@gmail.com');
$mail->addAddress('info@bifeks.com');
$mail->Subject = 'MARKASENDE UPDATE STOCK!';
$mail->isHTML(true);
$mail->Body = '<html><body><p><b>The MARKASENDE STOCK HAS BEEN UPDATED</b></p><p><i>Please check the CSV file for details</i></p></body></html>';

$old = simplexml_load_file('oldmarkasende.xml');
$new = simplexml_load_file('newmarkasende.xml');


$prodnew = array();
foreach ($new->xpath("//Combination") as $newproduct) {

	$array = array('Id'=>(int)$newproduct['Id'],'Stock'=>(int)$newproduct['StockQuantity']);
	$prodnew[]=$array;
	}
	
	foreach ($old->xpath("//Combination") as $oldproduct) {

	$prodold[] = array('Id'=>(int)$oldproduct['Id'],'Stock'=>(int)$oldproduct['StockQuantity']);
	
	}

	function arrdiff($a1, $a2) {
  $res = array();
  foreach($a2 as $a) if (array_search($a, $a1) === false) $res[] = $a;
  return $res;
  }
  $array = arrdiff($prodold, $prodnew);


	$filename = 'stokfiles/MarkesendeStock.csv';
	if(empty($array)){

  echo "No stock updated";
 }
 else {

 if(file_exists($filename)){

$fp = fopen($filename, 'a');
 
$i = 0;
foreach ($array as $fields) {

    fputcsv($fp, array_values($fields));
    $i++;
}

fclose($fp);
}
else{
  $fp = fopen($filename, 'a');
  fputs( $fp, "\xEF\xBB\xBF" );
 
$i = 0;
foreach ($array as $fields) {
if($i == 0){
        fputcsv($fp, array_keys($fields));
    }
    fputcsv($fp, array_values($fields));
    $i++;
}

fclose($fp);
}
}

	$mail->AddAttachment($filename);

 if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    echo "SUCCESS";
}
 
?>