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

  $user = $_POST['user'];
  $password = $_POST['password'];



                    
  $servername = "localhost";
  $username = "root";
  $password = "Azgt3878";
  $db = "intra";

  // Create connection
    $conn = new mysqli($servername, $username, $password, $db);
  // Check connection

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $conn->query('SET NAMES utf8'); $sql = "SELECT * FROM user";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row
    while($row = $result->fetch_assoc()) {
      echo '<tr><th scope="row">'. $row["id"].'</th><td>'. $row["nom"].'</td><td>'. $row["lieux"].'</td><td>'. $row["date"].'</td>
            <td>'. $row["heure"].'</td> <td>'. $row["description"].'</td> <td>'. $row["departement"].'</td> 
                            <td>'. $row["vote"].'</td>
                            <td>Mod</td>
                            <td>Supprimer</td>
                            </tr>';  
      }
    } else {
    echo "0 results";
    }
    $conn->close();
  }
?>







<div class="container-fluid">
  <div class="row m-5">
    <div class="col-4"> 
    </div>
    <div class="col-4">
      <form>
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="text" id="user" class="form-control" />
          <label class="form-label" for="user">User</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="mdp" class="form-control" />
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

          <button type="button" class="btn btn-primary btn-lg btn-block form-control">Sign in</button>





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