<?php

ob_start();
session_name('login');
session_start('login');

require_once '../funcoes-gerais.php';
require_once '../recursos/classes/Comentario.php';
require_once '../recursos/classes/ComentarioCRUD.php';
date_default_timezone_set("America/Sao_Paulo");

if (isset($_SESSION['vali'])) {

    if (isset($_POST['comentario'])) {


        $data = $data = date("Y-m-d H:i:s");
        $usuario = $_SESSION['login'];
        $conteudo = $_POST['comentario'];
        $codigo_post = $_POST['codigo_post'];



        $comentario = new Comentario();
        $comentario->construtorGravar($conteudo, $data, $usuario, $codigo_post);

        $crud = new ComentarioCRUD();

        conectaBd();

        $crud->salvar($comentario);

        fechaBd();

        echo "<script language='javaScript'>
    		
    		alert('Cadastrado');
    		window.location.href='/Site/postagens/mostrar-post.php?post=" . $codigo_post . "';

    	</script>";
    }
} else {

    echo "<script language='javaScript'>
    		
    		alert('Você precisa estar logado para comentar!');
    		window.location.href='/Site/postagens/mostrar-post.php?post=" . $_POST['codigo_post'] . "';

    	</script>";
};





