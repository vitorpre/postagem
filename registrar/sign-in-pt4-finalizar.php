<?php
ob_start();
session_name('login');
session_start('login');
require_once '../funcoes-gerais.php';
?>

<html>
    <head>
        <title>League of Tatics</title>	
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <link href="/Site/recursos/pacotes/jquery-ui/css/Dot-Red-theme/jquery-ui-1.10.4.custom.css" rel="stylesheet">
        <script type="text/javascript" src="/Site/recursos/classes/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="/Site/recursos/pacotes/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" src="/Site/script.js"></script>
        <script type="text/javascript" src="/Site/script-principal.js"></script>
        <link rel="stylesheet" type="text/css" href="/Site/css-principal.css">
        <link rel="stylesheet" type="text/css" href="/Site/css-conteudo.css">


        <script>

            $(document).ready(function() {


                $("#progressbar").progressbar({
                    value: 100
                });


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

            <div class="conteudo">


                <div class="texto-conteudo">

                    <div id="progressbar"><div id="progresslabel">Etapa 4/4</div></div>
                    <br><br>

                    <center><span id="bemvindo">Bem Vindo!</span></center>
                    <img src="/Site/recursos/imagens/bemvindo-pixelart.png" title="Sprites feitas por http://eviscus.deviantart.com/">



                </div>


            </div>




        </div>

    </body>


</html>