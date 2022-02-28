<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("connexion"))
      $bienvenue="Bonjour ".
      $_SESSION["prenomNom"];
      $poste="Vous êtes un ".
      $_SESSION["poste"];
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <link href="style.css" rel="stylesheet">
   </head>
   <body onLoad="document.fo.login.focus()">
      <h2><?php echo $bienvenue?></h2>
      <h2><?php echo $poste?></h2>
      <a href="deconnexion.php">Se déconnecter</a>
      <br>
      <a href="Saisir_fiche_de_frais.php">Saisie de fiche de frais</a>
      <br>
      <a href="Mes_fiches_de_frais.php">Mes fiches de frais</a>
      <br>
   </body>
</html> 