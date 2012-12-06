<?php
require 'core.inc.php';
header('Content-type: image/jpeg');
$text=$_SESSION['secure'];

$text_length=  strlen($text);

$text_size=30;

$image_height=  ImageFontHeight($text_size)+30;
$image_width= ImageFontWidth($text_size) * ($text_length+15);

$image=  imagecreate($image_width , $image_height);

imagecolorallocate($image, 255, 255, 255);
$text_color=  imagecolorallocate($image, 0, 0, 0);
//echo $text.' '.$text_color.' '.$text_length.' '.$text_size.'<br>';
//echo $image_height.'<br>'.$image_width.'<br>';

for($x=1;$x<=30;$x++)
{
    $x1=rand(1, 100);
    $y1=rand(1, 100);
    $x2=rand(1, 100);
    $y2=rand(1, 100);
    
    imageline($image,$x1,$y1,$x2,$y2,$text_color);
}
imagettftext($image, $text_size, 0, 15, 30, $text_color,'Ubuntu-B.ttf',$text);
imagejpeg($image);

?>
