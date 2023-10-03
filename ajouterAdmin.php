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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
    



<?php


$nom = $passwordAdmin = "";
$nomErreur = $passwordErreur = "";
$erreur = false;

if ($_SERVER['REQUEST_METHOD'] == "POST"){
 
    if(empty($_POST["nom"])){
        $nomErreur = "Le nom ne peut pas être vide";
        $erreur  = true;
    }
    else{
        $nom = trojan($_POST["nom"]);
    }

    if(empty($_POST["password"])){
        $passwordErreur = "Où ce situe l'évenement ?";
        $erreur  = true;
    }
    else{
        $passwordAdmin = trojan($_POST["password"]);
        $passwordAdmin = sha1($passwordAdmin);
    }



    $servername = "cours.cegep3r.info";
    $username = "2130649";
    $password = "2130649";
    $dbname = "2130649-ricard-xavier";

    $conn=mysqli_connect($servername,$username,$password,$dbname);

    //Checkconnection
    if(!$conn){
    die("Connectionfailed:".mysqli_connect_error());
    }

    $sql=" INSERT INTO user (nom,password) VALUES ('$nom','$passwordAdmin')";

    if(mysqli_query($conn,$sql)){
        header('Location: index.php'); 
        echo"Enregistrement réussi";
    }else{
        echo"Error:".$sql."<br>".mysqli_error($conn);
    }
    mysqli_close($conn);
    
}
?>

<div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action="ajouterAdmin.php">


                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nom" class="form.control" placeholder="Nom" value=""  >   
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form.control" placeholder="Password" value="" >   
                    </div>

                        <input type="submit">
                </form>
            </div>
        </div>
    </div>








<?php


function trojan($data){
    $data = trim($data); //Enleve les caractères invisibles
    $data = addslashes($data); //Mets des backslashs devant les ' et les  "
    $data = htmlspecialchars($data); // Remplace les caractères spéciaux par leurs symboles comme ­< devient &lt;
    
    return $data;
}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>