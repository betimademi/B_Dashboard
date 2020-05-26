#!/bin/bash
rm oldtwister.xml
mv newtwister.xml oldtwister.xml
curl -L "http://twister.com.tr/TicimaxXml/E967DD4841/" -o newtwister.xml &
wait
php TsimpleXMLemail.php
#php -q /home4/vegimbizati/bifeks.site/sync/modamos/MsimpleXMLemail.php