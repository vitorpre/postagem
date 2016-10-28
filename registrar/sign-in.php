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
        <script type="text/javascript" src="/Site/recursos/classes/jquery.validate.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/Site/css-principal.css">
        <link rel="stylesheet" type="text/css" href="/Site/css-conteudo.css">


        <script>

            $(document).ready(function() {

                $("#form-sign-in").validate();

                $("#progressbar").progressbar({
                    value: 25
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

                    <div id="progressbar"><div id="progresslabel">Etapa 1/4</div></div>
                    <br><br>


                    <form id="form-sign-in" action="recebe-sign-in.php" method="post" enctype="multipart/form-data">


                        <div class='inputs2'>Nome: <input class="input-sign-in" type="text" name="nome" size="30px" maxlength="50" required aria-required="true"> </div> 
                        <div class='inputs2'>Sobrenome: <input class="input-sign-in" type="text" name="sobrenome"size="25px" maxlength="100" required="true"></div>
                        <div class='inputs2'>Data de Nascimento: <input class="input-sign-in" type="date" name="dt_nasc" maxlength="20" size="16" id="dt" required="true"></div>
                        <div class='inputs2'>Email: <input class="input-sign-in" type="email" name="email"size="30px" maxlength="100" id="email" required="true"></div>
                        <div class='inputs2'>Login: <input class="input-sign-in" type="text" name="login" size="30" minlength="5" maxlength="50" required="true"></div>
                        <div class='inputs2'>Senha: <input class="input-sign-in" type="password" name="senha" size="30" minlength="6" maxlength="30" id="senha" required="true"></div>
                        <div class='inputs2'>Confirmar senha: <input class="input-sign-in" type="password" name="senha2" minlength="6" maxlength="30" id="confirmar-senha" required="true"></div>
                        <div class='inputs2'>Imagem: <input type="file" name="img" id="img" required="true"></div>


                        <input id="submit" type="submit" value="Registrar"><br/>

                    </form>


                </div>


            </div>




        </div>

    </body>


</html>