


function criaMenu() {

    $("#menu").append("<a href='/Site/index.php'><div class='item-menu'>Home</div></a>");
    $("#menu").append("<a href='/Site/registrar/sign-in.php'><div class='item-menu'>Registrar-se</div></a>");
    $("#menu").append("<a href='/Site/quem-somos/quem-somos.php'><div class='item-menu'>Quem somos</div></a>");
    $("#menu").append("<div class='item-menu'>Onde</div>");


}
;

function criaBanner() {

    var x = Math.floor((Math.random() * 3) + 1);


    switch (x) {

        case 1:
            $("#logo").append('<img src="/Site/recursos/imagens/lente.jpg">');
            $("#logo").append('<img src="/Site/recursos/imagens/ban.jpg">');

            break;

        case 2:
            $("#logo").append('<img src="/Site/recursos/imagens/ban2-3.jpg">');
            $("#logo").append('<img src="/Site/recursos/imagens/ban2-1.jpg">');


            break;

        case 3:
            $("#logo").append('<img src="/Site/recursos/imagens/ban-caitlyn2.jpg">');
            $("#logo").append('<img src="/Site/recursos/imagens/ban-caitlyn1.jpg">');


            break;

        default:

            break;
    }



}

function deslogar(){
    
    window.location.href='/Site/deslogar.php';
}

$(document).ready(function() {



    // ##################### Label nome sobe e desce ao passar mouse ######################

    $(".label-user").hide();

    labeluser = function(fotouser) {
        var $filho = $(fotouser).children('.label-user');

        return $filho;
    };

    $('.foto-conteudo, #foto-user').hover(function() {



        labeluser(this).show("slide", {direction: "down"}, "fast");

    }, function() {

        labeluser(this).hide("slide", {direction: "down"}, "fast");

    });

    // #####################################################################################

    // ######################## classe do menu #############################################

    $(".item-menu").button();

    // #####################################################################################
    
    



});