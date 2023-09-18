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
                    <input type="text" name="commentaire" class="form.control" placeholder="Lieux" value="" >   
                </div>

                <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" name="note" class="form.control" placeholder="Date" value="" >   
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
                                echo '<tr><th scope="row">'. $row["id"].'</th><td>'. $row["nom"].'</td><td>'. $row["lieux"].'</td><td>'. $row["date"].'</td><td>'. $row["heure"].'</td> <td>'. $row["description"].'</td> <td>'. $row["departement"].'</td> <td>'. $row["vote"].'</td></tr>';  }
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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>