<?php

require 'vendor/autoload.php';
// $cacher = new Doctrine\Common\Cache\ArrayCache();
$cacher = new Doctrine\Common\Cache\FilesystemCache('/tmp');

$uploader = RemoteImageUploader\Factory::create('Picasa', array(
    'cacher'         => $cacher,
    'api_key'        => '147947488969-k6q4se3a1aj059go957mg0jj3ubs38l6.apps.googleusercontent.com',
    'api_secret'     => 'vpY9Y9xv_HqjlobDLVRktBjc',

    // if `album_id` is `null`, this script will automatic
    // create a new album for storage every 2000 photos
    // (due Google Picasa's limitation)
    'album_id'               => null,
    'auto_album_title'       => 'Auto Album %s',
    'auto_album_access'      => 'public',
    'auto_album_description' => 'Created by Remote Image Uploader',

    // if you have `refresh_token` you can set it here
    // to pass authorize action.
    'refresh_token' => null,
));

$callbackUrl = 'http'.(getenv('HTTPS') == 'on' ? 's' : '').'://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

$uploader->authorize($callbackUrl);

$url = $uploader->upload('src/quinn.jpg');
var_dump($url);

// http://dantri.vcmedia.vn/Uploaded/2011/04/08/9f5anh%205.JPG
$url = $uploader->transload('http://admiravelmundobobo.com//wp-content/uploads/2012/10/Nazar%C3%A9-Tedesco.jpg');
var_dump($url);
