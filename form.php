<form class="new-word-form" method="post" action="insert.php">
  <label for="word">Słowo</label>
  <br />
  <input type="text" name="word" id="word"><br>

  <label for="description">Opis</label>
  <br />
  <textarea type="text" name="description" id="description" rows="10" cols="30"></textarea><br>

  <input type="hidden" name="repeats" value="0">

  <input type="submit" value="Zapisz">
</form>