<?php

session_start();


$num1=rand(1,9); //Generate First number between 1 and 9  
$num2=rand(1,9); //Generate Second number between 1 and 9  
$captcha_total=$num1+$num2;  

 
$math = "$num1"." + "."$num2"."=";  


$_SESSION['rand_code'] = $captcha_total;

$dir = 'fonts/';

$image = imagecreatetruecolor(75, 22); //Change the numbers to adjust the size of the image
$black = imagecolorallocate($image, 0, 0, 0);
$color = imagecolorallocate($image, 200, 100, 90);
$white = imagecolorallocate($image, 255, 255, 255);

imagefilledrectangle($image,0,0,399,99,$white);
imagettftext ($image, 11, 0, 11, 15, $color, $dir."georgia.ttf", $math );//Change the numbers to adjust the font-size

header("Content-type: image/png");
imagepng($image);

?>