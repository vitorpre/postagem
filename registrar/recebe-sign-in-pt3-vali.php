<?php
ob_start();
session_name('login');
session_start('login');


require '../vendor/autoload.php';
require_once '../recursos/classes/Usuario.php';
require_once '../recursos/classes/UsuarioCRUD.php';

use sct\League\Summoner;
use LeagueWrap\Api;

require_once '../funcoes-gerais.php';

if (isset($_POST['conta'])) {
    $conta = $_POST['conta'];
}

$api = new Api();           // Load up the API

$summoner = $api->summoner();          // Load up the summoner request object.
$bakasan = $summoner->allinfo($conta);


$verificar = 0;

foreach ($bakasan->masteryPages as $key) {

    if ($key->name == "LOT") {
        $verificar = 1;
        echo "achou";
        break;
    }
}

if ($verificar == 1) {

    conectaBd();

    $crud = new UsuarioCRUD();
    echo $_SESSION['logtemp'];
    $crud->confirmarConta($_SESSION['logtemp'], $conta);

    fechaBd();
} else {

    echo "<script language='javaScript'>
    		
    		alert('Nenhuma masterie corresponde a LOT');
    		window.location.href='/Site/registrar/sign-in-pt3-vali.php';

    	</script>";
}
?>