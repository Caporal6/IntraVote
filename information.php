<?php
// On démarre toujours la session en haut et dans tous les fichiers.
session_start();


$var_value = $_GET['varname'];
$id = $var_value;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
        
                        <th scope="col">#id</th>
                        <th scope="col">nom</th>
                        <th scope="col">lieux</th>
                        <th scope="col">date</th>
                        <th scope="col">heure</th>
                        <th scope="col">description</th>
                        <th scope="col">departement</th>
                        <th scope="col">vote</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                        <th scope="col">Vote</th>
                    </tr>
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

                        $conn->query('SET NAMES utf8'); $sql = "SELECT * FROM evenement WHERE id = $id";
                        $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                        // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $nomT = $row['nom'];
                                $lieuxT = $row['lieux'];
                                $dateT = $row['date'];
                                $heureT = $row['heure'];
                                $descriptionT = $row['description'];
                                $departementT = $row['departement'];

                                echo '<tr><th scope="row">'. $row["id"].'</th>
                                <td>'. $row["nom"].'</td>
                                <td>'. $row["lieux"].'</td>
                                <td>'. $row["date"].'</td>
                                <td>'. $row["heure"].'</td> 
                                <td>'. $row["description"].'</td>
                                <td>'. $row["departement"].'</td> 
                                <td>'. $row["vote"].'</td>
                                <td><a href="choixVote.php?varname='.$var_value.'" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Voter</a></td>
                                <td><a href="modifier.php?varname='.$var_value.'" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">modifier.php</a>   </td>
                                <td><a href="supprimer.php?varname='.$var_value.'" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Supprimer</a></td>
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
   
   


<div class="container-fluid">
    <div class="row ">
        <div class="col-6 d-flex justify-content-center flex-wrap align-content-center  bg-primary">
            <h1><?php echo $nomT ?></h1>
        </div>

        <div class="col-6 d-flex justify-content-center flex-wrap align-content-center  bg-danger">
            <h1><?php echo $dateT ?></h1>
        </div>

        <div class="col-4 d-flex justify-content-center flex-wrap align-content-center  bg-danger">
            <h1><?php echo $departementT ?></h1>
        </div>
        <div class="col-4 d-flex justify-content-center flex-wrap align-content-center  bg-danger">
            <h1><?php echo $lieuxT ?></h1>
        </div>
        <div class="col-4 d-flex justify-content-center flex-wrap align-content-center  bg-primary">
            <h1><?php echo $heureT ?>h</h1>
        </div>

        <div class="col-12 d-flex justify-content-center bg-warning">
            <h1><?php echo $descriptionT ?></h1>
        </div>
        


    </div>
</div>




















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>