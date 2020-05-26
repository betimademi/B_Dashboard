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
$mail->Subject = 'YOKYOK UPDATE STOCK!';
$mail->isHTML(true);
$mail->Body = '<html><body><p><b>The YOKYOK STOCK HAS BEEN UPDATED</b></p><p><i>Please check the CSV file for details</i></p></body></html>';



$oldXml = simplexml_load_file('oldyok.xml');
$query = array();
foreach ($oldXml->xpath('Urunler/Urun/UrunSecenek/Secenek') as $product) {
    $query[] = sprintf(
        '(VaryasyonID = %s and StokAdedi != "%s")',
        $product->VaryasyonID,
        $product->StokAdedi

    );
}
$query = implode('or', $query);

$filename = 'stokfiles/YoksStockUpdated.csv';
if (file_exists($filename)) {
$file = fopen($filename,'a');
}
else
{
  //$bom = chr(0xEF) . chr(0xBB) . chr(0xBF);
  $file = fopen($filename,'a');
  
   fputcsv($file,array('VaryasyonID','StokKodu','StokAdedi'));
}
        
    $newxml = simplexml_load_file('newyok.xml');
    foreach ($newxml->xpath(sprintf('Urunler/Urun/UrunSecenek/Secenek[%s]', $query)) as $product) {

       fputcsv($file,array($product->VaryasyonID,$product->StokKodu,$product->StokAdedi));

}

  unset($product);

fclose($file);
 
 $mail->AddAttachment($filename);

 if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    echo "SUCCESS";
}

//echo memory_get_peak_usage();

       //   ***************** THIS IS BASED WITH DOM PHP ***************


// $oldXml = new DOMDocument;             
// $oldXml->load('translate.xml');
// $query = array();
// foreach ($oldXml->getElementsByTagName('Urun') as $product) {
//     $query[] = sprintf(
//         '(UrunKartiID != %s)',
//         $product->getElementsByTagName('UrunKartiID')->item(0)->nodeValue
//     );
// }
// $query = implode('or', $query);

// $newXml = new DOMDocument;
// $newXml->load('translate1.xml');
// $xp = new DOMXPath($newXml);
// foreach ($xp->query(sprintf('/Urunler/Urun[%s]', $query)) as $product) {
//     echo $newXml->saveXml($product);
// }

?>