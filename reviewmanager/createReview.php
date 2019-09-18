<?php
  session_start();

  $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
  $content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING));
  $images = $_FILES['images']['name'];
  
//return the image to see what is coming back
  if (empty($title) || empty($content) || empty($images)) {
    $error = 'Invalid Entry, No soup for you';
    include('../views/error.php');
  } else {
    require_once('../models/db.php');

      $statement = $db->prepare('INSERT INTO reviews(title, content, userFK, images)
                                 VALUES(:title, :content, :userFK, :images)');

      $statement->bindParam(':title', $title);
      $statement->bindParam(':content', $content);
      $statement->bindParam(':userFK', $_SESSION['userID']);
      $statement->bindParam(':images', $images);

      $statement->execute();

      move_uploaded_file($_FILES['images']['tmp_name'], '../userImgs/' . $images);

    

    header('Location: ../index.php');
  }
 ?>