<?php

$HSDB = require './lib/connect.php';

$heroClass = filter_input(INPUT_GET, 'HeroClass');
$sortBy = filter_input(INPUT_GET, 'SortBy');

$cards = $HSDB->getCardsByClass($heroClass, $sortBy);
$heroClasses = $HSDB->getClasses();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Forged In The Barrens</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<form>
    <input type="text" id="keywords" name="keywords">
    <button type="submit" id="search-button">FIND</button>
</form>

<div>
    <a href="./view_card_add.php">add</a>
</div>

<h3>Sort Cards By:</h3>
<ul>
	<li><a href="?SortBy=heroclass">heroclass</a></li>
	<li><a href="?SortBy=rarity">rarity</a></li>
	<li><a href="?SortBy=name">name</a></li>
</ul>

<h3>Choose a Hero Class:</h3>
<ul>
    <li><a href="?HeroClass=">All</a></li>
    <?php foreach ($heroClasses as $index => $class): ?>
        <li><a href="?HeroClass=<?= $class['id'] ?>"><?= $class['name'] ?></a></li>
    <?php endforeach ?>
</ul>

<div id="card-wrap">
    <?php foreach ($cards as $index => $card): ?>
        <a href="./view_card_edit.php?id=<?= $card['id'] ?>">
            <img src="imgs/<?= $card['img'] ?>">
        </a>
    <?php endforeach ?>
</div>

<script type="text/javascript">
    $("#search-button").click((event) => {
        event.preventDefault();
        $("#card-wrap").html("");
        let keywords = $("#keywords").val();

        $.getJSON( "./control_card_search_api.php", { KeyWords: keywords } ).done((cards) => {
            cards.forEach((card) => {
                let $cardLink = $("<a href='./view_card_edit.php?id=" + card.id + "'></a>");
                $cardLink.append("<img src='imgs/" + card.img + "'>");
                $("#card-wrap").append($cardLink);
            });
        });
    });
</script>

</body>
</html>