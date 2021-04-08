<?php

$HSDB = require './lib/connect.php';

$id = filter_input(INPUT_POST, 'id');
$card = $HSDB->getCardById($id)[0];
$HSDB -> deleteCard($id);

unlink('./imgs/'.$card['img']);

header('Location: ./view_forged_in_the_barrens.php');

?>