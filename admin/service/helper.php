<?php

function compressImg($tempPath, $originalPath, $imageQuality)
{
    $imgInfo = getimagesize($tempPath);
    $mime = $imgInfo['mime'];

    // create new image from file
    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($tempPath);
            break;
        case 'image/png':
            $image = imagecreatefrompng($tempPath);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($tempPath);
            break;
        default:
            $image = imagecreatefromjpeg($tempPath);
    }

    imagejpeg($image, $originalPath, $imageQuality);

    // Return compressed image 
    return $originalPath;
}
