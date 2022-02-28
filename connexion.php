<?php
    try{
        $pdo=new PDO("mysql:host=localhost;dbname=gsb","root","");
     }
     catch(PDOException $e){
        echo $e->getMessage();
     } 
?>