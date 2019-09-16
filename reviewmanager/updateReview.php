<?php
    session_start();

    $ID = trim(filter_input(INPUT_POST, 'ID', FILTER_VALIDATE_INT));
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING));

    if(empty($ID) || empty($title) || empty($content)){
        $error = 'Invalid Entry, NO SOUP FOR YOU';
        include('../views/error.php');
    } else{
        require_once('../models/db.php');

        $statement = $db->prepare('UPDATE reviews
                                   SET title = :title, content = :content
                                   WHERE ID = :rID');

        $statement->bindParam(':rID', $ID);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':content', $content);

        $statement->execute();

        header('Location: ../index.php');
    }
?>