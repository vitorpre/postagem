<?php
ob_start();
session_name('login');
session_start('login');

if (isset($_SESSION['imgcrop'])) {

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
            <link rel="stylesheet" href="/Site/recursos/pacotes/tapmodo-Jcrop-1902fbc/css/jquery.Jcrop.css" type="text/css" />
            <script src="/Site/recursos/pacotes/tapmodo-Jcrop-1902fbc/js/jquery.Jcrop.js"></script>



            <script>

                $(document).ready(function() {



                    $("#progressbar").progressbar({
                        value: 50
                    });



                    jQuery(function($) {

                        // Create variables (in this scope) to hold the API and image size
                        var jcrop_api,
                                boundx,
                                boundy,
                                // Grab some information about the preview pane
                                $preview = $('#preview-pane'),
                                $pcnt = $('#preview-pane .preview-container'),
                                $pimg = $('#preview-pane .preview-container img'),
                                xsize = $pcnt.width(),
                                ysize = $pcnt.height();

                        console.log('init', [xsize, ysize]);
                        $('#target').Jcrop({
                            onChange: updatePreview,
                            onSelect: updatePreview,
                            aspectRatio: 1
                        }, function() {
                            // Use the API to get the real image size
                            var bounds = this.getBounds();
                            boundx = bounds[0];
                            boundy = bounds[1];
                            // Store the API in the jcrop_api variable
                            jcrop_api = this;

                            // Move the preview into the jcrop container for css positioning
                            $preview.appendTo(jcrop_api.ui.holder);
                        });

                        function updatePreview(c)
                        {
                            if (parseInt(c.w) > 0)
                            {
                                var rx = xsize / c.w;
                                var ry = ysize / c.h;

                                $pimg.css({
                                    width: Math.round(rx * boundx) + 'px',
                                    height: Math.round(ry * boundy) + 'px',
                                    marginLeft: '-' + Math.round(rx * c.x) + 'px',
                                    marginTop: '-' + Math.round(ry * c.y) + 'px'
                                });


                            }

                            showCoords(c);
                        }
                        ;

                    });

                    function showCoords(c)
                    {
                        $('#x1').val(c.x);
                        $('#y1').val(c.y);
                        $('#x2').val(c.x2);
                        $('#y2').val(c.y2);
                        $('#w').val(c.w);
                        $('#h').val(c.h);
                    }
                    ;





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

                        <div id="progressbar"><div id="progresslabel">Etapa 2/4</div></div>
                        <br><br>


                        <form id="crop-img" action="recebe-sign-in-pt2-cropimg.php" method="post" enctype="multipart/form-data">


                            <input type="hidden" name="x1" id="x1">
                            <input type="hidden" name="y1" id="y1">
                            <input type="hidden" name="w" id="w">
                            <input type="hidden" name="h" id="h">
                            <input type="hidden" name="img" value="<?php echo $_SESSION['imgcrop']; ?>">



                            <img <?php echo "src='/Site/recursos/imagens/users/" . $_SESSION['imgcrop'] . "'"; ?> id="target">

                            <div id="preview-pane">
                                Preview
                                <div class="preview-container">
                                    <img <?php echo "src='/Site/recursos/imagens/users/" . $_SESSION['imgcrop'] . "'"; ?> class="jcrop-preview" alt="Preview" />

                                </div>

                            </div>

                            <br/><input id="submit" type="submit" value="Cortar"><input type="button" name="manter" value="Manter tamanho original" onclick="manterTamanho()" />

                        </form>

                    </div>


                </div>


            </div>

        </body>


    </html>

    <?php
}
