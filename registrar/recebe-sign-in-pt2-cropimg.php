<?php	
ob_start();
session_name('login');
session_start('login');

include '../recursos/pacotes/wideimage/WideImage.php';

$img = $_POST['img'];

$targ_w = $targ_h = 100;
$jpeg_quality = 90;


$src = "../recursos/imagens/users/" . $img;
$img_r = imagecreatefromjpeg($src);
$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );





imagecopyresampled($dst_r,$img_r,0,0,$_POST['x1'],$_POST['y1'],
    $targ_w,$targ_h,$_POST['w'],$_POST['h']);



imagejpeg($dst_r, $src, $jpeg_quality);

unset($_SESSION['imgcrop']);


echo "<script language='javaScript'>
    		
    		
    		window.location.href='/Site/registrar/sign-in-pt3-vali.php';

    	</script>";
