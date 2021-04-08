<?php

$HSDB = require './lib/connect.php';

$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$heroclass = filter_input(INPUT_POST, 'heroclass');
$imgName = filter_input(INPUT_POST, 'img');
$rarity = filter_input(INPUT_POST, 'rarity');
$HSDB -> newCard($name, $description, $heroclass, $imgName, $rarity);

header('Location: ./view_forged_in_the_barrens.php');

?>