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

<a href="evenement.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Évenement</a> 


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

<div class="container container1">

    <div class="row boite">
        <div class="col-4 m-4 d-flex justify-content-center flex-wrap align-content-center ">
            <h1>Nom : <?php echo $nomT ?></h1>
        </div>

        <div class="col-6 d-flex  justify-content-center flex-wrap align-content-center">
            <h1 class=""><?php echo $departementT ?></h1>
        </div>

        <div class="col-4 d-flex justify-content-center flex-wrap align-content-center  ">
            <h1><?php echo $dateT ?></h1>
        </div>


        <div class="col-4 d-flex justify-content-center flex-wrap align-content-center  ">
            <h1><?php echo $lieuxT ?></h1>
        </div>
        <div class="col-4 d-flex justify-content-center flex-wrap align-content-center ">
            <h1><?php echo $heureT ?>h</h1>
        </div>

        <div class="col-12 mb-3  d-flex justify-content-center ">
            <textarea class="departement" rows="4" cols="80" readonly><?php echo $descriptionT;?></textarea>  

        </div>
    </div>


        <!-- Afficher les vote etudiant    -->
        <div class="row p-5 boite">

            <div class="col-12 d-flex justify-content-center flex-wrap align-content-center">
                <h1>Etudiant: </h1>
            </div>



            <div class="col-3 d-flex justify-content-center flex-wrap align-content-center ">
                <h1>Nombre: <?php echo $nombreET ?></h1>
            </div>



            <div class="col-3 d-flex justify-content-center flex-wrap align-content-center  ">
                <h1>Bon: <?php echo $bonET ?></h1>
            </div>



            <div class="col-3 d-flex justify-content-center flex-wrap align-content-center  ">
                <h1>Moyen: <?php echo $moyenET ?></h1>
            </div>



            <div class="col-3 d-flex justify-content-center flex-wrap align-content-center ">
                <h1>Mauvais: <?php echo $mauvaisET ?></h1>
            </div>


        </div>

        <div class="row p-5 boite mb-5">

            <div class="col-12 d-flex justify-content-center flex-wrap align-content-center  ">
                <h1>Employeur: </h1>
            </div>



            <div class="col-3 d-flex justify-content-center flex-wrap align-content-center  ">
                <h1>Nombre: <?php echo $nombreE ?></h1>
            </div>



            <div class="col-3 d-flex justify-content-center flex-wrap align-content-center  ">
                <h1>Bon: <?php echo $bonE ?></h1>
            </div>



            <div class="col-3 d-flex justify-content-center flex-wrap align-content-center ">
                <h1>Moyen: <?php echo $moyenE ?></h1>
            </div>



            <div class="col-3 d-flex justify-content-center flex-wrap align-content-center  ">
                <h1>Mauvais: <?php echo $mauvaisE ?></h1>
            </div>


        </div>
        



</div>




















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>