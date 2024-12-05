<?php
require_once 'vendor/autoload.php';
use PROYECTO\MYAPI\CREATE\Create;
$form = new Create('paginaods');
$form->add(json_decode(file_get_contents('php://input'), true));
echo $form->getData();
?>