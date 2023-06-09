<?php include "core/config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pizza - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= BURL ?>index.php"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>Delicous</small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <!-------- start search input ------------->
            <div class="container mr-auto">
                <form action="<?= BURL ?>search.php" method="POST" class="navbar-form nav" role="search">
                    <div class="form-group">
                        <input type="text" name="search" placeholder="Search">
                        <input type="submit" name="submit" value="Submit">
                    </div>

                </form>
            </div>
           <!-------- End search input ------------->

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="<?= BURL ?>index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="<?= BURL ?>menu.php" class="nav-link">Menu</a></li>
                    <li class="nav-item"><a href="<?= BURL ?>about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="<?= BURL ?>contact.php" class="nav-link">Contact</a></li>
                </ul>
            </div>

        </div>
    </nav>
    <!-- END nav -->