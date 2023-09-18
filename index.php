<?php
// On démarre toujours la session en haut et dans tous les fichiers.
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    
<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST"){

  $nom = $_POST['nom'];
  $password = $_POST['mdp'];

  $password = sha1($password,false);
                   
  $servername = "localhost";
  $usernameDB = "root";
  $passwordDB = "Azgt3878";
  $db = "intra";

  // Create connection
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $db);
  // Check connection

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $conn->query('SET NAMES utf8'); 
  $sql = "SELECT * FROM user where nom='$nom' and password='$password'";
echo $sql;
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h1>Connecté</h1>";
    header('Location: evenement.php');  
    $_SESSION["connecion"] = true;
    } else {
    echo "<h2>Nom d'usager ou mot de passe invalide</h2>";
    }
    $conn->close();
  }
?>







<div class="container-fluid">
  <div class="row m-5">
    <div class="col-4"> 
    </div>
    <div class="col-4">
      <form method="post" action="index.php">
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="text" name="nom" class="form-control" />
          <label class="form-label" for="nom">User</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" name="mdp" class="form-control" />
          <label class="form-label" for="mdp">Password</label>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
              <label class="form-check-label" for="form2Example31"> Remember me </label>
            </div>
          </div>

          <div class="col">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a>
          </div>
        </div>

        <!-- Submit button -->

          <button type="Submit" class="btn btn-primary btn-lg btn-block form-control">Sign in</button>





        <!-- Register buttons -->
        <div class="text-center">
          <p>Not a member? <a href="#!">Register</a></p>
          
        </div>
      </form>
    </div>
    <div class="col-4">
      <a href="evenement.php">Oups</a>
    </div>
  </div>
</div>

<?php
  // Set session variables
    $_SESSION["connexion"] = true; 
    echo "La connexion est réussie" . $_SESSION["connexion"];
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>