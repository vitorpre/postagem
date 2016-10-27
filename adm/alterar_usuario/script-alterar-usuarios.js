


$(document).ready(function() {


    $(".editar").hover(function() {

        $(this).attr("src", "/Site/recursos/imagens/editar-2.png");

    }, function() {

        $(this).attr("src", "/Site/recursos/imagens/editar-1.png");

    });

    $(".editar").click(function() {

        var $tipo = $('#tipo').html();

        if ($tipo.charAt(0) != "<") {

            $('#tipo').empty();
            $('#tipo').append("<select name='tipo' size='1' value='ad' ><option value='" + $tipo + "'>Atual: " + $tipo + "<option value='POSTER'>POSTER<option value='USUARIO'>USUARIO</select>");

        } else {

            var $link = $(this).parent("a");
            $("form#formulario-tipo").submit();
            /*$link.attr("href", "/Site/adm/alterar_usuario/recebe-alterar-tipo.php?login=") */

        }


    });



});