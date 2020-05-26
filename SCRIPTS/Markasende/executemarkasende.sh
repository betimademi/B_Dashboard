#!/bin/bash
rm oldmarkasende.xml
mv newmarkasende.xml oldmarkasende.xml
curl -L "http://www.markasende.com/FaprikaXml/KYGWEF/1/" -o newmarkasende.xml
php MasimpleXMLemail.php
#php -q /home4/vegimbizati/bifeks.site/sync/modamos/MsimpleXMLemail.php