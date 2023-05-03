<?php
session_start();

if(!isset($_SESSION['username'])){
   header("Location: formms.html"); // اذهب إلى صفحة تسجيل الدخول إذا لم يتم تسجيل الدخول
   exit();
}

    $pdo = new PDO('mysql:host=localhost;dbname=mydb','root','');
    if(isset($_POST['mod1'])){
        $id = $_POST['id'];
        $sqlState = $pdo->prepare('SELECT * FROM personne WHERE id=?');
        $sqlState->execute([$id]);
        $result= $sqlState->fetch(PDO::FETCH_OBJ);}
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Document</title>
          <style>
            body{
       
            }
            p{
              font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
              font-size: medium;
            
             

            }
            h5{
              font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }
            div{
              border-radius: 10px;
              border: 1px solid ;
              width: 50%;
              
              
              
            }
         

          </style>
        </head>
        <body>
        <CENter> <h5 class="btn btn-outline-info"><?= $result->nom ?> <?= $result->prenom ?></h5></CENter> 
        <center>  <div>
  <center> 
    <table class="table table-striped ">
    <tr><th><h5>Nom:</h5></th><td><p> <?= $result->nom ?></p></td></tr>    
    <tr><th><h5>prenom:</h5></th><td><p> <?= $result->prenom ?></p></td></tr>    
    <tr> <th><h5>N°ID:</h5></th> <td><?= $result->nid ?></p></td> <p> </tr> 
           <tr><th><h5>N°cin:</h5></th><td><p> <?= $result->ncin ?></p></td></tr>   
           <tr><th> <h5>Age:</h5> </th><td> <p> <?= $result->age ?></p></td></tr>   
           <tr><th>  <h5>Genre:</h5>  </th><td>  <p> <?= $result->genre ?></p></td></tr>   
           <tr><th><h5>Adress:</h5> </th><td>  <p> <?= $result->adresse ?></p></td></tr>   
           <tr><th>  <h5>Adresse email:</h5> </th><td>  <p> <?=$result->email ?></p></td></tr>   
           <tr><th><h5>Numero-tel:</h5></th><td><p> <?= $result->tele ?></p></td></tr>   
           <tr><th>  <h5>Situation matrimoniale:</h5>  </th><td>  <p> <?= $result->situationm ?></p></td></tr>   
           <tr><th> <h5>Niveau scoulaire:</h5>   </th><td> <p> <?= $result->niveaus ?></p></td></tr>   
           <tr><th>  <h5>Enfants mineurs à charge:</h5>   </th><td>
  <p> <?= $result->enfantm ?></p></td></tr>   
           <tr><th>  <h5>Année d'expérience:</h5>  </th><td>  <p> <?= $result->annex ?></p></td></tr>   
           <tr>
            <form method="post">
           <input formaction="afficher_donner_perso.php" id="in" class="btn btn-success float-end" type="submit" name="mod1" value="<-back">
            </form>
           </tr>
           <br>
           <br>
            
  </table>
       
    </center>
 </div></center>
        </body>
        </html>
