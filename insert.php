<?php
  require_once('config.php');

  // Pobieranie wartości z formularza
  $word = addslashes(strtolower($_POST['word']));
  $description = strtolower($_POST['description']);
  // $repeats = $_POST['repeats'];

  // Zapisywanie wartości w bazie danych
  // $sql= "CREATE TABLE words (
  //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  //     words VARCHAR(30) NOT NULL,
  //     descriptions VARCHAR(50) NOT NULL,
  //     repeats INT(3) UNSIGNED DEFAULT 0
  //   )";
  $sql = "SELECT * FROM words WHERE words = '$word'";
  $result = mysqli_query($conn, $sql);
  var_dump($result);
  if (mysqli_num_rows($result) > 0) {
    header('Location: index.php?komunikat=Słowo%20już%20jest%20w%20bazie%20danych&background=crimson');
    exit;
  } else {
    echo "Błąd: " . $sql . "<br>" . mysqli_error($conn);
  }

  $sql = "INSERT INTO words (words, descriptions) VALUES ('$word', '$description')";

  if (mysqli_query($conn, $sql)) {
    header('Location: index.php?komunikat=Dane%20zosta%C5%82y%20zapisane%20w%20bazie%20danych&background=green');
    exit;
  } else {
    echo "Błąd: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
?>