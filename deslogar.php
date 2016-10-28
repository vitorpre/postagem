<?PHP
ob_start();
session_name('login');
session_start('login');



    unset($_SESSION['nome']);
    unset($_SESSION['sobrenome']);
    unset($_SESSION['foto']);
    
    unset($_SESSION['login']);
    unset($_SESSION['vali']);

    echo "<script language='javaScript'>window.location.href='index.php'</script>";
