<?php

include '../../recursos/classes/Usuario.php';
include '../../recursos/classes/UsuarioCRUD.php';
include '../../funcoes-gerais.php';

conectaBd();

$login = $_GET['login'];

$userCrud = new UsuarioCRUD();
$userCrud->remover($login);

fechaBd();
?>