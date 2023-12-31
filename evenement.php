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
    <link rel="stylesheet"  href="css/styleEvenement.css" /> 
    <script src="https://kit.fontawesome.com/e1c2b55580.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>


<?php
$ip = 0;

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



    $servername = "cours.cegep3r.info";
    $username = "2130649";
    $password = "2130649";
    $dbname = "2130649-ricard-xavier";



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


    <div class="container ">
        <div class="row">
            <div class="col-8  ">
                <form method="post" action="evenement.php">
                <p>-Ajouter un Évenement-</p>

                    <div class="form-group ">
                        <label for="">Nom: </label>
                        <input type="text" name="nom" class="form.control" placeholder="Nom" value="" required>   
                    </div>

                    <div class="form-group">
                        <label for="">Lieux: </label>
                        <input type="text" name="lieux" class="form.control" placeholder="Lieux" value="" required>   
                    </div>

                    <div class="form-group">
                        <label for="">Date: </label>
                        <input type="date" name="date" class="form.control" placeholder="Date" value="" required>   
                    </div>
                    
                    <div class="form-group">
                        <label for="">Heure: </label>
                        <input type="time" name="heure" class="form.control" placeholder="Heure" value="" required>   
                    </div>

                    <div class="form-group">
                        <label for="">Description: </label>
                        <textarea class="form-control w-50" name="description" placeholder="Description" rows="3" maxlength="250" required></textarea>  
                    </div>

                    <div class="form-group">
                        <label for="">Département: </label>
                        <!--<input type="text"  class="form.control" placeholder="Département" value="" > -->
                            <select class="form-control w-50" name="departement">
                                <option>Techniques de design dinterieur</option>
                                <option>Technologie du genie metallurgique</option>
                                <option>Techniques de la documentation</option>
                                <option>Techniques d’hygiène dentaire</option>
                                <option>Techniques de diététique</option>
                                <option>Techniques de soins infirmiers</option>
                                <option>Techniques de soins infirmiers destiné aux infirmières auxiliaires</option>
                                <option>Techniques de travail social</option>
                                <option>Techniques d’éducation à l’enfance</option>
                                <option>Techniques policières</option>
                                <option>Techniques de génie mécanique</option>
                                <option>Techniques de l’informatique</option>
                                <option>Technologie de l’architecture</option>
                                <option>Technologie de la mécanique du bâtiment (Génie du bâtiment)</option>
                                <option>Technologie de la mécanique industrielle (maintenance)</option>
                                <option>Technologie du génie civil</option>
                                <option>Technologie du génie électrique – Automatisation et contrôle</option>
                                <option>Technologie du génie électrique : Électronique programmable</option>
                                <option>Technologie du génie industriel</option>
                            </select>   
                    </div>



                        <input type="submit" class="btn btn-primary btn-lg active mt-3">
                </form>



            </div>


            <div class="col-4  ">
                <div class="row d-flex justify-content-end">
                    <div class="col-1  d-flex justify-content-center flex-wrap align-content-center">
                    <i class="fa-regular fa-circle-user fa-2xl" style="color: #ffffff;"></i>
                    </div>


                    <div class="col-4  d-flex justify-content-center flex-wrap align-content-center">
                    <a href="toutAdmin.php" aria-pressed="true"><p><?php echo $_SESSION["utilisateur"] ?></p></a>
                    </div>


                    <div class="col-4  d-flex justify-content-start flex-wrap align-content-center ">
                    
                    <a href="Index.php">
                        <i class="fa-solid fa-right-from-bracket fa-2xl">
                        </i>
                    </a>
                        </div>
            
                </div>
            </div>

        </div>

    </div>


<div class="container mb-5">
    <div class="row mt-5 ">
        <div class="col-12 ">
            <table class="table ">
                <thead>
                    <tr>
        
                        <th scope="col">nom</th>
                        <th scope="col">lieux</th>
                        <th scope="col">date</th>
                        <th scope="col">heure</th>
                        <th scope="col">voté</th>
                        <th scope="col">Information</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>

                    </tr>
                </thead>
                <tbody >
    
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

                        $conn->query('SET NAMES utf8'); $sql = "SELECT * FROM evenement";
                        $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                        // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $var_value = $row["id"];
                                echo '<tr><th scope="row">'. $row["nom"].'</th>
                                <td>'. $row["lieux"].'</td>
                                <td>'. $row["date"].'</td>
                                <td>'. $row["heure"].'</td> 
                                <td><a href="choixVote.php?varname='.$var_value.'" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Voter</a></td>
                                <td><a href="information.php?varname='.$var_value.'" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Information</a></td>
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