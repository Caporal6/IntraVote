<?php
// On démarre toujours la session en haut et dans tous les fichiers.
session_start();
if($_SESSION["connexion"] == false){
    header('Location: index.php'); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="css/styleIndex.css" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    
<?php

$var_value = $_GET['varname'];
echo $var_value;


?>



<div class="container h-100 d-flex align-items-center container1 " >
  <div class="container" >

  <div class="row">

  <div class="col-12 d-flex justify-content-center flex-wrap align-content-center ">




    <div class="col-6 d-flex justify-content-center flex-wrap align-content-center"> 
    <button class="button">
        <a href="vote.php?varname=<?php echo $var_value?>" class="btn btn-primary btn-lg active  boite2" role="button" aria-pressed="true">
            <img src="img/etudiant.png" alt="" width="300" height="300">
        </a>       
    </button> 
    </div>


    <div class="col-6 d-flex justify-content-center flex-wrap align-content-center">
        <button class="button ">
            <a href="voteEmployeur.php?varname=<?php echo $var_value?>" class="btn btn-primary btn-lg active boite2" role="button" aria-pressed="true">
                <img src="img/boss.png" alt="" width="300" height="300">
            </a>       
        </button> 
    </div>


    </div>
  </div>
  </div>
</div>





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
            echo"Enregistrement réussi";
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
                    echo"Enregistrement réussi";
                }else{

                }
                mysqli_close($conn);


?>























<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>