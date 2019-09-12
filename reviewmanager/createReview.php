<?php
session_start();

  $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
  $content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING));

  if (empty($title) || empty($content)) {
    $error = 'Invalid Entry, No soup for you';
    include('../views/error.php');
  } else {
    require_once('../models/db.php');

    $statement = $db->prepare('INSERT INTO reviews(title, content)
                               VALUES(:title, :content)');

    $statement->bindParam(':title', $title);
    $statement->bindParam(':content', $content);

    $statement->execute();

    header('Location: ../index.php');
  }
 ?>