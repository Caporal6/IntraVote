<?php
// On démarre toujours la session en haut et dans tous les fichiers.
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="css/styleIndex.css" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
 







<div class="container h-100 d-flex align-items-center container1">
    <div class="container ">
    <div class="row">
        <h1 class="yowtf d-flex justify-content-center flex-wrap align-content-center">-Admin-</h1>
    <div class="col-2"> 
    </div>
        <div class="col-8 p-3 boite">
            <table class="table">
                <thead>

                </thead>
                <tbody>
    
                    <?php 
                    
                    $servername = "cours.cegep3r.info";
                    $username = "2130649";
                    $password = "2130649";
                    $db = "2130649-ricard-xavier";

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
                                $var_value = $row["id"];
                                echo '<tr><th scope="row">'. $row["nom"].'</th>
                                <td><a href="modifierAdmin.php?varname='.$var_value.'" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Modifier</a></td>
                                <td><a href="supprimerAdmin.php?varname='.$var_value.'" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Supprimer</a></td>
                                </tr>';  
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    ?>
                </tbody>
            </table>

            <div class="row">
            <div class="col-6">
                <div class="text-center">
                <p>Ajouter un <a href="ajouterAdmin.php">Admin</a></p>

                </div>
            </div>

            <div class="col-6 d-flex justify-content-center flex-wrap align-content-center">
                <a href="evenement.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Évenement</a>
            </div>
            </div>



        </div>

    </div>
    </div>
</div>


















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>