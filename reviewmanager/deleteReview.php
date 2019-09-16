<?php
  session_start();
  $ID = trim(filter_input(INPUT_POST, 'ID', FILTER_VALIDATE_INT));

  require_once('../models/db.php');

  $statement = $db->prepare('DELETE FROM reviews
                             WHERE ID = :rID');
  $statement->bindParam(':rID', $ID);
  $statement->execute();

  header('Location: ../index.php');

?>
