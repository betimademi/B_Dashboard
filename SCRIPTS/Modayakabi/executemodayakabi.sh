#!/bin/bash
rm oldmodayakabi.xml
mv newmodayakabi.xml oldmodayakabi.xml
curl -L "http://www.modaayakkabi.com.tr/TicimaxXml/A472831C3A/" -o newmodayakabi.xml
php MosimpleXMLemail.php
#php -q /home4/vegimbizati/bifeks.site/sync/modamos/MsimpleXMLemail.php