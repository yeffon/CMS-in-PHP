<?php
  //get the data and sanitize
  $FName = trim(filter_input(INPUT_POST, 'FName', FILTER_SANITIZE_STRING));
  $LName = trim(filter_input(INPUT_POST, 'LName', FILTER_SANITIZE_STRING));
  $Email = trim(filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_STRING));
  $PW = trim(filter_input(INPUT_POST, 'PW', FILTER_SANITIZE_STRING));

  //validate
  if (empty($FName) || empty($LName) || empty($Email) || empty($PW)) {
    $error = 'Invalid Entry, No soup for you';
    include('../views/error.php');
  } else {
    require_once('../models/db.php');

    $statement = $db->prepare('INSERT INTO users(FName, LName, Email, PW)
                               VALUES(:fname, :lname, :email, :pw)');

    //parameterize
    $statement->bindParam(':fname', $FName);
    $statement->bindParam(':lname', $LName);
    $statement->bindParam(':email', $Major);
    $statement->bindParam(':pw', $FavClass);

    $statement->execute();

    header('Location: ../index.php');
  }
 ?>