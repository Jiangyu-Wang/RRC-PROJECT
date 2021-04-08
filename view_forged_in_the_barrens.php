<?php

require './lib/userAuthenticate.php';
$HSDB = require './lib/connect.php';

$heroClass = filter_input(INPUT_GET, 'HeroClass');
$sortBy = filter_input(INPUT_GET, 'SortBy');

$cards = $HSDB->getCardsByClass($heroClass, $sortBy);
$heroClasses = $HSDB->getClasses();

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

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

<?php foreach ($cards as $index => $card): ?>
    <a href="./view_card_edit.php?id=<?= $card['id'] ?>">
        <img src="imgs/<?= $card['img'] ?>">
    </a>
<?php endforeach ?>

</body>
</html>