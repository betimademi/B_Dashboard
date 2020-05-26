#!/bin/bash
rm oldfondi.xml
mv newfondi.xml oldfondi.xml
curl -L "http://bayi.ifondi.com/TicimaxXml/CBF3488EC1/" -o newfondi.xml
php FsimpleXMLemail.php
php FSCRIPT.php
#php -q /home4/vegimbizati/bifeks.site/sync/modamos/MsimpleXMLemail.php