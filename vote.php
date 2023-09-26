<?php
// On démarre toujours la session en haut et dans tous les fichiers.
session_start();
if(!isset($_POST['bon']) && !isset($_POST['boff']) && !isset($_POST['mauvais'])){
    $_SESSION['attnumBon'] = 1;
    $_SESSION['attnumBoff'] = 1;
    $_SESSION['attnumMauvais'] = 1;
}
else{
    if (isset($_POST['bon'])) {
        $_SESSION['attnumBon']++;
    } 
    elseif(isset($_POST['boff'])){
        $_SESSION['attnumBoff']++;
    }
    elseif(isset($_POST['mauvais'])){
        $_SESSION['attnumMauvais']++;
    }
}


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


    <div class="container container h-100 d-flex justify-content-center align-items-center">
        <div class="row ">
            <form method="post">
            <div class="col-4 d-flex justify-content-center ">
                <input name='bon' type="submit" value='+'>

            </div>

            <div class="col-4 d-flex justify-content-center">
                <input name='boff' type="submit" value='+'>
            </div>

            <div class="col-4 d-flex justify-content-center">
                <input name='mauvais' type="submit" value='+'>  
            </div>
            </form>
        </div>
    </div>

    <h3><em>Bon:<?php echo $_SESSION['attnumBon'] ?>: </em></h3>
    <h3><em>Boff:<?php echo $_SESSION['attnumBoff'] ?>: </em></h3>
    <h3><em>Mauvais:<?php echo $_SESSION['attnumMauvais'] ?>: </em></h3>

    <a href="evenement.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Evenement.php</a> 


<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
        
                        <th scope="col">#id</th>
                        <th scope="col">vote_etudiant</th>
                        <th scope="col">vote_employeur</th>
                        <th scope="col">bon</th>
                        <th scope="col">boff</th>
                        <th scope="col">mauvais</th>
  
                    </tr>
                </thead>
                <tbody>
    
                    <?php 
                    
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

                        $conn->query('SET NAMES utf8'); $sql = "SELECT * FROM vote";
                        $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                        // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $var_value = $row["id"];
                                echo '<tr><th scope="row">'. $row["id"].'</th><td>'. $row["vote_etudiant"].'</td><td>'. $row["vote_employeur"].'</td><td>'. $row["bon"].'</td>
                                <td>'. $row["moyen"].'</td> <td>'. $row["mauvais"].'</td> 
                                </tr>'; 
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>