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
$mail->Subject = 'iFONDI UPDATE STOCK!';
$mail->isHTML(true);
$mail->Body = '<html><body><p><b>The iFONDI STOCK HAS BEEN UPDATED</b></p><p><i>Please check the CSV file for details</i></p></body></html>';



$oldXml = simplexml_load_file('oldfondi.xml');
$query = array();
foreach ($oldXml->xpath('Urunler/Urun/UrunSecenek/Secenek') as $product) {
    $query[] = sprintf(
        '(VaryasyonID = %s and StokAdedi != "%s")',
        $product->VaryasyonID,
        $product->StokAdedi

    );
}
$query = implode('or', $query);

//$filename = 'stokfiles/iFondisStockUpdated'.date('d-h-i').'.csv';
$filename = 'stokfiles/iFondisStockUpdated.csv';

if (file_exists($filename)) {
$file = fopen($filename,'a');
}
else
{
  $file = fopen($filename,'a');
   fputcsv($file,array('VaryasyonID','Barkod','StokKodu','StokAdedi'));
}
  
    $newxml = simplexml_load_file('newfondi.xml');
    foreach ($newxml->xpath(sprintf('Urunler/Urun/UrunSecenek/Secenek[%s]', $query)) as $product) {

       fputcsv($file,array($product->VaryasyonID,$product->Barkod,$product->StokKodu,$product->StokAdedi));
}


fclose($file);


$mail->AddAttachment($filename);

 if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    echo "SUCCESS";
}


?>