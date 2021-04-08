<?php

$HSDB = require './lib/connect.php';

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$heroclass = filter_input(INPUT_POST, 'heroclass');
$imgName = filter_input(INPUT_POST, 'img');
$rarity = filter_input(INPUT_POST, 'rarity');
$HSDB -> updateCard($id, $name, $description, $heroclass, $imgName, $rarity);

header('Location: ./view_forged_in_the_barrens.php');

?>