<?php

require './lib/authenticate.php';
$HSDB = require './lib/connect.php';

$id = filter_input(INPUT_GET, 'id');

$card = $HSDB->getCardById($id)[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>EDIT</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
    <div class="wrap">
        <img src="imgs/<?= $card['img'] ?>">
        <form class="row g-3" method="POST" action="./control_card_update.php">
            <div class="mb-3">
                <label for="title" class="form-label">Card Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $card['name'] ?>">
                <label for="content" class="form-label">Card Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?= $card['description'] ?></textarea>
                <label for="title" class="form-label">Hero Class</label>
                <input type="text" class="form-control" id="heroclass" name="heroclass" value="<?= $card['heroclass'] ?>">
                <label for="title" class="form-label">Card Img</label>
                
                <input type="file" class="form-control" id="img" name="img">
                
                <label for="title" class="form-label">Card Rarity</label>
                <input type="text" class="form-control" id="rarity" name="rarity" value="<?= $card['rarity'] ?>">
                <input type="text" name="id" value="<?= $card['id'] ?>" style="display: none;">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </form>
        <form method="POST" action="./control_card_delete.php">
            <input type="text" name="id" value="<?= $card['id'] ?>" style="display: none;">
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>

</body>
</html>