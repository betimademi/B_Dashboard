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
$mail->Subject = 'SHEPINE UPDATE STOCK!';
$mail->isHTML(true);
$mail->Body = '<html><body><p><b>The SHEPINE STOCK HAS BEEN UPDATED</b></p><p><i>Please check the CSV file for details</i></p></body></html>';



$oldXml = simplexml_load_file('oldshepine.xml');
$query = array();
foreach ($oldXml->xpath('/products/product') as $product) {
    $query[] = sprintf(
        '(stock_code = "%s" and quantity != %s)',
        $product->stock_code,
        $product->quantity

    );
}
$query = implode('or', $query);

$filename = 'stokfiles/ShepineStockUpdated.csv';
if (file_exists($filename)) {
$file = fopen($filename,'a');
}
else
{
    $file = fopen($filename,'a');
 fputcsv($file,array('stock_code','brand code','quantity'));
}

    $newxml = simplexml_load_file('newshepine.xml');
    foreach ($newxml->xpath(sprintf('/products/product[%s]', $query)) as $product) {

       fputcsv($file,array($product->stock_code,$product->brand['code'],$product->quantity));
}

fclose($file);
 
 $mail->AddAttachment($filename);

 

  if (!$mail->send()) {
     echo "ERROR: " . $mail->ErrorInfo;
 } else {
     echo "SUCCESS";
 }


?>