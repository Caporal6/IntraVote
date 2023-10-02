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

    <a href="evenement.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Evenement.php</a> 



<?php

$var_value = $_GET['varname'];
$id = $var_value;




if (isset($_POST['bon']) || isset($_POST['moyen']) || isset($_POST['mauvais']) && !empty($_GET['varname'])){
    
    $bon2 = $_POST["bon2"]; 
    $moyen2 = $_POST["moyen2"]; 
    $mauvais2 = $_POST["mauvais2"]; 
    $nombre2 = $_POST["nombre2"]; 

    if(isset($_POST['bon'])){
        $bon2++;
        $nombre2++;
    }


    if(isset($_POST['moyen'])){
        $moyen2++;
        $nombre2++;
    }

    if(isset($_POST['mauvais'])){
        $mauvais2++;
        $nombre2++;
    }




$servername = "localhost";
$username = "root";
$password = "Azgt3878";
$dbname = "intra";



$conn=mysqli_connect($servername,$username,$password,$dbname);

//Checkconnection
if(!$conn){
die("Connectionfailed:".mysqli_connect_error());
}

$conn->query('SET NAMES utf8'); $sql = "UPDATE vote_employeur SET bon = '$bon2',  nombre = '$nombre2', moyen = '$moyen2', mauvais = '$mauvais2' WHERE id = '$id'";
$result = $conn->query($sql);

    if ($result) {
} else {
    echo "0 results";
}
$conn->close();
}
?>



    








<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
        
                        <th scope="col">#id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">bon</th>
                        <th scope="col">moyen</th>
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

                        $conn->query('SET NAMES utf8'); $sql = "SELECT * FROM vote_employeur WHERE id = $id";
                        $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                        // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $var_value = $row["id"];
                                $nombre = $row["Nombre"];
                                $bon = $row["Bon"];
                                $moyen = $row["Moyen"];
                                $mauvais = $row["Mauvais"];
                                echo '<tr><th scope="row">'. $row["id"].'</th><td>'. $row["Nombre"].'</td>
                                <td>'. $bon.'</td>
                                <td>'. $row["Moyen"].'</td>
                                <td>'. $row["Mauvais"].'</td>
                                </tr>'; 
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();



                        ?>


                            <form action="" method="POST">

                                <input class="big_b" type="hidden" name="nombre2" value="<?php echo $nombre ?>" /> 


                                <input class="big_b" type="hidden" name="bon2" value="<?php echo $bon ?>" /> 
                                <input class="big_b" type="submit" name="bon" value="Next" /> 

                                <input class="big_b" type="hidden" name="moyen2" value="<?php echo $moyen ?>" /> 
                                <input class="big_b" type="submit" name="moyen" value="Next" /> 

                                <input class="big_b" type="hidden" name="mauvais2" value="<?php echo $mauvais ?>" /> 
                                <input class="big_b" type="submit" name="mauvais" value="Next" /> 

                            </form>

                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>