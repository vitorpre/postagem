<?php
ob_start();
session_name('login');
session_start('login');

echo "<div style='display : none'>";
require_once '../../funcoes-gerais.php';
require_once 'funcoes-alterar-usuarios.php';
echo "</div>";

if (isset($_SESSION['vali'])) {

    if (($_SESSION['vali'] == "c4ca4238a0b923820dcc509a6f75849b") || ($_SESSION['vali'] == "eccbc87e4b5ce2fe28308fd9f2a7baf3")) {
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
                <script type="text/javascript" src="script-alterar-usuarios.js"></script>


                <link rel="stylesheet" type="text/css" href="/Site/css-principal.css">
                <link rel="stylesheet" type="text/css" href="/Site/css-conteudo.css">

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
                        widgetLogin()
                        ?>

                    </div>




                    <div class="conteudo">





                        <div class="texto-conteudo" >

                            <h2>Detalhes </h2>


                            <?php
                            $login = $_GET["login"];

                            datalhesUsuario($login);
                            ?>



                        </div>




                    </div>











                </div>

            </body>


        </html>


        <?php
    } else {

        header("Location: index.php");
    }
} else {

    header("Location: index.php");
}
?>