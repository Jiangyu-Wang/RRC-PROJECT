<?php

$HSDB = require './lib/connect.php';

$id = filter_input(INPUT_POST, 'id');
$HSDB -> deleteCard($id);

header('Location: ./view_forged_in_the_barrens.php');

?>