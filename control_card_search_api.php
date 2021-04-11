<?php
$HSDB = require './lib/connect.php';

$heroClass = filter_input(INPUT_GET, 'HeroClass', FILTER_VALIDATE_INT);
$sortBy = filter_input(INPUT_GET, 'SortBy', FILTER_SANITIZE_STRING);
$keyWords = filter_input(INPUT_GET, 'KeyWords', FILTER_SANITIZE_STRING);

$cards = $HSDB->getCardsByClass($heroClass, $sortBy, $keyWords);

$cardsJSON = json_encode($cards);

echo $cardsJSON;

?>