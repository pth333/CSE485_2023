<?php 
    session_start();
    echo'Instructors Page';
    $userName = $_SESSION['username']; 
    $userPass = $_SESSION['password'];
    echo $userName."+".$userPass;
?>