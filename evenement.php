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
$nom = $lieux = $date = $heure = $description = $departement = $vote = "";
$nomErreur = $lieuxErreur = $dateErreur = $heureErreur = $descriptionErreur = $departementErreur = $voteErreur = "";
$erreur = false;
if ($_SERVER['REQUEST_METHOD'] == "POST"){
 
    if(empty($_POST["nom"])){
        $nomErreur = "Le nom ne peut pas être vide";
        $erreur  = true;
    }
    else{
        $nom = trojan($_POST["nom"]);
    }

    if(empty($_POST["lieux"])){
        $lieuxErreur = "Où ce situe l'évenement ?";
        $erreur  = true;
    }
    else{
        $lieux = trojan($_POST["lieux"]);
    }


    if(empty($_POST["date"])){
        $dateErreur = "Quand ce déroule l'évenement ?";
        $erreur  = true;
    }
    else{
        $date = trojan($_POST["date"]);
    }

    if(empty($_POST["heure"])){
        $heureErreur = "À qu'elle heure ce déroule l'évenement ?";
        $erreur  = true;
    }
    else{
        $heure = trojan($_POST["heure"]);
    }

    if(empty($_POST["description"])){
        $descriptionErreur = "Ouais la jsp ????";
        $erreur  = true;
    }
    else{
        $description = trojan($_POST["description"]);
    }

    if(empty($_POST["departement"])){
        $departementErreur = "Qu'elle département ?";
        $erreur  = true;
    }
    else{
        $departement = trojan($_POST["departement"]);
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

    $sql=" INSERT INTO  evenement(nom,lieux,date,heure,description,departement,vote)
    VALUES('$nom','$lieux','$date','$heure','$description','$departement','0')";

    if(mysqli_query($conn,$sql)){
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
                <form method="post" action="evenement.php">


                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nom" class="form.control" placeholder="Nom" value=""  >   
                    </div>

                    <div class="form-group">
                        <label for="">Lieux</label>
                        <input type="text" name="lieux" class="form.control" placeholder="Lieux" value="" >   
                    </div>

                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" name="date" class="form.control" placeholder="Date" value="" >   
                    </div>
                    
                    <div class="form-group">
                        <label for="">Heure</label>
                        <input type="text" name="heure" class="form.control" placeholder="Heure" value="" >   
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="description" class="form.control" placeholder="Description" value="" >   
                    </div>

                    <div class="form-group">
                        <label for="">Département</label>
                        <input type="text" name="departement" class="form.control" placeholder="Département" value="" >   
                    </div>



                        <input type="submit">
                </form>
            </div>
        </div>
    </div>


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

                        $conn->query('SET NAMES utf8'); $sql = "SELECT * FROM evenement";
                        $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                        // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo '<tr><th scope="row">'. $row["id"].'</th><td>'. $row["nom"].'</td><td>'. $row["lieux"].'</td><td>'. $row["date"].'</td>
                                <td>'. $row["heure"].'</td> <td>'. $row["description"].'</td> <td>'. $row["departement"].'</td> 
                                <td>'. $row["vote"].'</td>
                                <td>Mod</td>
                                <td>Supprimer</td>
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


        function trojan($data){
            $data = trim($data); //Enleve les caractères invisibles
            $data = addslashes($data); //Mets des backslashs devant les ' et les  "
            $data = htmlspecialchars($data); // Remplace les caractères spéciaux par leurs symboles comme ­< devient &lt;
            
            return $data;
        }

    ?>

<?php
  // Set session variables
    $_SESSION["connexion"] = true; 
    echo "La connexion est réussie" . $_SESSION["connexion"];
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>