<?php
  require_once('config.php');

  $odpowiedz = $_POST['odpowiedz'];
  $id = $_POST['id'];

// Wykonanie akcji w zależności od wartości buttona
switch ($odpowiedz) {
  case "NIE":
    // Odejmij 1 punkt w bazie danych
    $sql = "UPDATE words SET repeats = repeats + 1 WHERE id = $id";
    $conn->query($sql);
    break;
  case "TAK":
    // Dodaj 1 punkt w bazie danych
    $sql = "UPDATE words SET dobrze = dobrze + 1, repeats = repeats + 1 WHERE id = $id";
    $conn->query($sql);
    break;
  case "SREDNIO":
    $sql = "UPDATE words SET middle = middle + 1 WHERE id = $id";
    $conn->query($sql);
    break;
}
    $headerText = 'Location: index.php?id=' . $id; 

    header($headerText);
?>