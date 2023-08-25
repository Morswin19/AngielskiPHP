<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angielski-all</title>
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
    <ul class="word-list">
        <?php
        $sql = "SELECT * FROM words ORDER BY id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $order = 0;
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $order = $order + 1;?>
                    <li class="word-item">
                        <p><?php echo $order; ?></p>
                        <p><?php echo $row["words"]; ?></p>
                        <p><?php echo $row["descriptions"]; ?></p>
                        <p><?php echo $row["repeats"]; ?></p>
                        <p><?php echo $row["dobrze"]; ?></p>
                        <p><?php if($row["dobrze"] == 0):
                        echo "Wynik: 0%";
                        else:
                        echo ("Wynik: " . round($row["dobrze"] / $row["repeats"] *100, 2)) . "%";
                        endif; ?></p>
                        <form action="remove.php">
                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                            <button class="mui-btn mui-btn--danger" name="odpowiedz" value="NIE">USUŃ</button>
                        </form>
                    </li>
                    <?php
        }
        } else {
            echo "0 results";
        }
        ?>
    </ul>
  </div>
</main>
</body>
</html>