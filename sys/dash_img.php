<?php
$root = '';
$path = 'images/covers/';
 
function getImagesFromDir($path) {
    $images = array();
    if ( $img_dir = @opendir($path) ) {
        while ( false !== ($img_file = readdir($img_dir)) ) {
            
            if ( preg_match("/(\.gif|\.jpg|\.png)$/", $img_file) ) {
                $images[] = $img_file;
            }
        }
        closedir($img_dir);
    }
    return $images;
}

function getRandomFromArray($ar) {
    mt_srand( (double)microtime() * 1000000 ); 
    $num = array_rand($ar);
    return $ar[$num];
}

$imgList = getImagesFromDir($root . $path);

$img1 = getRandomFromArray($imgList);
$img2 = getRandomFromArray($imgList);
$img3 = getRandomFromArray($imgList);
$img4 = getRandomFromArray($imgList);

?>