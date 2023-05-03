<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Modifier</title>
<style>
    select{
        display: block;
    }
    select,input{
        width:300px
    }
</style>
    
</head>
<body>
    <?php
  session_start();

  if(!isset($_SESSION['username'])){
     header("Location: formms.html"); // اذهب إلى صفحة تسجيل الدخول إذا لم يتم تسجيل الدخول
     exit();
  }
        if(!isset($_POST['id'])){
            header('location: afficher_donner_perso.php');
        }

        
        $pdo = new PDO('mysql:host=localhost;dbname=mydb','root','');

 
    ?>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle w-50 p-3">
            <div class="border  p-3">
                <br>
                <h2 class="text text-center">Page d'Modifier</h2>
                <br>
                <?php
                    $id = $_POST['id'];
                    $sqlState = $pdo->prepare('SELECT * FROM personne WHERE id=?');
                    $sqlState->execute([$id]);
                    $result= $sqlState->fetch(PDO::FETCH_OBJ);
                
                  

                       
                ?>
       <form method="post">
        <input  formaction="afficher_donner_perso.php" id="in" class="btn btn-success " type="submit" name="mod1" value="<-back">
         </form>
                <br>
                <form class="form-group" action="mod-tt.php" method="post" >
                    <input type="hidden" name="id" value="<?=$result->id?>">
        
        <label>Nom:</label>
        <input type="text" name="nom" placeholder="Nom" required value="<?=$result->nom ?>"> <br>
        <label>Prenom:</label>
        <input type="text" name="Prenom" placeholder="Prenom"> <br>
        <label>N°ID:</label>
        <input type="text" name="N°ID" placeholder="N°ID"> <br>
        <label>N°cin:</label>
        <input type="text" name="N°cin" placeholder="N°cin"> <br>
        <label>Age:</label>
        <input type="text" name="Age" placeholder="Age"> <br>
        <label>Genre:</label>
        <select  class="custom-select my-1 mr-sm-2" name="f" id="" required>
            <option value="" >select</option>
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
        </select>
        <label>Adresse:</label>
        <input type="text" name="Adresse" placeholder="Adresse"> <br>
        <label>Email:</label>
        <input type="email" name="Email" placeholder="Email"> <br>
        <label>tele:</label>
        <input type="tel" name="tele" placeholder="tele"> <br>
        <label>Situation matrimoniale:</label>
        <select class="custom-select my-1 mr-sm-2" name="s">
            <option value="" >select</option>
            <option value="Marie(e)">Marie(e)</option>
            <option value="Celebataire(e)">Celebataire(e)</option>
            <option value="Divorce(e)">Divorce(e)</option>
        </select>
    
        <label>Niveau Scolaire:</label>
        <select class="custom-select my-1 mr-sm-2" name="Ns" id="">
            <option value="" >select</option>
            <option value="Formation professionnelle au bac+2(+3)">Formation professionnelle au bac+2(+3)</option>
            <option value="Primaire">Primaire</option>
            <option value="Lycée">Lycée</option>
            <option value="Collège">Collège</option>
            <option value="supérieur">supérieur</option>
            <option value="Aucun">Aucun</option>
            
        </select>
        <label>Enfants mineurs à charge:</label>
        <input type="number" placeholder="Enfants mineurs à charge" name="Nf" id=""> <br>
        <label>Année d'expérience :</label>
        <input type="number" placeholder="Année d'expérience " name="Ax" id="">
        <input type="submit" name='kok' class="btn-dark">
</form></div></center>
            </div>
        </div>
    </div>
</body>
</html>