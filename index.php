<?php
ob_start();
session_name('login');
session_start('login');

header('Content-Type: text/html; charset=utf-8');
//require 'vendor/autoload.php';
//
//use zend\gdata;
//
//set_include_path(get_include_path() . PATH_SEPARATOR . "vendor/zend/gdata/library");
//
//Zend_Loader::loadClass('Zend_Gdata_Photos');
//Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
//Zend_Loader::loadClass('Zend_Gdata_AuthSub');
//
//$serviceName = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
//$user = "leagueoflot@gmail.com";
//$pass = "@Tordo123456";
//
//$client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $serviceName);
//$gp = new Zend_Gdata_Photos($client, "Google-DevelopersGuide-1.0");


// CRIAR ALBUM
//
//$entry = new Zend_Gdata_Photos_AlbumEntry();
//$entry->setTitle($gp->newTitle("teste"));
//$entry->setSummary($gp->newSummary("This is an album."));
//
//$createdEntry = $gp->insertAlbumEntry($entry);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <meta name="author" content="Untortle Press" /> 
        <meta name="copyright" content="© 2014 Untortle Press" />
        <meta name="description" content="League of Tatics tem como objetivo oferecer, como o próprio nome sugere, táticas para ser usadas no jogo League of Legends." />
        <meta name="keywords" content="league, tatics, lol, lot, taticas, legends" />
        <meta name="generator" content="Netbeans" />
        <meta name="revisit-after" content="30 days" />
        <meta name="rating" content="12 years" />
        <meta name="robots" content="index" />
        <title>Site</title>
        <?php
        echo "<div style='display: none;'>";
        require_once 'funcoes.php';
        require_once 'funcoes-gerais.php';
        echo "</div>";
        ?>
        <link href="recursos/pacotes/jquery-ui/css/Dot-Red-theme/jquery-ui-1.10.4.custom.css" rel="stylesheet">
        <script type="text/javascript" src="recursos/classes/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="recursos/pacotes/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
        <script type="text/javascript" src="script-principal.js"></script>
        <script src="recursos/pacotes/tinymce/js/tinymce/tinymce.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css-principal.css">
        <link rel="stylesheet" type="text/css" href="css-conteudo.css">

    </head>
    <body>
        <div id="pagina">
            <?php
//            try {
//                $userFeed = $gp->getUserFeed("default");
//                foreach ($userFeed as $userEntry) {
//                    echo $userEntry->title->text . "<br />\n";
//                }
//            } catch (Zend_Gdata_App_HttpException $e) {
//                echo "Error: " . $e->getMessage() . "<br />\n";
//                if ($e->getResponse() != null) {
//                    echo "Body: <br />\n" . $e->getResponse()->getBody() .
//                    "<br />\n";
//                }
//
//                // In new versions of Zend Framework, you also have the option
//                // to print out the request that was made.  As the request
//                // includes Auth credentials, it's not advised to print out
//                // this data unless doing debugging
//                // echo "Request: <br />\n" . $e->getRequest() . "<br />\n";
//            } catch (Zend_Gdata_App_Exception $e) {
//                echo "Error: " . $e->getMessage() . "<br />\n";
//            }
//
//            $query = $gp->newAlbumQuery();
//
//            $query->setUser("default");
//            $query->setAlbumName("teste");
//
//            $albumFeed = $gp->getAlbumFeed($query);
//            foreach ($albumFeed as $albumEntry) {
//                
//                echo "<br /><br><br>\n";
//                $camera = "";
//                $contentUrl = "";
//                $firstThumbnailUrl = "";
//
//                $albumId = $albumEntry->getGphotoAlbumId()->getText();
//                $photoId = $albumEntry->getGphotoId()->getText();
//
//                if ($albumEntry->getExifTags() != null &&
//                        $albumEntry->getExifTags()->getMake() != null &&
//                        $albumEntry->getExifTags()->getModel() != null) {
//
//                    $camera = $albumEntry->getExifTags()->getMake()->getText() . " " .
//                            $albumEntry->getExifTags()->getModel()->getText();
//                }
//
//                if ($albumEntry->getMediaGroup()->getContent() != null) {
//                    $mediaContentArray = $albumEntry->getMediaGroup()->getContent();
//                    $contentUrl = $mediaContentArray[0]->getUrl();
//                }
//
//                if ($albumEntry->getMediaGroup()->getThumbnail() != null) {
//                    $mediaThumbnailArray = $albumEntry->getMediaGroup()->getThumbnail();
//                    $firstThumbnailUrl = $mediaThumbnailArray[0]->getUrl();
//                }
//
//                echo "AlbumID: " . $albumId . "<br />\n";
//                echo "PhotoID: " . $photoId . "<br />\n";
//                echo "Camera: " . $camera . "<br />\n";
//                echo "Content URL: " . $contentUrl . "<br />\n";
//                echo "First Thumbnail: " . $firstThumbnailUrl . "<br />\n";
//
//                echo "<br />\n";
//            }
            ?>




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


<?php
/*
  $api = new Api();           // Load up the API


  $summoner = $api->summoner();          // Load up the summoner request object.
  $bakasan = $summoner->allinfo('presutti');



  $game = $api->league();
  echo "<br><br>";
  $liga = $game->league($bakasan, true);

  echo $liga[0]->tier ." ". $liga[0]->entries[0]->division;

  echo "<br><br>";

  foreach($bakasan->masteryPages as $key){

  echo $key->name . " ";

  }
  echo "<br><br>";

  echo $bakasan->leagues[0]->tier . " " . $bakasan->leagues[0]->entries[0]->division;

  echo "<br><br>";



  $presu = $bakasan->raw();
  print_r($presu);

 */








if (isset($_GET['minlimit'])) {

    $minlimit = $_GET['minlimit'];

    mostrar($minlimit);
} else {

    mostrar(null, null);
}
?>

        </div>

    </body>


</html>