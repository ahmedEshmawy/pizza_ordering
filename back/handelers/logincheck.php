<?php
        if (!isset($_SESSION['auth'])) {
            //user not logged in
            $_SESSION['msg'] = "Please Login to access Amid Panel";
            //redirect to login page
            header('location:' . BURLA . 'login.php');
            die;
        }
