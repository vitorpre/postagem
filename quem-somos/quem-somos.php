<?php
ob_start();
session_name('login');
session_start('login');
echo "<div style='display: none;'>";
require_once '../funcoes-gerais.php';
echo "</div>";
?>

<html>
    <head>
        <title>League of Tatics</title>	
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />	
        <link href="/Site/recursos/pacotes/jquery-ui/css/Dot-Red-theme/jquery-ui-1.10.4.custom.css" rel="stylesheet">
        <script type="text/javascript" src="/Site/recursos/classes/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="/Site/recursos/pacotes/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" src="/Site/script-principal.js"></script>
        <script type="text/javascript" src="quem-somos-script.js"></script>
        <link rel="stylesheet" type="text/css" href="/Site/css-principal.css">
        <link rel="stylesheet" type="text/css" href="/Site/css-conteudo.css">
        <script src="/Site/recursos/pacotes/tinymce/js/tinymce/tinymce.min.js"></script>

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

            <div class="conteudo">

                <div class="texto-conteudo" >

                    <div class="fade">
                        <img class="imugi" src="/Site/recursos/imagens/we1.jpg" stretch/>
                        <div>
                            <img class="imugi" src="/Site/recursos/imagens/we2.jpg" stretch />
                        </div>
                    </div>


                    <div class="imugi"></div>

                </div>

            </div>

        </div>

    </body>


</html>