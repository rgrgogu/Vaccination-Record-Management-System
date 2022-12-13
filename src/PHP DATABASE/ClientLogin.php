<?php
session_start();
include('./DBConnection.php');
require('./HealthDetails.php');
require('./Dosage.php');

// LOGIN ACCOUNT
if (isset($_POST['btnLogin'])) {
    $email = $_POST['txtLEmail'];
    $password = $_POST['txtLPassword'];

    $query = "  SELECT email_name, password, client_login.email_id
                FROM `client_login` 
                INNER JOIN email ON (client_login.email_id = email.email_id)
                WHERE email.email_name='$email' AND password='$password'";

    try {
        $check_Run = mysqli_query($conn, $query);

        if ($check = mysqli_fetch_array($check_Run)) {
            $query1 = "
                SELECT clientID, lName, gName, mName, suffix, sex, mobileNum, email.email_name, client_login.birthday, client_login.age, client_health.ph_num, category.category_name
                FROM `client_info` 
                INNER JOIN client_login ON (client_info.clientID = client_login.email_id)
                INNER JOIN email ON (client_login.email_id = email.email_id)
                INNER JOIN client_health ON (client_info.clientID = client_health.healthID)
                INNER JOIN category ON (client_health.categoryID = category.categoryID)
                WHERE clientID = '$check[2]';
            ";

            $query2 = "
                SELECT first_dosage.vaccineDate, first_dosage.vaccineManufacturer, first_dosage.lotNumber, first_dosage.vaccinatorName, first_dosage.approvedBy, 
                second_dosage.vaccineDate, second_dosage.vaccineManufacturer, second_dosage.lotNumber, second_dosage.vaccinatorName, second_dosage.approvedBy, 
                first_booster.vaccineDate, first_booster.vaccineManufacturer, first_booster.lotNumber, first_booster.vaccinatorName, first_booster.approvedBy, 
                second_booster.vaccineDate, second_booster.vaccineManufacturer, second_booster.lotNumber, second_booster.vaccinatorName, second_booster.approvedBy
                FROM `first_dosage`
                INNER JOIN `second_dosage` ON (first_dosage.first_dosageID = second_dosage.second_dosageID)
                INNER JOIN `first_booster` ON (second_dosage.second_dosageID = first_booster.first_boosterID)
                INNER JOIN `second_booster` ON (first_booster.first_boosterID = second_booster.second_boosterID)
                WHERE first_dosageID = $check[2];
            ";

            // print $check1[0]; // client ID
            // print $check1[1]; // lName
            // print $check1[2]; // gName
            // print $check1[3]; // mName
            // print $check1[4]; // suffix
            // print $check1[5]; // sex
            // print $check1[6]; // mobileNum
            // print $check1[7]; // emailName
            // print $check1[8]; // birthday
            // print $check1[9]; // age
            // print $check1[10]; // philhealth
            // print $check1[11]; // category

            try {
                $check_Run1 = mysqli_query($conn, $query1);
                $check_Run2 = mysqli_query($conn, $query2);
                $check1 = mysqli_fetch_array($check_Run1);
                $check2 = mysqli_fetch_array($check_Run2);

                if (isset($check1)) {

                    $firstDosage = new Dosage(
                        $check2[0],
                        $check2[1],
                        $check2[2],
                        $check2[3],
                        $check2[4]
                    );

                    $secondDosage = new Dosage(
                        $check2[5],
                        $check2[6],
                        $check2[7],
                        $check2[8],
                        $check2[9]
                    );

                    $firstBooster = new Dosage(
                        $check2[10],
                        $check2[11],
                        $check2[12],
                        $check2[13],
                        $check2[14]
                    );

                    $secondBooster = new Dosage(
                        $check2[15],
                        $check2[16],
                        $check2[17],
                        $check2[18],
                        $check2[19]
                    );

                    $newPerson = new HealthDetails(
                        $check1[0], // clientID
                        $check1[1], // lName
                        $check1[2], // gName
                        $check1[3], // mName
                        $check1[4], // suffix
                        $check1[5], // sex
                        $check1[6], // mobileNum
                        $check1[7], // emailName
                        $check1[8], // birthday
                        $check1[9], // age
                        $check1[10], // philhealth
                        $check1[11], // category
                        $firstDosage, // firstDosage
                        $secondDosage, // secondDosage
                        $firstBooster, // firstBooster
                        $secondBooster // secondBooster
                    );

                    $_SESSION['object'] = $newPerson;

                    header('Location: ../PHP/Dashboard.php');
                }
            } catch (Exception $e) {
                $_SESSION['message'] = "Something went wrong! Please contact the administrator [ERR44]!";
                header('Location: ../../index.php');
            }
        } else {
            $_SESSION['message'] = "Invalid username or password! Try again! [ERR50]";
            header('Location: ../../index.php');
        }
    } catch (Exception $e) {
        echo $e;
        // $_SESSION['message'] = "Something went wrong! Please contact the administrator 1 !";
        // header('Location: ../../index.php');
    }
} else {
    header('Location: ../../index.php');
    exit(0);
}
