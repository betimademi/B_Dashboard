#!/bin/bash
rm oldrepo.xml
mv newrepo.xml oldrepo.xml
curl -L "https://www.repp.com.tr/xml/?R=1884&K=ecf0&Seo=1&Imgs=1&AltUrun=1" -o newrepo.xml &
wait
php TsimpleXMLemail.php
#php -q /home4/vegimbizati/bifeks.site/sync/modamos/MsimpleXMLemail.php