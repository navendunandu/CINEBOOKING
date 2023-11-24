<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../Assests/Templates/Admin/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Assests/Templates/Admin/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="../Assests/Templates/Admin/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../Assests/Templates/Admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../Assests/Templates/Admin/assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../Assests/Templates/Admin/assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../Assests/Templates/Admin/assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="../Assests/Templates/Admin/assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="../Assests/Templates/Admin/assets/images/logo.svg" alt="logo" /> </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="../Assests/Templates/Admin/assets/images/logo-mini.svg" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          
          <ul class="navbar-nav ml-auto">
            
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="../Assests/Templates/Admin/assets/images/faces/face8.jpg" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="../Assests/Templates/Admin/assets/images/faces/face8.jpg" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                </div>
                
                 <!-- <a class="dropdown-item">Messages<i class="dropdown-item-icon ti-comment-alt"></i></a> -->
                <!-- <a class="dropdown-item">Activity<i class="dropdown-item-icon ti-location-arrow"></i></a> -->
                <!-- <a class="dropdown-item">FAQ<i class="dropdown-item-icon ti-help-alt"></i></a> -->
                <a class="dropdown-item" href="Signout.php">Sign Out<i class="dropdown-item-icon ti-power-off" ></i></a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="../Assests/Templates/Admin/assets/images/faces/face8.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Allen Moreno</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Loacations</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="district.php">district</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="place.php">Place</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="film.php">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Film Add</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="complaintshow.php">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Complaint Details</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Film Details</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="cast.php">Cast</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="crew.php">Crew</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="crewtype.php">Crewtype</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="filmcertification.php">Film Certification</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="filmlanguage.php">Film Language</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="filmtype.php">Film Type</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="genres.php">Genres</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="screenspec.php">Film ScreenType</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="soundspec.php">Film SoundType
                      +
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">