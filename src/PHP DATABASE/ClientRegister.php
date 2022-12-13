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
    $email = $_POST['txtREmail'];
    $password = $_POST['txtRPassword'];
    $confirmPass = $_POST['txtRConfirm'];
    $bday = $_POST['txtRBday'];
    $birthday = new DateTime($_POST['txtRBday']);
    $today = new DateTime(date('d.m.y'));
    $age = $today->diff($birthday)->y;

    if ($password == $confirmPass) {

        $checkEmail = "SELECT * FROM email WHERE email_name ='$email'";

        if ($check_run = mysqli_query($conn, $checkEmail)) {

            $rowcount = mysqli_num_rows($check_run);

            if ($rowcount == 0) {
                $_SESSION['message'] = 'Please contact the VAXpress administration to register your process!';
                header('Location: ../../index.php');
            } else {
                $row = mysqli_fetch_array($check_run);
                $query = "INSERT INTO client_login VALUES('$row[0]', '$password', '$confirmPass', '$bday', '$age')";
                try {
                    $query_run = mysqli_query($conn, $query);
                    $_SESSION['message'] = "Registered Successfully!";
                    header('Location: ../../index.php');
                    exit(0);
                } catch (Exception $e) {
                    $_SESSION['message'] = "Something went wrong! Please contact the administrator!";
                    header('Location: ../../index.php');
                }
            }
        }
    } else {
        $_SESSION['message'] = "Password do not matched";
        header('Location: ../../index.php');
    }
} else {
    header('Location: ./index.php');
    exit(0);
}
