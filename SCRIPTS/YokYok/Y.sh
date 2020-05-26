#!/bin/bash
curl -L "http://yokyok.net/TicimaxXml/809472C2EC/" -o testttttt.xml &
wait
php  -q /srv/users/bifeks/apps/bifeks/public/SCRIPTS/YokYok/runscript.php
#php -q /home4/vegimbizati/bifeks.site/sync/modamos/MsimpleXMLemail.php