<?php

    $host = 'localhost';
    $dbname = 'sitecomparon';
    $username = 'root';
    $password = '';
 
  try {
  
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
  } catch (PDOException $e) {
  
    die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());
    
  }


