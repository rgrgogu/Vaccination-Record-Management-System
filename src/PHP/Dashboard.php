<?php
require('../PHP DATABASE/HealthDetails.php');
require('../PHP DATABASE/Dosage.php');
session_start();

$newPerson = $_SESSION['object'];
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../CSS/NavigationBar.css" />
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class="bx bx-menu" id="header-toggle"></i>
        </div>
        <div class="header_img">
            <img src="../../files/imgs/logo.png" alt="" />
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <i class="bx bx-layer nav_logo-icon"></i>
                    <span class="nav_logo-name">DASHBOARD</span>
                </a>
                <div class="nav_list">
                    <a onclick="home()" class="nav_link active">
                        <i class="bx bx-grid-alt nav_icon"></i>
                        <span class="nav_name">Menu</span>
                    </a>

                    <a onclick="btnProfile()" class="nav_link">
                        <i class="bx bx-user nav_icon"></i>
                        <span class="nav_name">My Profile</span>
                    </a>
                    <a onclick="btnMy()" class="nav_link">
                        <i class="bx bx-folder nav_icon"></i>
                        <span class="nav_name">My VaxDetails</span>
                    </a>
                    <a href="?vaxCom" class="nav_link">
                        <i class="bx bx-bar-chart-alt-2 nav_icon"></i>
                        <span class="nav_name">Community Tracker</span>
                    </a>
                </div>
            </div>
            <a onclick="signOut()" class="nav_link">
                <i class="bx bx-log-out nav_icon"></i>
                <span class="nav_name">Sign Out</span>
            </a>
        </nav>
    </div>

    <!-- CONTENT -->
    <div class="height-100" id="load_home">
        <div class="col pt-4" id="home">
            <h3>Welcome! <?php echo $newPerson->getFullName() ?></h3>
            <p class="lead">Today is <?php echo date("l") . "! " . date("M. d, Y") ?></p>
            <hr />
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../../files/imgs/banner1.jpg" alt="1st slide" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../files/imgs/banner2.jpg" alt="2nd slide" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../files/imgs/banner3.jpg" alt="3rd slide" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../files/imgs/banner4.jpg" alt="4th slide" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../files/imgs/banner4.png" alt="5th slide" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../files/imgs/banner5.jpg" alt="6th slide" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../files/imgs/banner6.jpg" alt="7th slide" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../files/imgs/banner7.jpg" alt="8th slide" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../files/imgs/banner8.jpg" alt="9th slide" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../files/imgs/banner9.png" alt="10th slide" />
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <hr />
            <iframe class="vh-100 w-100" src="https://app.powerbi.com/view?r=eyJrIjoiMzliZTBjZWQtNjcwYi00YmM3LWFjYjktZDNjYWRjNDdiMmJmIiwidCI6IjM3ZDFjZmJmLTM1NTMtNDc5ZS1iOGM0LTVhZDdkNjNkNDM4MyIsImMiOjEwfQ%3D%3D" frameborder="0"></iframe>
        </div>

        <section>
            <div class="col pt-4 pe-4" id="myImmunization">
                <div class="pb-3">
                    <h1>VACCINATION CARD</h1>
                    <hr />
                    <p>
                        This digital vaccine card includes your immunization car, medical
                        information about the vaccine you have received.
                    </p>
                    <p>QUEZON CITY HEALTH DEPARTMENT</p>
                </div>
                <form class="row g-3 pb-3 bg-danger bg-opacity-10 border border-danger border-start-0 border-end-0">
                    <div class="col-md-4">
                        <label for="" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="" value="<?php echo $newPerson->getLastName() ?>" disabled />
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Given Name</label>
                        <input type="text" class="form-control" id="" value="<?php echo $newPerson->getGivenName() ?>" disabled />
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="" value="<?php echo $newPerson->getMiddleName() ?>" disabled />
                    </div>
                    <div class="col-md-1">
                        <label for="" class="form-label">Suffix</label>
                        <input type="text" class="form-control" id="" value="<?php echo $newPerson->getSuffix() ?>" disabled />
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Date of Birth</label>
                        <input type="text" class="form-control" id="" value="<?php echo $newPerson->getBirthday() ?>" disabled />
                    </div>
                    <div class="col-md-2">
                        <label for="" class="form-label">Sex</label>
                        <input type="text" class="form-control" id="" value="<?php echo $newPerson->getSex() ?>" disabled />
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">PhilHealth Number</label>
                        <input type="text" class="form-control" id="" value="<?php echo $newPerson->getPhilhealth() ?>" disabled />
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Category</label>
                        <input type="text" class="form-control" id="" value="<?php echo $newPerson->getCategory() ?>" disabled />
                    </div>
                </form>
                <br />
                <div class="col p-3">
                    <form class="row g-2 shadow rounded p-3">
                        <div class="h4 pb-2 text-danger border-bottom border-danger">
                            1st Dosage
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Vaccined Date</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getFirstDosage()->getVaccineDate() ?>" disabled />
                        </div>
                        <div class="col-md-5">
                            <label for="" class="form-label">Vaccine Manufacturer</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getFirstDosage()->getVaccineManufacturer() ?>" disabled />
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Lot Number</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getFirstDosage()->getLotNumber() ?>" disabled />
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Vaccinator Name</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getFirstDosage()->getVaccinatorName() ?>" disabled />
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Approved By</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getFirstDosage()->getApprovedBy() ?>" disabled />
                        </div>
                    </form>
                    <br />
                    <form class="row g-2 shadow rounded p-3">
                        <div class="h4 pb-2 text-danger border-bottom border-danger">
                            2nd Dosage
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Vaccined Date</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getSecondDosage()->getVaccineDate() ?>" disabled />
                        </div>
                        <div class="col-md-5">
                            <label for="" class="form-label">Vaccine Manufacturer</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getSecondDosage()->getVaccineManufacturer() ?>" disabled />
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Lot Number</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getSecondDosage()->getLotNumber() ?>" disabled />
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Vaccinator Name</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getSecondDosage()->getVaccinatorName() ?>" disabled />
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Approved By</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getSecondDosage()->getApprovedBy() ?>" disabled />
                        </div>
                    </form>
                    <br />
                    <form class="row g-2 shadow rounded p-3">
                        <div class="h4 pb-2 text-danger border-bottom border-danger">
                            1st Booster
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Vaccined Date</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getFirstBooster()->getVaccineDate() ?>" disabled />
                        </div>
                        <div class="col-md-5">
                            <label for="" class="form-label">Vaccine Manufacturer</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getFirstBooster()->getVaccineManufacturer() ?>" disabled />
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Lot Number</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getFirstBooster()->getLotNumber() ?>" disabled />
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Vaccinator Name</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getFirstBooster()->getVaccinatorName() ?>" disabled />
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Approved By</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getFirstBooster()->getApprovedBy() ?>" disabled />
                        </div>
                    </form>
                    <br />
                    <form class="row g-2 shadow rounded p-3">
                        <div class="h4 pb-2 text-danger border-bottom border-danger">
                            2nd Booster
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Vaccined Date</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getSecondBooster()->getVaccineDate() ?>" disabled />
                        </div>
                        <div class="col-md-5">
                            <label for="" class="form-label">Vaccine Manufacturer</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getSecondBooster()->getVaccineManufacturer() ?>" disabled />
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Lot Number</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getSecondBooster()->getLotNumber() ?>" disabled />
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Vaccinator Name</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getSecondBooster()->getVaccinatorName() ?>" disabled />
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Approved By</label>
                            <input type="text" class="form-control" id="" value="<?php echo $newPerson->getSecondBooster()->getApprovedBy() ?>" disabled />
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section>
            <div class="col pt-4" id="myProfile">
                <div class="pb-3">
                    <h1>MY PROFILE</h1>
                    <hr />
                </div>
                <form class="row g-2 shadow rounded p-3">
                    <div class="h4 pb-2 text-danger border-bottom border-danger">
                        <b>GENERAL INFORMATION</b>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="" value="<?php echo $newPerson->getLastName() ?>" />
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Given Name</label>
                        <input type="text" class="form-control" id="" value="<?php echo $newPerson->getGivenName() ?>" />
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="" value="<?php echo $newPerson->getMiddleName() ?>" />
                    </div>
                    <div class="col-md-1">
                        <label for="" class="form-label">Suffix</label>
                        <input type="text" class="form-control" id="" value="<?php echo $newPerson->getSuffix() ?>" />
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Date of Birth</label>
                        <input type="text" class="form-control" id="" value="<?php echo $newPerson->getBirthday() ?>" />
                    </div>
                    <div class="col-md-1">
                        <label for="" class="form-label">Sex</label>
                        <input type="text" class="form-control" id="" value="<?php echo $newPerson->getSex() ?>" />
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="" value="<?php echo $newPerson->getEmail() ?>" disabled />
                    </div>
                    <div class="col-md-5">
                        <label for="" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="" value="<?php echo $newPerson->getMobileNum() ?>" />
                    </div>
                </form>
                <br>
                <form class="row g-2 shadow rounded p-3">
                    <div class="h4 pb-2 text-danger border-bottom border-danger">
                        <b>LOCATION</b>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">CITY</label>
                        <input type="text" class="form-control" id="" />
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">HOUSE #</label>
                        <input type="text" class="form-control" id="" />
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">STREET</label>
                        <input type="text" class="form-control" id="" />
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">BARANGAY</label>
                        <input type="text" class="form-control" id="" />
                    </div>
                    <div class="col-md-2">
                        <label for="" class="form-label">ZIP CODE</label>
                        <input type="text" class="form-control" id="" />
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">ADDRESS TYPE</label>
                        <input type="text" class="form-control" id="" />
                    </div>
                </form>
                <br>
                <form class="row g-2 shadow rounded p-3">
                    <div class="h4 pb-2 text-danger border-bottom border-danger">
                        <b>SOCIAL MEDIA</b>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">FACEBOOK</label>
                        <input type="text" class="form-control" id="" />
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">INSTAGRAM</label>
                        <input type="text" class="form-control" id="" />
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">TWITTER</label>
                        <input type="text" class="form-control" id="" />
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">VAXPRESS</label>
                        <input type="text" class="form-control" id="" />
                    </div>
                </form>
                <br>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../JS/NavigationBar.js"></script>
    <script src="../JS/Actions.js"></script>
</body>

</html>