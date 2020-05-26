<?php
require 'classtranslate.php';

$obj = new Button;

	$ebijuteri = 'https://www.ebijuteri.com/export.xml/307?showSpecial=true';
	$ifondi = 'https://bayi.ifondi.com/TicimaxXml/CBF3488EC1/';
	$repo = 'https://www.repp.com.tr/xml/?R=1884&K=ecf0&Seo=1&Imgs=1&AltUrun=1';
	$shepine = 'https://endolusu.com/integration/export/shepine/';
	$yokyok = 'https://yokyok.net/TicimaxXml/809472C2EC/';

if(isset($_POST['mymk']))
{
$obj->language="MK";
}
elseif(isset($_POST['mysq']))
{
$obj->language="SQ";
}

switch(true)
{
    case isset($_POST['ebijuteri']):
    	$obj->url=$ebijuteri;
		$obj->file_name='ebijuteri.xml';
		$obj->downloadxml();
    break;
    case isset($_POST['yokyok']):
    	$obj->url=$yokyok;
		$obj->file_name='yokyok.xml';
		$obj->downloadxml();
    break;
    case isset($_POST['ifondi']):
      	$obj->url=$ifondi;
		$obj->file_name='ifondi.xml';
		$obj->downloadxml();
    break;
    case isset($_POST['ospashop']):
      	$obj->url=$ospashop;
		$obj->file_name='ospashop.xml';
		$obj->downloadxml();
    break;
    case isset($_POST['repo']):
      	$obj->url=$repo;
		$obj->file_name='repo.xml';
		$obj->downloadxml();
    break;
    case isset($_POST['shepine']):
      	$obj->url=$shepine;
		$obj->file_name='shepine.xml';
		$obj->downloadxml();
    break;
}



?>
