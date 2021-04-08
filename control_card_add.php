<?php

require './lib/php-image-resize-master/lib/ImageResize.php';
require './lib/php-image-resize-master/lib/ImageResizeException.php';
$HSDB = require './lib/connect.php';

define('UPLOADS_DIR', './imgs/');
$file_path = UPLOADS_DIR.$_FILES['img']['name'];
$file_name = pathinfo($file_path, PATHINFO_FILENAME);

$file_type = mime_content_type($_FILES['img']['tmp_name']);

if ($file_type=='image/jpeg'||$file_type=='image/png'||$file_type=='image/gif') {
    // Original Version
    // move_uploaded_file($_FILES['img']['tmp_name'], $file_path);

    $resize_image = new \Gumlet\ImageResize($_FILES['img']['tmp_name']);

    // Resized Max Width 400px
    $medium_path = str_replace($file_name, $file_name, $file_path);
    $resize_image->resizeToWidth(300);
    $resize_image->save($medium_path);

    echo "UPLOADED SUCCESSFULLY.";

} else {
    echo "PLEASE UPLOAD AN IMAGE FILE.";
    exit();
}

$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$heroclass = filter_input(INPUT_POST, 'heroclass');
$imgName = $_FILES['img']['name'];
$rarity = filter_input(INPUT_POST, 'rarity');
$HSDB -> newCard($name, $description, $heroclass, $imgName, $rarity);

header('Location: ./view_forged_in_the_barrens.php');

?>