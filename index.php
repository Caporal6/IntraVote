<?php
// On démarre toujours la session en haut et dans tous les fichiers.
session_start();
$_SESSION["connexion"] = false; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet"  href="css/styleIndex.css" /> 
    <title>Document</title>
</head>
<body>
    
<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST"){

  $nom = $_POST['nom'];
  $password = $_POST['mdp'];

  $password = sha1($password,false);
                   
  $servername = "cours.cegep3r.info";
  $usernameDB = "2130649";
  $passwordDB = "2130649";
  $db = "2130649-ricard-xavier";

  // Create connection
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $db);
  // Check connection

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $conn->query('SET NAMES utf8'); 
  $sql = "SELECT * FROM user where nom='$nom' and password='$password'";
  //echo $sql;
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    //echo "<h1>Connecté</h1>";
    $_SESSION["connexion"] = true; 
    $_SESSION["utilisateur"] = $nom;
    header('Location: evenement.php');  
    } else {
    //echo "<h2>Nom d'usager ou mot de passe invalide</h2>";
    }
    $conn->close();
  }
?>






<div class="container h-100 d-flex align-items-center container1" >
  <div class="container  m-5" >

  <div class="row">

    <div class="col-2"> 
    </div>
    <div class="col-8 boite">
      <form method="post" action="index.php">
        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="nom">Nom</label>
          <input type="text" name="nom" class="form-control" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
        <label class="form-label" for="mdp">Mot de passe</label>
        <input type="password" name="mdp" class="form-control" />
        </div>



        <!-- Submit button -->

          <button type="Submit" class="btn btn-primary btn-lg btn-block form-control mb-4">Sign in</button>




        <!-- Register buttons -->
        <div class="text-center">


        </div>
      </form>
    </div>

  </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>