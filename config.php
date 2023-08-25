<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "angielski";

  // Tworzenie połączenia z bazą danych
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Sprawdzanie połączenia
if (!$conn) {
  die("Nie udało się połączyć z bazą danych: " . mysqli_connect_error());
}
?>