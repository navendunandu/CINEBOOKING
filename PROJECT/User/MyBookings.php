<?php
include("../Assests/connection/connection.php");   
session_start();
ob_start();
include('Header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container mt-4">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="movie_poster.jpg" class="card-img" alt="Movie Poster">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Movie Name: Your Movie Name</h5>
                        <p class="card-text">Show Time: 3:30 PM</p>
                        <p class="card-text">Date: October 31, 2023</p>
                        <p class="card-text">Theatre Name: Your Theatre Name</p>
                        <p class="card-text">Screen: Screen 1</p>
                        <p class="card-text">Screen Specs: Full HD</p>
                        <p class="card-text">Audio Specs: Dolby Atmos</p>
                        <a href="Ticket.php" class="btn btn-primary">Show Ticket</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include('Footer.php');
ob_flush();
?>
</html>