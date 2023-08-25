<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angielski</title>
    <link href="//cdn.muicss.com/mui-0.10.3/css/mui.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-0.10.3/js/mui.min.js"></script>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
  <main>
    <?php
        require_once('config.php');
    ?>
    <header>
      <nav class="mui-container">
        <ul>
          <a href="/angielski"><li>CHECK AND ADD</li></a>
          <a href="/angielski/all"><li>ALL WORDS</li></a>
        </ul>
      </nav>
  </header>
    <?php if (isset($_GET['komunikat'])) { ?>
          <div class="main-info-container" style="background: <?php echo $_GET['background']; ?>">
            <?php echo "<p>" . $_GET['komunikat'] . "</p>"; ?>
          </div>

      <?php
      }
    ?>
    
    <div class="mui-container mui--text-center">
      <h3>Sprawdź, czy znasz to słowo:</h3>
      <?php
      $sql = "SELECT * FROM words WHERE repeats < 5 OR dobrze / repeats < 0.8 ORDER BY updated_at LIMIT 1 ";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          echo "<div class='word-info'><p>" . $row["words"]. "</p>";
          echo "<p class='word-description'>" . $row["descriptions"] . "</p></div>";
          echo "<p>Ilość powtórek: " . $row["repeats"] . "</p>";
          if($row["dobrze"] == 0):
            echo "<p>Wynik: 0%</p>";
          else:
            echo ("<p>Wynik: " . round($row["dobrze"] / $row["repeats"] *100, 2)) . "%</p>";
          endif;

          echo "ostatnia powtórka: " . $row["updated_at"];

          if(isset($_GET["id"])){
            if($_GET["id"] == $row["id"]){
              $headerText = 'Location: index.php?id=' . $row["id"]; 

              header($headerText);
            }
          }
        ?>
          <form class="check-form" action="check.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            <button name="odpowiedz" value="NIE">NIE</button>
            <button name="odpowiedz" value="SREDNIO">ŚREDNIO</button>
            <button name="odpowiedz" value="TAK">TAK</button>
          </form>
        <?php
        }
      } else {
        echo "0 results";
      }
      ?>


      <h3>Dodaj nowe słowo</h3>
      <!-- // form for new words -->
      <?php
        include 'form.php'
      ?>
    </div>
  </main>
  <script src="./scripts/app.js"></script>
</body>
</html>