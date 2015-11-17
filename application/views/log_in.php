<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomas
 * Date: 10/30/2015
 * Time: 10:21 AM
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>A I</title>
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
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<h1>
    <center>Log In</center>
</h1>
<div class="input-class">
    <center><input type="text" class="form-control loginUsername" id="username" placeholder="Username/E-mail"
                   aria-describedby="sizing-addon2"></center>
    <center><input type="password" class="form-control loginPassword" id="username" placeholder="Password"
                   aria-describedby="sizing-addon2"></center>
    <center>
        <a href="?c=course_comparison&m=Display"><button type="button" id="studentlogin" class="btn btn-default">Student Log In</button></a>
    </center>
    <center>
        <a href="?c=ai&m=navTest"><button type="button" id="adminlogin" class="btn btn-default">Admin Log In</button></a href="?c=ai&m=navTest">
    </center>
    </div>
<div>
    <center>
        <a href="?c=course_comparison&m=Display"><button type="button" id="guestlogin" class="btn btn-default">Log In As Guest</button></a href="?c=course_comparison&m=Display">
    </center>
</div>
</body>
</HTML>

<script type="text/javascript">
//    var loc = "<?php //echo base_url(); ?>//?c=ai&m=admin";
//    console.log(loc);
//    document.getElementById("studentlogin").onclick = function () {
//        location.href = loc;
//    };

        var loc2 = "<?php echo base_url(); ?> ?c=ai&m=navTest";
        document.getElementById("adminlogin").onclick = function () {
        console.log(loc2);
        location.href = loc2;
    };

//    document.getElementById("guestlogin").onclick = function () {
//        location.href = loc3;
//    };

    $("#adminlogin").on("click",function(){
        var loc3 = "<?php echo base_url(); ?>?c=ai&m=navTest";
        location.href = loc3;
        console.log("hello click");
    }

</script>