<?php
$HSDB = require './lib/connect.php';

$heroClass = filter_input(INPUT_GET, 'HeroClass');
$sortBy = filter_input(INPUT_GET, 'SortBy');
$keyWords = filter_input(INPUT_GET, 'KeyWords');

$cards = $HSDB->getCardsByClass($heroClass, $sortBy, $keyWords);

$cardsJSON = json_encode($cards);

echo $cardsJSON;

?>