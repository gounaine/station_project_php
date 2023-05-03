<?php
session_start();

if(!isset($_SESSION['username'])){
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
                        $id=$_POST['id'];
                        $nom = $_POST['nom'];
                        $prenom = $_POST['Prenom'];
                        $nid = $_POST['N°ID'];
                        $ncin = $_POST['N°cin'];
                        $age = $_POST['Age'];
                        $genre = $_POST['f'];
                        $adresse = $_POST['Adresse'];
                        $email = $_POST['Email'];
                        $tele = $_POST['tele'];
                        $situationm = $_POST['s'];
                        $niveaus = $_POST['Ns'];
                        $enfanm = $_POST['Nf'];
                        $annex = $_POST['Ax'];
                        $sql = "UPDATE personne SET  nom='$nom', prenom='$prenom', nid='$nid' , ncin='$ncin', age='$age' , genre='$genre' ,adresse='$adresse' ,  email='$email' , tele='$tele' , situationm='$situationm', niveaus='$niveaus' , enfantm='$enfanm' , annex='$annex' WHERE id='$id'  ";
                        if ($conn->query($sql) === TRUE) {
                        
                            
                                
                                header('Location:afficher_donner_perso.php');
                                exit;
                            
                            
                            
                            }else {
                                header('Location:formcnx.html');
                                exit;
                            }
                          
                            

$conn->close();
?>