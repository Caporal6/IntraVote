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
    <link rel="stylesheet"  href="css/styleInformation.css" /> 
    
    <title>Document</title>
</head>
<body>

<?php

$servername = "cours.cegep3r.info";
$username = "2130649";
$password = "2130649";
$dbname = "2130649-ricard-xavier";

$conn=mysqli_connect($servername,$username,$password,$dbname);




if(!$conn){
        die("Connectionfailed:".mysqli_connect_error());
        }
    
        $sql=" INSERT INTO  vote_employeur(id,nombre,bon,moyen,mauvais)
        VALUES('$var_value','0','0','0','0')";
    
        if(mysqli_query($conn,$sql)){
        }else{

        }
        mysqli_close($conn);


        $servername = "cours.cegep3r.info";
        $username = "2130649";
        $password = "2130649";
        $dbname = "2130649-ricard-xavier";
        
        $conn=mysqli_connect($servername,$username,$password,$dbname);
        
        
        
        
        if(!$conn){
                die("Connectionfailed:".mysqli_connect_error());
                }
            
                $sql=" INSERT INTO  vote_etudiant(id,nombre,bon,moyen,mauvais)
                VALUES('$var_value','0','0','0','0')";
            
                if(mysqli_query($conn,$sql)){
                }else{

                }
                mysqli_close($conn);


?>
    

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

                $conn->query('SET NAMES utf8'); $sql = "SELECT * FROM vote_etudiant WHERE id = $id";
                $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $nombreET = $row["Nombre"];
                        $bonET = $row["Bon"];
                        $moyenET = $row["Moyen"];
                        $mauvaisET = $row["Mauvais"];

                    }
                } else {
                    echo "0 results";
                }
                $conn->close();

                ?>



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

                        $conn->query('SET NAMES utf8'); $sql = "SELECT * FROM vote_employeur WHERE id = $id";
                        $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                        // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $nombreE = $row["Nombre"];
                                $bonE = $row["Bon"];
                                $moyenE = $row["Moyen"];
                                $mauvaisE = $row["Mauvais"];

                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();



                        ?>

<div class="container-fluid container1">
    <div class="row boite">
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


        <!-- Afficher les vote etudiant    -->
        <div class="row p-5">

            <div class="col-6 d-flex justify-content-center flex-wrap align-content-center  bg-primary">
                <h1>Etudiant: </h1>
            </div>



            <div class="col-6 d-flex justify-content-center flex-wrap align-content-center  bg-danger">
                <h1>Nombre: <?php echo $nombreET ?></h1>
            </div>



            <div class="col-4 d-flex justify-content-center flex-wrap align-content-center  bg-warning">
                <h1>Bon: <?php echo $bonET ?></h1>
            </div>



            <div class="col-4 d-flex justify-content-center flex-wrap align-content-center  bg-danger">
                <h1>Moyen: <?php echo $moyenET ?></h1>
            </div>



            <div class="col-4 d-flex justify-content-center flex-wrap align-content-center  bg-primary">
                <h1>Mauvais: <?php echo $mauvaisET ?></h1>
            </div>


        </div>

        <div class="row p-5">

            <div class="col-6 d-flex justify-content-center flex-wrap align-content-center  bg-primary">
                <h1>Employeur: </h1>
            </div>



            <div class="col-6 d-flex justify-content-center flex-wrap align-content-center  bg-danger">
                <h1>Nombre: <?php echo $nombreE ?></h1>
            </div>



            <div class="col-4 d-flex justify-content-center flex-wrap align-content-center  bg-warning">
                <h1>Bon: <?php echo $bonE ?></h1>
            </div>



            <div class="col-4 d-flex justify-content-center flex-wrap align-content-center  bg-danger">
                <h1>Moyen: <?php echo $moyenE ?></h1>
            </div>



            <div class="col-4 d-flex justify-content-center flex-wrap align-content-center  bg-primary">
                <h1>Mauvais: <?php echo $mauvaisE ?></h1>
            </div>


        </div>
        


    </div>
</div>




















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>