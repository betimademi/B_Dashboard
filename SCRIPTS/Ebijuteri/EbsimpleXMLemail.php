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
$mail->Subject = 'EBIJUTERI UPDATE STOCK!';
$mail->isHTML(true);
$mail->Body = '<html><body><p><b>The EBIJUTERI STOCK HAS BEEN UPDATED</b></p><p><i>Please check the CSV file for details</i></p></body></html>';



$oldXml = simplexml_load_file('oldebijuteri.xml');
$query = array();
foreach ($oldXml->xpath('/Urunler/Urun') as $product) {
    $query[] = sprintf(
        '(product_id = %s and miktar != "%s")',
        $product->product_id,
        $product->miktar

    );
}
$query = implode('or', $query);

//$filename = 'stokfiles/EbijuteriStockUpdated'.date('d-h-i').'.csv';
$filename = 'stokfiles/EbijuteriStockUpdated.csv';
if (file_exists($filename)) {
$file = fopen($filename,'a');
}
else
{
  $file = fopen($filename,'a');
   fputcsv($file,array('product_id','stok_kodu','miktar'));
}
    $newxml = simplexml_load_file('newebijuteri.xml');
    foreach ($newxml->xpath(sprintf('/Urunler/Urun[%s]', $query)) as $product) {

       fputcsv($file,array($product->product_id,$product->stok_kodu,$product->miktar));
}

fclose($file);
 
$mail->AddAttachment($filename);

 

 if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    echo "SUCCESS";
}


?>