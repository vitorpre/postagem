<?PHP
ob_start();
session_name('login');
session_start('login');

include '../funcoes.php';
include '../funcoes-gerais.php';




$login = $_SESSION['login'];

conectaBD();

$result = mysql_query("SELECT nome, sobrenome, foto, tipo FROM user WHERE login = '$login'");


if (mysql_num_rows($result) > 0) {
    // session_start inicia a sessão

    while ($row = mysql_fetch_array($result)) {

        
        $tipo = $row['tipo'];
        $nome = $row['nome'];
        $sobrenome = $row['sobrenome'];
        $foto = $row['foto'];
    }

    fechaBd();
    $_SESSION['nome'] = $nome;
    $_SESSION['sobrenome'] = $sobrenome;
    $_SESSION['foto'] = $foto;
    
    $_SESSION['login'] = $login;
    $_SESSION['vali'] = $tipo;
    
    

    echo "<script language='javaScript'>window.location.href='sign-in-pt4-finalizar.php'</script>";
}

//Caso contrário redireciona para a página de autenticação
else {
    //Destrói
    
    fechaBd();
    session_destroy();

    //Limpa
    unset($_SESSION['login']);
    unset($_SESSION['vali']);

    //Redireciona para a página de autenticação
    echo "<script language='javaScript'>
    		
    		alert('CRASH###');
    		window.location.href='index.php';

    	</script>";
}


?>