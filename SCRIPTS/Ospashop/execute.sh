#!/bin/bash
rm oldospashop.xml
mv newospashop.xml oldospashop.xml
curl -L "http://ozpa.xmlbankasi.com/image/data/xml/bayiler365.xml" -o newospashop.xml &
wait
php TsimpleXMLemail.php
#php -q /home4/vegimbizati/bifeks.site/sync/modamos/MsimpleXMLemail.php