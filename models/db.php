<?php
  $dsn = 'mysql:host=localhost;dbname=vacation_reviews';
  $username = 'root';
  $pw = '';

  try {
    $db = new PDO($dsn, $username, $pw);

  } catch (PDOException $e) {
    $errorMessage = $e->getMessage();
    exit();
  }

 ?>