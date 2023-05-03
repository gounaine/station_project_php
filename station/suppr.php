<?php
session_start();

if(!isset($_SESSION['username'])){
   header("Location: formms.html"); // اذهب إلى صفحة تسجيل الدخول إذا لم يتم تسجيل الدخول
   exit();
}


    $pdo = new PDO('mysql:host=localhost;dbname=mydb','root','');
    if(isset($_POST['supp'])){
        $id = $_POST['id'];
        $sqlState = $pdo->prepare('DELETE FROM personne WHERE id=?');
        $result = $sqlState->execute([$id]);
        header('location: afficher_donner_perso.php');
    }

?>
