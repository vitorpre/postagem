<?php
ob_start();
session_name('login');
session_start('login');

require_once '../../funcoes-gerais.php';
require_once '../../recursos/classes/Post.php';
require_once '../../recursos/classes/PostCRUD.php';

$post = new Post();

if (isset($_POST['titulo']) && isset($_POST['conteudo'])) {

    date_default_timezone_set("America/Sao_Paulo");
    $data = date("Y-m-d H:i:s");
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $login = $_SESSION['login'];

    $post->constructSalvar($data, $titulo, $conteudo, $login);

    $postcrud = new PostCRUD();

    conectaBd();

    $sql = $postcrud->salvar($post);


    if ($sql == false) {

        echo "<script language='javaScript'>
        alert('Cadastro de post falhou');
        </script>";
    }

    fechaBd();

    echo "<script language='javaScript'>
    window.location.href='/Site/adm/postar/postar.php';
    </script>";
} else {

    echo "<script language='javaScript'>
    alert('Dados incorretos!');
    window.location.href='/Site/adm/postar/postar.php';
    </script>";
}
