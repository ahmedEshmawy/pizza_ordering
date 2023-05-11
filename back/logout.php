<?php
//for the cinstant 
include "../core/config.php";

//destroy sessions
session_destroy();

//redirect to login page
header('location:' . BURLA . 'login.php');
die();
