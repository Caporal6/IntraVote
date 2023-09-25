<?php
// On démarre toujours la session en haut et dans tous les fichiers.
session_start();
if(!isset($_POST['bon']) && !isset($_POST['boff']) && !isset($_POST['mauvais'])){
    $_SESSION['attnumBon'] = 1;
    $_SESSION['attnumBoff'] = 1;
    $_SESSION['attnumMauvais'] = 1;
}
else{
    if (isset($_POST['bon'])) {
        $_SESSION['attnumBon']++;
    } 
    elseif(isset($_POST['boff'])){
        $_SESSION['attnumBoff']++;
    }
    elseif(isset($_POST['mauvais'])){
        $_SESSION['attnumMauvais']++;
    }
}


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


    <div class="container container h-100 d-flex justify-content-center align-items-center">
        <div class="row ">
            <form method="post">
            <div class="col-4 d-flex justify-content-center ">
                <input name='bon' type="submit" value='+'>

            </div>

            <div class="col-4 d-flex justify-content-center">
                <input name='boff' type="submit" value='+'>
            </div>

            <div class="col-4 d-flex justify-content-center">
                <input name='mauvais' type="submit" value='+'>  
            </div>
            </form>
        </div>
    </div>

    <h3><em>Bon:<?php echo $_SESSION['attnumBon'] ?>: </em></h3>
    <h3><em>Boff:<?php echo $_SESSION['attnumBoff'] ?>: </em></h3>
    <h3><em>Mauvais:<?php echo $_SESSION['attnumMauvais'] ?>: </em></h3>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>