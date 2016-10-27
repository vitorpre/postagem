<?php
ob_start();
session_name('login');
session_start('login');
?>

<html>
    <head>
        <?php
        echo "<div style='display: none;'>";
        require_once '../funcoes.php';
        require_once '../funcoes-gerais.php';
        require_once '../recursos/classes/Post.php';
        require_once '../recursos/classes/PostCRUD.php';


        echo "</div>";
        ?>
        <title>League of Tatics</title>	
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <link href="/Site/recursos/pacotes/jquery-ui/css/Dot-Red-theme/jquery-ui-1.10.4.custom.css" rel="stylesheet">
        <script type="text/javascript" src="/Site/recursos/classes/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="/Site/recursos/pacotes/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" src="/Site/script.js"></script>
        <script type="text/javascript" src="/Site/script-principal.js"></script>
        <script src="/Site/recursos/pacotes/tinymce/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="/Site/recursos/classes/jquery.validate.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/Site/css-principal.css">
        <link rel="stylesheet" type="text/css" href="/Site/css-comentario.css">
        <link rel="stylesheet" type="text/css" href="/Site/css-conteudo.css">

        <script>

            $(document).ready(function() {

                $("#form-comentario").validate();


            });


        </script>

    </head>
    <body>
        <div id="pagina">


            <div id="logo">

                <script>criaBanner();</script>

            </div>

            <div id="menu">

                <script>criaMenu();</script>


            </div>

            <div id="widgets">

                <?php
                widgetLogin();
                ?>


            </div>


            <?php
            $post = new Post();

            $postCRUD = new PostCRUD();

            $codigo = $_GET['post'];

            $conexao = conectaBd();

            $post = $postCRUD->Buscar($codigo, $conexao);

            FechaBd();

            $post->mostrarPost($codigo);
            ?>

        </div>

    </body>


</html>