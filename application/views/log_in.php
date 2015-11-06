<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomas
 * Date: 10/30/2015
 * Time: 10:21 AM
 */
?>
<!DOCTYPE html>
<html lang ="en">

<head>
    <meta charset = "UTF-8">
    <title>FreeWeezy</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="css/customStyles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid" id="top-navbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="main.html">Home</a></li>
                <li><a href="calendar.html">Calendar</a></li>
                <li><a href="marist_favorites.html">Favorites</a></li>
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input align="right" type="text" class="form-control" placeholder="Search" id="new_search">
                </div>
                <button align="right" type="submit" class="btn btn-default" id="search-button">Submit</button>
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<h1><center>Log In</center></h1>
<div class="input-class">
    <center><input type="text" class="form-control loginUsername" id="username" placeholder="Recipient's username" aria-describedby="sizing-addon2"></center>
    <center><input type="password" class="form-control loginPassword" id="username" placeholder="Password" aria-describedby="sizing-addon2"></center>
    <center> <button type="button" id="log-in" class="btn btn-default">Log In</center>
</div>
<script type="text/javascript" src="js/json.js"></script>
<script type="text/javascript" src="js/login.js"></script>

</body>
</HTML>




















