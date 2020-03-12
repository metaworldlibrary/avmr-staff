<?php
if(session_id() == ''){
  session_start();
}
//var_dump($_SESSION);
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AMVR - Staff Only</title>

  <!-- Icons-->
  <link rel="icon" href="img/logo2.ico">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
  <!-- Custom CSS-->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/admin.css">
</head>

<body class="site">
  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand" href="#" data-target="#main-content" data-slide-to="0"><img src="img/logo2.png" width="30" height="30" class="d-inline-block align-top mr-2" alt="">Amazing View - STAFF ONLY SECTION</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end text-white" id="navbarNav">
      <b><a id="navbar-sign-in-label"></a></b>
      <a class="btn btn-success m-2" id="navbar-dashboard-btn" href="#" data-target="#main-content" data-slide-to="6">Dashboard</a>
      <a class="btn btn-outline-primary m-2" id="navbar-sign-out">Sign out</a>
    </div>
  </nav>
  <!--/Navbar-->

  <!--Content-->
  <div class="site-content container-fluid d-flex align-item-center justify-content-center">
      <!--Sign in form-->
      <form class="form-signin column-center" id="login-form">
        <img class="mb-4" src="img/logo2.png" alt="" width="200" height="144">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="login_username" class="sr-only">Email address</label>
        <input type="text" id="login_username" class="form-control" placeholder="Email address or Username" required autofocus>
        <label for="login_password" class="sr-only">Password</label>
        <input type="password" id="login_password" class="form-control" placeholder="Password" required>

        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="button" id="form_send">Sign in</button>
      </form>
      <!--/Sign in form-->

      <!--Members area-->
      <div id="member-area" class="container-fluid column-center bg-light text-dark">
        <div class="container-fluid">
          <div class="row">

            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
              <div class="sidebar-sticky">

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                  <span>Booking</span>
                  <a class="d-flex align-items-center text-muted" href="#">
                    <span data-feather="plus-circle"></span>
                  </a>
                </h6>

                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link active mt-2" href="#" id="nav-walk-in">
                      <span data-feather="file-text"></span>
                      Manage Reservations <span class="sr-only">(current)</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" id="nav-add-room">
                      <span data-feather="file-text"></span>
                      Add Walk-in Reservation
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" id="nav-add-room">
                      <span data-feather="file-text"></span>
                      Proof of Payments
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" id="nav-add-room">
                      <span data-feather="file-text"></span>
                      Checked-in Guest
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="#" id="nav-reports">
                      <span data-feather="file-text"></span>
                      Reports
                    </a>
                  </li>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                  <span>Room Management</span>
                  <a class="d-flex align-items-center text-muted" href="#">
                    <span data-feather="plus-circle"></span>
                  </a>
                </h6>
                  <li class="nav-item">
                    <a class="nav-link" href="#" id="nav-edit-room">
                      <span data-feather="file-text"></span>
                      Room List
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" id="nav-edit-room">
                      <span data-feather="file-text"></span>
                      Add Room
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" id="dashboard-billing">
                      <span data-feather="file-text"></span>
                      Billing
                    </a>
                  </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                  <span>Account</span>
                  <a class="d-flex align-items-center text-muted" href="#">
                    <span data-feather="plus-circle"></span>
                  </a>
                </h6>
                <ul class="nav flex-column mb-2">
                  <li class="nav-item">
                    <a class="nav-link" href="#" id="dashboard-edit-info">
                      <span data-feather="file-text"></span>
                      Personal info
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" id=dashboard-edit-password>
                      <span data-feather="file-text"></span>
                      Password
                    </a>
                  </li>
                </ul>
              </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h1 mb-3 text-center font-weight-bold title">DASHBOARD</h1>
              </div>

              <h2 id="dashboard-header">Edit reservations</h2>

              <div id="walkin-module-container">
                <div class="table-responsive" id="reservation-list-container">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Room</th>
                        <th>Guest</th>
                        <th>No.People</th>
                        <th>Price</th>
                        <th>Date-In</th>
                        <th>Date-out</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                      <tbody id="reservation-list-content">
                        <!--dinamically created table-->
                      </tbody>
                  </table>
                </div>

                <div id=edit-reservation-form-container>
                  <form class="form-horizontal">
                    <label class="mt-3 h6 font-weight-bold">Room type.</label>
                    <div class="form-inline">
                      <input type="hidden" id="walkin-res-id" name="hd-res-id">
                      <input class="form-control w-50" type="text" id="walking-res-roomtype">
                      <a class="btn btn-primary w-25 mx-3 text-white" id="walkin-select-res-btn">Select room</a>
                    </div>
                    <div class="form-horizontal">
                      <label class="mt-3 h6 font-weight-bold">Room number.</label>
                      <input class="form-control" type="text" id="walkin-res-roomnum"></input>
                    </div>
                    <div class="form-horizontal">
                      <label class="mt-3 h6 font-weight-bold">First Name.</label>
                      <input class="form-control" type="text" id="walkin-res-firstname"></input>
                    </div>
                    <div class="form-horizontal">
                      <label class="mt-3 h6 font-weight-bold">Last Name.</label>
                      <input class="form-control" type="text-area" id="walkin-res-lastname"></input>
                    </div>
                    <div class="form-horizontal">
                      <label class="mt-3 h6 font-weight-bold">No.People.</label>
                      <input class="form-control" type="text" id="walkin-res-numpeople"></input>
                    </div>
                    <div class="form-horizontal">
                      <label class="mt-3 h6 font-weight-bold">Price.</label>
                      <input class="form-control" type="text" id="walkin-res-price"></input>
                    </div>
                    <div class="form-horizontal">
                      <label class="mt-3 h6 font-weight-bold">Date-in.</label>
                      <input class="form-control" type="date" id="walkin-res-datein"></input>
                    </div>
                    <div class="form-horizontal">
                      <label class="mt-3 h6 font-weight-bold">Date-out.</label>
                      <input class="form-control" type="Date" id="walkin-res-dateout"></input>
                    </div>
                    <div class="form-horizontal">
                      <label class="mt-3 h6 font-weight-bold">Status.</label>
                      <select class="form-control" name="db-available-room" id="walkin-res-status">
                        <option value="1">Not available</option>
                        <option value="0">Available</option>
                      </select>
                    </div>
                    <a class="btn btn-success my-3 text-white" id="walking-res-update-btn">Update room.</a>
                  </form>
                </div>
              </div>

              <div id="edit-module-container">
                <div class="table-responsive" id = "edit-roomlist-container">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Room</th>
                        <th>Accomodations</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                      <tbody id="edit-roomlist-content">
                        <!--dinamically created table SELECT room_name, room_accommodation_num, room_num, COUNT(room_name) as total, price from accommodationinfo where status=0 GROUP by room_num, room_name ORDER BY ID, room_accommodation_num -->
                      </tbody>
                  </table>
                </div>

                <div class="col-md-5 container-fluid h-100" id="edit-room-form-container">
                  <form class="form-horizontal">
                    <label class="mt-3 h6 font-weight-bold">Room type.</label>
                    <div class="form-inline">
                      <input type="hidden" id="dashboard-room-id" name="hd-room-vqid">
                      <input class="form-control w-50" type="text" id="dashboard-room-type">
                      <a class="btn btn-primary w-25 mx-3 text-white" id="select-room-btn">Select room</a>
                    </div>
                    <div class="form-horizontal">
                      <label class="mt-3 h6 font-weight-bold">Accomodations.</label>
                      <input class="form-control" type="text" id="dashboard-num-people"></input>
                    </div>
                    <div class="form-horizontal">
                      <label class="mt-3 h6 font-weight-bold">Price.</label>
                      <input class="form-control" type="text" id="dashboard-room-price"></input>
                    </div>
                    <div class="form-horizontal">
                      <label class="mt-3 h6 font-weight-bold">Description.</label>
                      <input class="form-control" type="text-area" id="dashboard-room-desc"></input>
                    </div>
                    <div class="form-horizontal">
                      <label class="mt-3 h6 font-weight-bold">Room number.</label>
                      <input class="form-control" type="text" id="dashboard-room-num"></input>
                    </div>
                    <div class="form-horizontal">
                      <label class="mt-3 h6 font-weight-bold">Availability.</label>
                      <select class="form-control" name="db-available-room" id="dashboard-room-status">
                        <option value="1">Not available</option>
                        <option value="0">Available</option>
                      </select>
                    </div>
                    <a class="btn btn-success my-3 text-white" id="room-update-btn">Update room.</a>
                  </form>
                </div>
              </div>

              <div class="table-responsive" id="billing-container">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Guest Name</th>
                      <th>Date-In</th>
                      <th>Date-Out</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                    <tbody id="billing-table-container">
                      <!--dinamically created table-->
                    </tbody>
                </table>
              </div>

          </main>
        </div>
      </div>
    </div>
      <!--/Members area-->
  </div>
  <!--Content SELECT room_name, room_num, COUNT(room_name) as total, price from accommodationinfo where status=0 GROUP by room_num, room_name ORDER BY ID-->

  <!--Footer-->
  <div class="container-fluid bg-dark sticky-bottom">
    <div class="container text-center text-white py-1">
      <b>&copy2020 Amazing View, Mountain and Farm Resort.</b>
    </div>
  </div>
  <!--/Footer-->

  <!-- JQuery, needed for bootstrap and animations-->
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <!-- Popper, needed for bootstrap features-->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <!-- Bootstrap core-->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- Custom JS/JQuery Script-->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
  feather.replace()
  </script>
  <script src="js/main.js"></script>
</body>
</html>
