<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$img_url = "http://localhost/web_tests/img/user.png";
if ( isset($_GET['img_url'] ) ) {
  $img_url = $_GET["img_url"];
}
$resize_percent = "50";
if ( isset($_GET['resize_percent'] ) ) {
  $resize_percent = $_GET["resize_percent"];
}

$img = imagecreatefrompng($img_url);
$width = $resize_percent*imagesx($img)/100;
$height = $resize_percent*imagesy($img)/100;

$smallImg = imagecreatetruecolor( $width, $height );
imagealphablending($smallImg, false);
imagesavealpha($smallImg, true);
imagecopyresampled( $smallImg, $img, 0, 0, 0, 0, $width, $height, imagesx($img), imagesy($img) );

header('Content-type: image/png');
imagepng($smallImg);

imagedestroy($img);
imagedestroy($smallImg);
?>