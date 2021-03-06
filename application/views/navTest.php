<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomas`
 * Date: 11/9/2015
 * Time: 9:58 AM
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="CSS/customStyles.css">
    <link href="CSS/simple-sidebar.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <title>Student Home Page</title>

</head>
<nav class="navbar navbar-default">
    <div class="container-fluid" id="top-navbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
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
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input align="right" type="text" class="form-control" placeholder="Search" id="new_search">
                </div>
                <button align="right" type="submit" class="btn btn-default" id="search-button">Submit</button>
            </form>
        </div>
    </div>
</nav>

<body>
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Welcome
                </a>
            </li>
            <li>
                <a href="#">Edit Profile</a>
            </li>
            <li>
                <a href="#">View Saved Searches</a>
            </li>
            <li>
                <a href="#">Major Completion</a>
            </li>
            <li>
                <a href="#">Log Out</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

</div>
</body>

</html>
