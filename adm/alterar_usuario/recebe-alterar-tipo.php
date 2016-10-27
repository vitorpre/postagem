<?php

require_once '../../funcoes-gerais.php';
require_once 'funcoes-alterar-usuarios.php';
include_once "../../recursos/classes/Usuario.php";
include_once "../../recursos/classes/UsuarioCRUD.php";

$tipo = $_POST['tipo'];
$login = $_POST['login'];


if ((isset($tipo)) && (isset($login))) {

    if ($tipo == 'POSTER') {

        $tipo = "3";
    } else if ($tipo == 'USUARIO') {

        $tipo = "2";
    }

    $usuarioCRUD = new UsuarioCRUD();

    conectaBD();

    $usuarioCRUD->alterarTipo($login, $tipo);



    fechaBD();

    echo "<script language='javaScript'>

					alert('Usuário alterado!');
					window.location.href='/Site/adm/alterar_usuario/detalhes-usuario.php?login=" . $login . "';

				</script>";
}
?>