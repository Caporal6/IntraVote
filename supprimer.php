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
    <title>Document</title>
</head>
<body>
    
<?php 
    $var_value = $_GET['varname'];
    $id = $var_value;
    echo $id;


    $servername = "localhost";
    $username = "root";
    $password = "Azgt3878";
    $dbname = "intra";


//Supprime Bd evenement
    $conn=new mysqli($servername,$username,$password,$dbname);
    //Checkconnection
    if($conn->connect_error){
    die("Connectionfailed:".$conn->connect_error);
    }
    //sqltodeletearecord
    $sql="DELETE FROM evenement WHERE id='$id'";
    if($conn->query($sql)===TRUE){
        header('Location: evenement.php'); 
    echo"Record deleted successfully";
    }else{
    echo"Error deleting record:".$conn->error;
    }
    

// Supprime bd employeur
    $conn=new mysqli($servername,$username,$password,$dbname);
    //Checkconnection
    if($conn->connect_error){
    die("Connectionfailed:".$conn->connect_error);
    }
    //sqltodeletearecord
    $sql="DELETE FROM vote_employeur WHERE id='$id'";
    if($conn->query($sql)===TRUE){
        header('Location: evenement.php'); 
    echo"Record deleted successfully";
    }else{
    echo"Error deleting record:".$conn->error;
    }



//Supprime bd etudiant
    $conn=new mysqli($servername,$username,$password,$dbname);
    //Checkconnection
    if($conn->connect_error){
    die("Connectionfailed:".$conn->connect_error);
    }
    //sqltodeletearecord
    $sql="DELETE FROM vote_etudiant WHERE id='$id'";
    if($conn->query($sql)===TRUE){
        header('Location: evenement.php'); 
    echo"Record deleted successfully";
    }else{
    echo"Error deleting record:".$conn->error;
    }
    
    
    
    
    
    
    
    $conn->close();
    




?>










</body>
</html>