#!/bin/bash
rm oldmodamoss.xml
mv newmodamoss.xml oldmodamoss.xml
curl -L "http://www.modamoss.com/TicimaxXml/49694E7258/" -o newmodamoss.xml
php MsimpleXMLemail.php
#php -q /home4/vegimbizati/bifeks.site/sync/modamos/MsimpleXMLemail.php