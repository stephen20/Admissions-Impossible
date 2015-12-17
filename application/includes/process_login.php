<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomas
 * Date: 12/10/2015
 * Time: 12:32 PM
 */

include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; // The hashed password.

    if (login($email, $password, $mysqli) == true) {
        // Login success
        $base = $this->config->base_url();
        header('Location:' . $base. '?c=student_profile&m=studentHome');
    } else {
        // Login failed
        header('Location: /../views/error/error.php');
    }
} else {
    // The correct POST variables were not sent to this page.
    echo 'Invalid Request';
}