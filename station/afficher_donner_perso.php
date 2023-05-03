<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page important</title>
    <style>
        #in{
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <?php
    session_start();

    if(!isset($_SESSION[''])){
       header("Location: formms.html"); // اذهب إلى صفحة تسجيل الدخول إذا لم يتم تسجيل الدخول
       exit();
    }
  $servername = "localhost";
  $usernam = "root";
  $passwor = "";
  $dbname = "mydb";
  $conn = new mysqli($servername, $usernam, $passwor, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
    ?>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="border border-5 p-3">
            
            <br>
            <br>
        <?php
        $sql = "SELECT * FROM personne";
        $result = mysqli_query($conn, $sql);
        
       
     

        ?>
        <table style="margin-left: 10%;;" class="table w-75 caption-top ">
            <form class="position-relative" action=""> 
                <input style="margin-left: 10px;"  formaction="formcnx.html" class="btn btn-dark float-end" type="submit" name="mod" value="Deconnexion">
            <input formaction="formInscription.html" class="btn btn-dark float-end" type="submit" name="mod" value="Ajouter"> 
        
           
            </form>
            
           
            
            <?php 
            if(isset($_POST['submit'])){
                header('formInscription.html');
                exit;
            }
            ?>
            <br>
            <br>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#Id</th>
                        
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Age</th>
                
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <th scope="row">#<?php echo $row['id'] ?></th>
                            <td><?php echo $row['nom']?></td>
                            <td><?php echo $row['prenom']?></td>
                            <td><?php echo $row['age']?></td>
                        <td>
                            <form method="post">
                             <input type="hidden" name='id' value="<?php echo $row['id']?>">
                            <input formaction="suppr.php" class="btn btn-danger ms-3 float-end" type="submit" name="supp" value="SUPPRIMER" onclick="return confirm('supprimer' <?php echo $row['prenom'] ?> <?php echo $row['nom']?> !!!!!')">
                            <input formaction="modifier_h.php" class="btn btn-primary float-end" type="submit" name="mod" value="MODIFIER">
                            <input formaction="view.php" id="in" class="btn btn-success float-end" type="submit" name="mod1" value="VOIR">
                            </form>
                        </td>
                    </tr>
                        <?php
                    }
                    ?>
                </tbody>
        </table>
        <br>
 
        <br>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
</body>
</html>