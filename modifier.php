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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
    
<?php
    $var_value = $_GET['varname'];
    $id = $var_value;

$nom = $lieux = $date = $heure = $description = $departement = $vote = "";
$nomErreur = $lieuxErreur = $dateErreur = $heureErreur = $descriptionErreur = $departementErreur = $voteErreur = "";
$erreur = false;

if (isset($_POST['update']) && !empty($_GET['varname'])){
 
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

    $conn->query('SET NAMES utf8'); $sql = "UPDATE evenement SET nom = '$nom', lieux = '$lieux', date = '$date', heure = '$heure', description = '$description', departement = '$departement' WHERE id='$id'";
    $result = $conn->query($sql);

        if ($result) {
            header('Location: evenement.php');   
    } else {
        echo "0 results";
    }
    $conn->close();

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

    $conn->query('SET NAMES utf8'); $sql = "SELECT * FROM evenement WHERE id='$id'";
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


    <div class="container h-100 ">

        <div class="row">
            <div class="col-12">
                <form method="post" action="">


                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nom" class="form.control" placeholder="Nom" value="<?php echo $nomT;?>"  required>   
                    </div>

                    <div class="form-group">
                        <label for="">Lieux</label>
                        <input type="text" name="lieux" class="form.control" placeholder="Lieux" value="<?php echo $lieuxT;?>" required>   
                    </div>

                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" name="date" class="form.control" placeholder="Date" value="<?php echo $dateT;?>" required>   
                    </div>
                    
                    <div class="form-group">
                        <label for="">Heure</label>
                            <input type="time" name="heure" class="form.control" placeholder="Heure" value="<?php echo $heureT;?>" required>     
                    </div>

                    <div class="form-group">
                    <label for="">Description</label>
                        <textarea class="form-control w-50" name="description" rows="3" required><?php echo $descriptionT;?></textarea>  
                    </div>

                    <div class="form-group">
                        <label for="">Département</label>
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

                        <input type="submit" class="btn btn-primary btn-lg active mt-3" name="update">
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