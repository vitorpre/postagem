<?php

ob_start();
session_name('login');
session_start('login');



include '../recursos/pacotes/wideimage/WideImage.php';
include '../recursos/classes/Usuario.php';
include '../recursos/classes/UsuarioCRUD.php';

require_once '../funcoes-gerais.php';
//require_once 'redimensionar.php'; 

conectaBd();



$user1 = new usuario();
$vNome = $user1->setNome($_POST['nome']);
$user1->setSobrenome($_POST['sobrenome']);
$vDataNasc = $user1->setDataNasc($_POST['dt_nasc']);
$vEmail = $user1->setEmail($_POST['email']);
$vLogin = $user1->setLogin($_POST['login']);
$vSenha = $user1->setSenha(md5($_POST['senha']));
$vTipo = $user1->setTipo("4");
$foto = $_FILES['img'];



if (($vNome == true) && ($vDataNasc == true) && ($vEmail == true) && ($vLogin == true) && ($vSenha == true) && ($vTipo == true) && (!empty($foto["name"]))) {


    $crud = new UsuarioCRUD();
    $verificar = $crud->salvar($user1, $foto);

    if ($verificar != false) {

        $_SESSION['imgcrop'] = $verificar;
        $_SESSION['logtemp'] = $user1->getLogin();

        $url = sprintf('login=%s&codigo=%s', $user1->getLogin(), md5($user1->getEmail() . $user1->getLogin()));

        $mensagem = 'Para confirmar seu cadastro acesse o link:' . "\n";
        $mensagem .= sprintf('localhost' . '/Site/registrar/recebe-sign-in-pt4-valiemail.php?%s', $url);
        $headers = 'From: untortlepress@leagueoftatics.esy.es' . "\r\n" .
                'Reply-To: untortlepress@leagueoftatics.esy.es' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

        // enviar o email
        mail($user1->getEmail(), 'Confirmacao de cadastro', $mensagem, $headers);



        echo "<script language='javaScript'>
    		
    		
    		window.location.href='/Site/registrar/sign-in-pt2-cropimg.php';

    	</script>";
    } else {

        echo "<script language='javaScript'>
    		
    		window.location.href='/Site/registrar/sign-in.php';

    	</script>";
    }
} else {

    echo "<script language='javaScript'>
    		
    		alert('Dados incorretos');
    		window.location.href='/Site/registrar/sign-in.php';

    	</script>";
}






fechaBd();
?>