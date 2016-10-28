

$(document).ready(function() {




    $("#teste").click(function() {


        //$("#teste").css("background-color", "#0000ff", 500);

        $(this).effect("drop", 500);


    });




    $("#explodir").dblclick(function() {


        $(this).effect("explode", 700);

    });

   


    $(".input-sign-in").keyup(function() {


        var n = $(this).length;

        if (n > 3) {

            $(this).effect("explode", 700);

        }




    });

    $(".input-sign-in").keyup(function() {


        var n = $(this).length;

        if (n > 3) {

            $(this).effect("explode", 700);

        }




    });

    $("#nome-user").hover(function() {

        $(this).addClass("nome-selecionado");


    }, function() {

        $(this).removeClass("nome-selecionado");

    });


    $("#senha,#confirmar-senha").keyup(function() {

        $senha1 = $("#senha").val();
        $senha2 = $("#confirmar-senha").val();

        if (($senha1 == $senha2) && ($senha1.length > 5)) {


            $("#senha,#confirmar-senha").removeClass("glowing-border2");
            $("#senha,#confirmar-senha").addClass("glowing-border1");

        } else if ($senha1 != $senha2) {


            $("#senha,#confirmar-senha").removeClass("glowing-border1");
            $("#senha,#confirmar-senha").addClass("glowing-border2");

        }



    });



    $("input:submit").button();


    /*	
     
     $('label')
     .button()
     .css({
     'font' : 'inherit',
     'font-size' : '12px',
     'width' : '125px',
     'color' : 'white',
     'text-align' : 'left',
     'outline' : 'none',
     'background-color' : 'white',
     'cursor' : 'text'
     });
     
     */











});