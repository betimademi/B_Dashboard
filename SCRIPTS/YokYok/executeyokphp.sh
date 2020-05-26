#!/bin/bash
rm oldyok.xml 
mv newyok.xml oldyok.xml 
curl -L "http://yokyok.net/TicimaxXml/809472C2EC/" -o newyok.xml &
wait
php XMLPHP.php
#php -q /home4/vegimbizati/bifeks.site/sync/modamos/MsimpleXMLemail.php