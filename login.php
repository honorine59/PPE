<?php
   session_start();
   @$login=$_POST["login"];
   @$pass=$_POST["pass"];
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      include("connexion.php");
      $sel=$pdo->prepare("select * from utilisateur inner join poste on
      utilisateur.id_poste = poste.id where login=? and mdp=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["poste"]=ucfirst(strtolower($tab[0]["libelle"]));
         $_SESSION["autoriser"]="oui";
         header("location: accueil.php");
      }
      else
         $erreur="Mauvais login ou mot de passe!";
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <link href="style.css" rel="stylesheet">
   </head>
   <body onLoad="document.fo.login.focus()">
      <div class="erreur"><?php echo $erreur ?></div>
      <form method="post" action="">
         <input type="text" name="login" placeholder="Login" /><br />
         <input type="password" name="pass" placeholder="Mot de passe" /><br />
         <input type="submit" name="valider" value="Connexion" />
      </form>
   </body>
</html> 