#!/bin/bash
rm oldshepine.xml
mv newshepine.xml oldshepine.xml
curl -L "http://endolusu.com/integration/export/shepine/" -o newshepine.xml
php ShsimpleXMLemail.php
#php -q /home4/vegimbizati/bifeks.site/sync/modamos/MsimpleXMLemail.php