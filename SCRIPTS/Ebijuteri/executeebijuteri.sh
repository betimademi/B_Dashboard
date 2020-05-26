#!/bin/bash
rm oldebijuteri.xml
mv newebijuteri.xml oldebijuteri.xml
curl -L "http://www.ebijuteri.com/export.xml/307?showSpecial=true" -o newebijuteri.xml
php EbsimpleXMLemail.php
#php -q /home4/vegimbizati/bifeks.site/sync/modamos/MsimpleXMLemail.php