<?php

require './lib/authenticate.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ADD</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
    <div class="wrap">
        <form class="row g-3" method="POST" action="./control_card_add.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Card Name</label>
                <input type="text" class="form-control" id="name" name="name">
                <label for="content" class="form-label">Card Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                <label for="title" class="form-label">Hero Class</label>
                <input type="text" class="form-control" id="heroclass" name="heroclass">
                <label for="title" class="form-label">Card Img</label>

                <input type="file" class="form-control" id="img" name="img">
                <!-- <input type="text" class="form-control" id="img" name="img"> -->
                
                <label for="title" class="form-label">Card Rarity</label>
                <input type="text" class="form-control" id="rarity" name="rarity">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>