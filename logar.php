<?PHP
ob_start();
session_name('login');
session_start('login');

include 'funcoes.php';
include 'funcoes-gerais.php';

// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login-user'];
$senha = md5($_POST['senha-user']);


if ((preg_match("/^([a-zA-Z0-9]+)$/", $login)) && (preg_match("/^([a-zA-Z0-9]+)$/", $senha))) {
  


conectaBD();



$result = mysql_query("SELECT * FROM user WHERE login = '$login' AND senha = '$senha'");


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
    $_SESSION['vali'] = md5($tipo);

    echo "<script language='javaScript'>window.location.href='index.php'</script>";
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
    		
    		alert('Login ou senha incorretos');
    		window.location.href='index.php';

    	</script>";
}

}
else {
    echo '<script> alert("Login ou senha tem caracteres inválidos...");'
    . 'window.location.href=\'index.php\';</script>';
}
?>