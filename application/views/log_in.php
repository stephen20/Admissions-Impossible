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
    <title>AI</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="css/customStyles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
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
                <li><a id="navHomeBtn">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a id="navRegisterBtn">Register</a></li>
            </ul>
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
    <div class="btn-group-wrap">
        <div class="btn-group-vertical">
            <a><button type="button" id="studentlogin" class="btn btn-default">Student Log In</button></a>
            <a><button type="button" id="adminlogin" class="btn btn-default">Admin Log In</button></a>
            <a><button type="button" id="guestlogin" class="btn btn-default">Log In As Guest</button></a>
        </div>
    </div>

</div>
</body>
<script type="text/javascript">
    var base = "<?php echo $this->config->base_url()?>";
//    Nav Bar Links
    $("#navHomeBtn").on("click",function(){
        loc = base + "?c=student_profile&m=studentHome";
        location.href = loc;
    });

    $("#navRegisterBtn").on("click",function(){
        loc = base + "?c=student_profile&m=registerStudent";
        location.href = loc;
        console.log("Clicking")
    });

//    Other Functions
    console.log(base);
    $("#studentlogin").on("click",function(){
        loc = base + "?c=student_profile&m=studentHome";
        location.href = loc;
    });

    $("#adminlogin").on("click",function(){
        loc = base + "?c=ai&m=admin";
        location.href = loc;
    });

    $("#guestlogin").on("click",function(){
        loc = base + "?c=course_comparison&m=display";
        location.href = loc;
    });

</script>
</HTML>
