<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomas
 * Date: 11/23/2015
 * Time: 9:15 PM
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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="css/customStyles.css">
    <link href="css/simple-sidebar.css" rel="stylesheet">
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
                <li><a id="navHomeBtn" ">Home</a></li>
            </ul>
        </div>
    </div>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                        Welcome
                </li>
                <li>
                    <a id="CompareCourses"> Look Up Courses </a>
                </li>
                <li>
                    <a id="editProfile">Edit Profile</a>
                </li>
                <li>
                    <a id="savedSearches">View Saved Searches</a>
                </li>
                <li>
                    <a id="majorCompletion">Major Completion</a>
                </li>
                <li>
                    <a id="logOut">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body>
<p style="align-content: center" id="courseComparisonContent">Please Use the Navigation on the Left to Direct You To Your Next Page</p>
</body>
</html>
<script>

    var base = "<?php echo $this->config->base_url()?>";
    console.log(base);
    $("#editProfile").on("click",function(){
        loc = base + "?c=student_profile&m=editProfile";
        location.href = loc;
    });

    //Load Comparison Page
    $("#CompareCourses").on("click",function(){
        loc = base + "?c=course_comparison&m=displayStudent";
        location.href = loc;
    });

    //Load Major Completion Page
    $("#majorCompletion").on("click",function(){
        loc = base + "?c=student_profile&m=majorCompletion";
        location.href = loc;
    });

    //Nav Home Button
    $("#navHomeBtn").on("click",function(){
        loc = base + "?c=student_profile&m=studentHome";
        location.href = loc;
    });

    //Load Saved Courses
    $("#savedSearches").on("click",function(){
        loc = base + "?c=student_profile&m=savedSearches";
        location.href = loc;
    });

</script>
