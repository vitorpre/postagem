<?php
ob_start();
session_name('login');
session_start('login');

if (isset($_SESSION['logtemp'])) {

    require_once '../funcoes-gerais.php';
    ?>

    <html>
        <head>
            <title>League of Tatics</title>	
            <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
            <link href="/Site/recursos/pacotes/jquery-ui/css/Dot-Red-theme/jquery-ui-1.10.4.custom.css" rel="stylesheet">
            <script type="text/javascript" src="/Site/recursos/classes/jquery-2.1.0.min.js"></script>
            <script type="text/javascript" src="/Site/recursos/pacotes/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
            <script type="text/javascript" src="/Site/script-principal.js"></script>
            <script type="text/javascript" src="script-registrar.js"></script>
            <link rel="stylesheet" type="text/css" href="/Site/css-principal.css">
            <link rel="stylesheet" type="text/css" href="/Site/css-conteudo.css">




            <script>

                $(document).ready(function() {

                    $("#progressbar").progressbar({
                        value: 75
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

                        <div id="progressbar"><div id="progresslabel">Etapa 3/4</div></div>
                        <br><br>


                        <form id="crop-img" action="recebe-sign-in-pt3-vali.php" method="post" enctype="multipart/form-data">

                            <p>Para linkar a sua conta do League of Legends ao site, é necessário 
                                fazer uma validação para saber se você realmente tem controle sobre a conta.
                                <br><i>(Nada de conta Challenger para você XD)</i>
                            </p>

                            <input type="text" name="conta"><input id="submit" type="submit" value="Verificar">
                            <p>Para realizar a verificação da conta, basta renomear uma de suas páginas de masteries para <i>LOT</i>. 
                                Após a verificação você poderá renomea-la normalmente. </p>


                            <p>Apenas será mostrado seu apelido do jogo, tier e divisão. 
                                Você pode optar por não linkar sua conta ou linká-la depois se preferir.

                            </p>


                            <input id="submit" type="button" value="Verificar depois" onclick="verificarDepois()"><br/>


                        </form>


                    </div>


                </div>


            </div>

        </body>


    </html>

    <?php
}
