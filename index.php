<?php

$hostname='localhost';
$username='root';
$password='';
$database='wall';



try {
    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM uploaden";
    $statement = $connection->query($query);
    // echo "Verbinding is gemaakt!";
} catch(PDOException $e) {
    // echo 'Fout bij database verbinding: ' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
    echo 'Fout bij SQL query:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
}

?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Main Pagina</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/153f4a8e27.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
    <div id="startchange" class="nav navbar-fixed-top">
      <input type="checkbox" id="nav-check">
      <div class="nav-header">
        <a href="" data-aos="fade-left" class="nav-title2" id="genrehover2">CountryImage</a>
      </div>
      <div class="nav-btn">
        <label for="nav-check">
          <span></span>
          <span></span>
          <span></span>
        </label>
      </div>
      <div class="nav-links">
        <a href="" class="buttonneeee" data-aos="fade-left" id="genrehover"><i id="iconrotate" class="material-icons left">speaker</i>Music</a>
        <a href="" class="buttonneeee" data-aos="fade-left" id="genrehover"><i id="iconrotate" class="material-icons left">local_movies</i>Sample-Packs/Plugins</a>
        <a href="" class="buttonneeee" data-aos="fade-left" id="genrehover"><i id="iconrotate" class="material-icons left">speaker_group  </i>Albums</a>
        <a href="" class="buttonneeee" data-aos="fade-left" id="genrehover"><i id="iconrotate" class="material-icons left">local_bar</i>Latest</a>
        <a href="" class="ree" data-aos="fade-left" id="genrehover"><i id="iconrotate" class="material-icons left">local_phone</i>Contact</a>
      </div>
    </div>

    <br><br><br>


    <div class="grid">
      <?php
      foreach ($statement as $row){ ?>
        <div class="samen">
          <div class="samen2">
            <a href="../profiel/index.php"><img class="profiel" id="griditem" src="<?php echo $row['profiel'] ?>" ></a>
            <div class="titel" id="griditem"><?php  echo $row['titel'] ?> </div>
            <div id="griditem"><i class="icon fas fa-user-plus"></i></div>
          </div>

          <div><img class="foto" id="myImg" src="<?php echo $row['foto'] ?>" ></div>

          <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
          </div>

        <div class="backgroundcc">

        <div class="samen2">
          <div class="likes"><i class="likes2 fas fa-thumbs-up"></i><?php  echo $row['likes'] ?></div>
          <div class="tags1"><?php  echo $row['tags'] ?> </div>
        </div>

        <div class="">
          <div class="titel2"><?php  echo $row['titel'] ?> </div>
          <div class="beschrijving"><?php  echo $row['beschrijving'] ?> </div>
          <p class="readmore">Read More</p>
        </div>

        </div>
      </div>
      <?php } ?>
    </div>

  </body>
  <script>
      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the image and insert it inside the modal - use its "alt" text as a caption
      var img = document.getElementById("myImg");
      var modalImg = document.getElementById("img01");
      img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
      }

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }
</script>
</html>
