<?php
session_start();
include('./DBConnection.php');

// REGISTER ACCOUNT
if (isset($_POST['btnLogin'])) {
    $username = $_POST['txtLUsername'];
    $password = $_POST['txtLPassword'];

    $query = "SELECT * FROM client_login WHERE username='$username' AND password='$password' LIMIT 1";
    $check_Run = mysqli_query($conn, $query);
    $check = mysqli_fetch_array($check_Run);

    if(isset($check)){
        header('Location: ../PHP/Dashboard.php');
    }
    else{
        $_SESSION['message'] = "Invalid username or password! Try again!";
        header('Location: ../../index.php');
    }
} else {
    header('Location: ../../index.php');
    exit(0);
}
?>