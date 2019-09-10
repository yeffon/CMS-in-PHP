<?php
  $dsn = 'mysql:host=localhost;port=3308;dbname=vacation_reviews';
  $username = 'root';
  $pw = '';

  try {
    $db = new PDO($dsn, $username, $pw);

  } catch (PDOException $e) {
    $errorMessage = $e->getMessage();
    exit();
  }

 ?>