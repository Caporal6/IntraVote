<?php
// On démarre toujours la session en haut et dans tous les fichiers.
session_start();
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

$nom = $mdp =  "";
$nomErreur = $mdpErreur = "";
$erreur = false;

if (isset($_POST['update']) && !empty($_GET['varname'])){
 
    if(empty($_POST["nom"])){
        $nomErreur = "Le nom ne peut pas être vide";
        $erreur  = true;
    }
    else{
        $nom = trojan($_POST["nom"]);
    }

    if(empty($_POST["mdp"])){
        $mdpErreur = "Entrez un bon Mot de passe ?";
        $erreur  = true;
    }
    else{
        $mdp = trojan($_POST["mdp"]);
        $mdp = sha1($mdp);
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

    $conn->query('SET NAMES utf8'); $sql = "UPDATE user SET nom = '$nom', password = '$mdp' WHERE id='$id'";
    $result = $conn->query($sql);

        if ($result) {
            header('Location: evenement.php');   
    } else {
        echo "0 results";
    }
    $conn->close();

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

    $conn->query('SET NAMES utf8'); $sql = "SELECT * FROM user WHERE id='$id'";
    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            $nomA = $row['nom'];
            $mdpA = $row['password'];
        }
    } else {
        echo "0 results";
    }
    $conn->close();


?>


    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action="">


                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nom" class="form.control" placeholder="Nom" value="<?php echo $nomA;?>"  >   
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" name="mdp" class="form.control" placeholder="Password" value="<?php echo $mdpA;?>" >   
                    </div>

                        <input type="submit" name="update">
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