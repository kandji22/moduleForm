<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <title>Show</title>
</head>

<body>
  <?php
  //a mettre dans le controlleur
  $bdd = new PDO("mysql:host=localhost;charset=utf8;dbname=webside", "root", "root");
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $req = $bdd->query('SELECT * FROM feedback');
  $rep = $req->fetchAll();


  ?>
  ok toujour pour moi et toi
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
</body>

</html>