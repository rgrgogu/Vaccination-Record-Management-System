<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

  <link rel="stylesheet" href="./src/CSS/Login.css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
  <section class="h-100 gradient-form">
    <?php include('./src/PHP DATABASE/Message.php') ?>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
                  <div class="text-center">
                    <img src="./files/imgs/logo.png" style="width: 75px" alt="logo" />
                    <h4 class="mt-1 mb-4 pb-1">
                      VAXpress: A Vaccine Record Management System
                    </h4>
                  </div>

                  <form action="./src/PHP DATABASE/ClientLogin.php" method="POST">
                    <p class="text-center">Please login to your account</p>

                    <div class="form-outline mb-4">
                      <input type="text" class="form-control" placeholder="Username" name="txtLUsername" required />
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" class="form-control" placeholder="Password" name="txtLPassword" required />
                    </div>

                    <div class="text-center pt-1 mb-5 pb-1 row p-5">
                      <button class="btn btn-block gradient-custom-2 mb-3 text-white" type="submit" name="btnLogin">
                        Log in
                      </button>
                      <button class="btn btn-transparent text-muted text-decoration-underline" type="button" data-bs-toggle="modal" data-bs-target="#viewForgotPassword">
                        Forgot Password?
                      </button>
                    </div>

                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">Don't have an account?</p>
                      <button type="button" class="btn text-danger" data-bs-toggle="modal" data-bs-target="#registerModal">
                        Create new
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="./files/imgs/slider1.jpg" alt="" width="100%" />
                      </div>
                      <div class="carousel-item">
                        <img src="./files/imgs/slider2.jpg" alt="" width="100%" />
                      </div>
                      <div class="carousel-item">
                        <img src="./files/imgs/slider3.jpg" alt="" width="100%" />
                      </div>
                    </div>
                  </div>
                  <h4 class="my-4">We are more than just a company</h4>
                  <p class="small mb-0">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- REGISTER MODAL -->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle pb-1" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>
            REGISTER ACCOUNT
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="rForm" name="rForm" action="./src/PHP DATABASE/ClientRegister.php" method="POST" required>
          <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="txtRUsername" placeholder="Username" required />
              <label for="txtUsername">Username</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" name="txtRPassword" placeholder="Password" required />
              <label for="txtPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" name="txtRConfirm" placeholder="Password" required />
              <label for="txtConfirm">Confirm Password</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control" name="txtRAge" placeholder="Age" required />
              <label for="txtAge">Age</label>
            </div>
            <div class="form-floating mb-3">
              <input type="date" class="form-control" name="txtRBday" placeholder="Birthdate" required />
              <label for="txtBday">Birthdate</label>
            </div>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" name="txtREmail" placeholder="E-mail Address" required />
              <label for="txtEmail">Email Address</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-success" name="btnRCreate">
              Create
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- FORGOT PASSWORD -->
  <div class="modal fade" id="viewForgotPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">
            Update Password
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="txtFUsername" placeholder="Username" />
              <label for="txtFUsername">Username</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="txtFPassword" placeholder="Password" />
              <label for="txtFPassword">Password</label>
            </div>
            <button type="button" class="btn btn-outline-primary" id="btnFUpdate">
              Update
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <script src="./src/JS/Login.js"></script>
</body>

</html>