<?php
session_start();
include('./DBConnection.php');

// REGISTER ACCOUNT VARIABLES
$username = "";
$password = "";
$confirmPass = "";
$age = "";
$birthday = "";
$email = "";

// REGISTER ACCOUNT
if (isset($_POST['btnRCreate'])) {
    $username = $_POST['txtRUsername'];
    $password = $_POST['txtRPassword'];
    $confirmPass = $_POST['txtRConfirm'];
    $age = $_POST['txtRAge'];
    $birthday = $_POST['txtRBday'];
    $email = $_POST['txtREmail'];

    if ($password == $confirmPass) {

        $checkEmail = "SELECT email FROM client_login WHERE email='$email'";
        $check_run = mysqli_query($conn, $checkEmail);

        if (mysqli_num_rows($check_run) > 0) {
            $_SESSION['message'] = 'E-mail already exists!';
            header('Location: ../../index.php');
        } else {

            $query = "INSERT INTO client_login VALUES('$username', '$password', '$confirmPass', '$age', '$birthday', '$email')";
            $query_run = mysqli_query($conn, $query);

            if ($query_run) {
                $_SESSION['message'] = "Registered Successfully!";
                header('Location: ../../index.php');
                exit(0);
            } else {
                $_SESSION['message'] = "Something went wrong!";
                header('Location: ../../index.php');
            }
        }
    } else {
        $_SESSION['message'] = "Password do not matched";
        header('Location: ../../index.php');
    }
}
else{
    header('Location: ./index.php');
    exit(0);
}




