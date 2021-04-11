<?php

Class HSDB {

  private $db;

  function __construct($dsn, $user, $pass) {
    $this->db = new PDO($dsn, $user, $pass);
  }

  public function newCard($name, $description, $heroClass, $imgName, $rarity) {
    $sql = "INSERT INTO cards (id, name, description, heroclass, img, rarity) 
      VALUES (NULL, '".$name."', '".$description."', '".$heroClass."', '".$imgName."', '".$rarity."')";
    $result = $this->db->query($sql);
    return $result;
  }

  public function getCardById($cardId) {
    $sql = 'SELECT * FROM cards WHERE id ='.$cardId;
    $cards = [];
    foreach ($this->db->query($sql) as $key => $row) {
      $cards[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'description' => $row['description'],
        'heroclass' => $row['heroclass'],
        'img' => $row['img'],
        'rarity' => $row['rarity']
      ];
    }
    return $cards;
  }

  public function updateCard($id, $name, $description, $heroClass, $imgName, $rarity) {
    $sql = "UPDATE cards SET name = '".$name."', description = '".$description."', heroclass = '".$heroClass."', img = '".$imgName."', rarity = '".$rarity."' WHERE id = ".$id.";";
    $result = $this->db->query($sql);
    return $result;
  }

  public function deleteCard($id) {
    $sql = "DELETE FROM cards WHERE id=".$id.";";
    $result = $this->db->query($sql);
    return $result;
  }

  public function getCardsByClass($classId, $sortBy = null, $keyWords = "") {
    $sql = 'SELECT * FROM cards ';

    if ($classId != null || $keyWords != "") {
      $sql = $sql.'WHERE';
    }

    if ($classId != null) {
      $sql = $sql.' heroclass ='.$classId;
    }

    if ($keyWords != "") {
      $sql = $sql." name LIKE '%".$keyWords."%'";
    }

    if ($sortBy != null) {
      $sql = $sql.' ORDER BY '.$sortBy.' ASC';
    }

    $cards = [];
    foreach ($this->db->query($sql) as $key => $row) {
      $cards[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'description' => $row['description'],
        'heroclass' => $row['heroclass'],
        'img' => $row['img'],
        'rarity' => $row['rarity']
      ];
    }
    return $cards;
  }

  public function getClasses() {
    $sql = 'SELECT * FROM heroclasses';
    $classes = [];
    foreach ($this->db->query($sql) as $key => $row) {
      $classes[] = [
        'id' => $row['id'],
        'name' => $row['name']
      ];
    }
    return $classes;
  }

}

$HSDB = new HSDB('mysql:host=localhost;dbname=project', 'root', '');

return $HSDB;

?>