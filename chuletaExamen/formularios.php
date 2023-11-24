<?php
if(isset($_GET["texto"])){

}

?>
header('Location:index.php?message="valor"&segundaValor="valor2"')
<form action="/action_page.php" method="GET">
  <input type="radio" id="html" name="fav_language" value="HTML">
  <label for="html">HTML</label><br>
  <input type="radio" id="css" name="fav_language" value="CSS">
  <label for="css">CSS</label><br>
  <input type="radio" id="javascript" name="fav_language" value="JavaScript">
    <input type="text"name="texto" value="<?=$textoIntroducido??0?>">
  <label for="javascript">JavaScript</label>
    <input type="submit" value="Submit">
</form>