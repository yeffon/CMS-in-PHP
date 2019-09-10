<?php
session_start();

  //get the data and sanitize
  $FName = trim(filter_input(INPUT_POST, 'FName', FILTER_SANITIZE_STRING));
  $LName = trim(filter_input(INPUT_POST, 'LName', FILTER_SANITIZE_STRING));
  $Email = trim(filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_STRING));
  $PW = trim(filter_input(INPUT_POST, 'PW', FILTER_SANITIZE_STRING));
  $conPW = $_POST["conPW"];

  //validate
  if (empty($FName) || empty($LName) || empty($Email) || empty($PW)) {
    $error = 'Invalid Entry, No soup for you';
    include('../views/error.php');
  } elseif ($PW !== $conPW){
    $error = 'Passwords do not match';
    include('../views/error.php');
  } else {
    require_once('../models/db.php');

    $hashedPW = password_hash($PW, PASSWORD_DEFAULT);

    $statement = $db->prepare('INSERT INTO users(LName, FName, Email, PW)
                               VALUES(:lName, :fName, :eMail, :Pw)');

    //parameterize
    $statement->bindParam(':lName', $LName);
    $statement->bindParam(':fName', $FName);
    $statement->bindParam(':eMail', $Email);
    $statement->bindParam(':Pw', $hashedPW);

    $statement->execute();

    header('Location: ../index.php');
  }
 ?>