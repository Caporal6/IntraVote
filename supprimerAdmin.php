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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    


<?php 
    $var_value = $_GET['varname'];
    $id = $var_value;
    echo $id;


    $servername = "cours.cegep3r.info";
    $username = "2130649";
    $password = "2130649";
    $dbname = "2130649-ricard-xavier";


    //Createconnection
    $conn=new mysqli($servername,$username,$password,$dbname);
    //Checkconnection
    if($conn->connect_error){
    die("Connectionfailed:".$conn->connect_error);
    }
    //sqltodeletearecord
    $sql="DELETE FROM user WHERE id='$id'";
    if($conn->query($sql)===TRUE){
        header('Location: toutAdmin.php'); 
    echo"Record deleted successfully";
    }else{
    echo"Error deleting record:".$conn->error;
    }$conn->close();
    




?>
























<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>