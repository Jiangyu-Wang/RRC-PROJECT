<?php

$HSDB = require './lib/connect.php';

$idOptions = array('options'=>array('default'=>0, 'min_range'=>1));

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT, $idOptions);
if ($id == 0) {
    echo "PLEASE USE A CORRECT ID.";
    exit();
}

$card = $HSDB->getCardById($id)[0];
$HSDB -> deleteCard($id);

unlink('./imgs/'.$card['img']);

header('Location: ./view_forged_in_the_barrens.php');

?>