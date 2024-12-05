<?php
require_once 'vendor/autoload.php';
use PROYECTO\MYAPI\READ\Read;
$form = new Read('paginaods');
$form->listReflexion();
echo $form->getData();
?>