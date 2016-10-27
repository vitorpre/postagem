<?php
ob_start();
session_name('login');
session_start('login');
require_once '../../funcoes-gerais.php';

if (isset($_SESSION['vali'])) {

    if (($_SESSION['vali'] == "c4ca4238a0b923820dcc509a6f75849b") || ($_SESSION['vali'] == "eccbc87e4b5ce2fe28308fd9f2a7baf3")) {
        ?>

        <html>
            <head>
                <title>Site</title>	
                <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
                <link href="/Site/recursos/pacotes/jquery-ui/css/Dot-Red-theme/jquery-ui-1.10.4.custom.css" rel="stylesheet">
                <script type="text/javascript" src="/Site/recursos/classes/jquery-2.1.0.min.js"></script>
                <script type="text/javascript" src="/Site/recursos/pacotes/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
                <script type="text/javascript" src="/Site/script-principal.js"></script>
                <link rel="stylesheet" type="text/css" href="/Site/css-principal.css">
                <link rel="stylesheet" type="text/css" href="/Site/css-conteudo.css">
                <script src="/Site/recursos/pacotes/tinymce/js/tinymce/tinymce.min.js"></script>


                <script>
                    tinymce.init({
                        selector: "textarea#txt",
                        theme: "modern",
                        width: 480,
                        height: 200,
                        plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table contextmenu directionality emoticons template paste textcolor"
                        ],
                        content_css: "css/content.css",
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                        style_formats: [
                            {title: 'Bold text', inline: 'b'},
                            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                            {title: 'Example 1', inline: 'span', classes: 'example1'},
                            {title: 'Example 2', inline: 'span', classes: 'example2'},
                            {title: 'Table styles'},
                            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                        ]
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





                        <div class="texto-conteudo" >
                            <form action="recebe-post.php" method="post">

                                <table>
                                    <tr><td>Título:</td> <td><input type="text" name="titulo"></td></tr>

                                </table>

                                <textarea  id ='txt' name="conteudo"></textarea>


                                <input type="submit" value="Enviar">


                            </form>

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