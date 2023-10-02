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

$var_value = $_GET['varname'];
echo $var_value;


?>



<div class="container-fluid  ">

    <div class="row m-5">


        <div class="col-6 d-flex justify-content-center">

        <a href="vote.php?varname=<?php echo $var_value?>" class="btn btn-primary btn-lg active " role="button" aria-pressed="true">Etudiant</a>
        </div>

        <div class="col-6 d-flex justify-content-center">

        <a href="voteEmployeur.php?varname=<?php echo $var_value?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Employeur</a>
        </div>
    </div>
          
</div>



<?php

$servername = "localhost";
$username = "root";
$password = "Azgt3878";
$dbname = "intra";

$conn=mysqli_connect($servername,$username,$password,$dbname);




if(!$conn){
        die("Connectionfailed:".mysqli_connect_error());
        }
    
        $sql=" INSERT INTO  vote_employeur(id,nombre,bon,moyen,mauvais)
        VALUES('$var_value','0','0','0','0')";
    
        if(mysqli_query($conn,$sql)){
            echo"Enregistrement réussi";
        }else{

        }
        mysqli_close($conn);


        $servername = "localhost";
        $username = "root";
        $password = "Azgt3878";
        $dbname = "intra";
        
        $conn=mysqli_connect($servername,$username,$password,$dbname);
        
        
        
        
        if(!$conn){
                die("Connectionfailed:".mysqli_connect_error());
                }
            
                $sql=" INSERT INTO  vote_etudiant(id,nombre,bon,moyen,mauvais)
                VALUES('$var_value','0','0','0','0')";
            
                if(mysqli_query($conn,$sql)){
                    echo"Enregistrement réussi";
                }else{

                }
                mysqli_close($conn);


?>























<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>