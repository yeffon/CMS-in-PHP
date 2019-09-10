<?php
session_start();

$Email = trim(filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_STRING));
$PW = trim(filter_input(INPUT_POST, 'PW', FILTER_SANITIZE_STRING));

    if (!isset($Email, $PW) ) {       
        die ('Please fill both the email and password field!');
        
    } else {
        require_once('../models/db.php');

        $stmt = $db->prepare('SELECT ID, PW FROM users WHERE Email = :email');
        $stmt->bindParam(':email', $Email);
        $stmt->execute();
        $count = $stmt->rowCount();
    
        if ($count > 0) {
            $result = $stmt->fetch();
    
            // Account exists, verify the password.
            if (password_verify($PW, $result['PW'])) {
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['Email'];
                echo 'Welcome ' . $_SESSION['name'] . '!';
            } else {
                echo 'Incorrect password!';
                
            }
            
            header('Location: ../index.php');
        }         
    }
?>