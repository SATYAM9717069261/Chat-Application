<?php

$file_name="shashwat.developer24@gmail.com12919873204777";
$path="Users\\shashwat.developer24@gmail.com12919873204777";

foreach (new DirectoryIterator($path) as $fileInfo) {
    if(!$fileInfo->isDot()) {
        unlink($fileInfo->getPathname());
    }
}
rmdir($path);
?>