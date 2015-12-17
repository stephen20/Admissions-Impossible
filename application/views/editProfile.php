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
                <li><a id="navHomeBtn">Home</a></li>
            </ul>
        </div>
    </div>
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
                <a id="seal">
                    <img id="blackseal" src="SealBlack.jpg">
                </a>
            </ul>
        </div>
    </div>
</nav>

<form method="post" action="?c=student_profile&m=updateStudent">
    <center><table id="newStudentTable" class="table">
            <tbody>
            <tr>
                <td id="editProfileLabel">
                    <label> First Name:  </label>
                </td>
                <td id="newStudentTableInput">
                    <input type="text" id="studentFirstName" name="studentFirstName" value="<?php echo $first_name ?>">
                </td>
            </tr>
            <tr>
                <td id="editProfileLabel">
                    <label> Last Name:  </label>
                </td>
                <td id="newStudentTableInput">
                    <input type="text" id="studentLastName" name="studentLastName" value="<?php echo $last_name ?>">
                </td>
            </tr>
            <td id="editProfileLabel">
                <label> Email :  </label>
            </td>
            <td id="newStudentTableInput">
                <input type="text" id="studentEmail" name="studentEmail" value="<?php echo $email ?>">
            </td>
            </tr>
            <td id="editProfileLabel">
                <label> User Name:  </label>
            </td>
            <td id="newStudentTableInput">
                <input type="text" id="studentUsername" name="studentUsername" value="<?php echo $username ?>">
            </td>
            </tr>
            <td id="editProfileLabel">
                <label> Old Password :  </label>
            </td>
            <td id="newStudentTableInput">
                <input type="password" id="oldPassword" name="studentOldPassword">
            </td>
            </tr>
            </tr>
            <td id="editProfileLabel">
                <label> New Password :  </label>
            </td>
            <td id="newStudentTableInput">
                <input type="password" id="newPassword1" name="studentNewPassword">
            </td>
            </tr>
            <td id="editProfileLabel">
                <label> New Password :  </label>
            </td>
            <td id="newStudentTableInput">
                <input type="password" id="newPassword2" name="studentConfirmedPassword">
            </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <input type="submit" value= "Update Student">
                </td>
            </tr>
            </tbody>
        </table></center>
</form>

</body>
<footer id="page-footer">
    <!--    <h1 style="font-size: xx-large; font-family: 'Bauer Bodoni BT'">MARIST</h1>-->
    <p>Disclaimer : All information given by this website is not for official use</p>
</footer>
</html>
<script>
    var base = "<?php echo $this->config->base_url()?>";

    //Nav Home Button
    $("#navHomeBtn").on("click",function(){
        loc = base + "?c=student_profile&m=studentHome";
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

    //Load Saved Courses
    $("#savedSearches").on("click",function(){
        loc = base + "?c=student_profile&m=savedSearches";
        location.href = loc;
    });

    //Log Out
    $("#logOut").on("click",function(){
        loc = base;
        location.href = loc;
    });



    // $(document).ready(function() {
    //     $.post(
    //         '?c=student_profile&m=getStudentInfo',
    //         function (data) {
    //             var json = (JSON.parse(data));
    //             for (var i = 0; i < json.rows.length; i++) {
    //                 console.log(json);
    //                 $("input#studentFirstName").val(((json.rows[i].first_name.valueOf())));
    //                 $("input#studentLastName").val(((json.rows[i].last_name.valueOf())));
    //                 $("input#studentEmail").val(((json.rows[i].student_email.valueOf())));

    //             }
    //         });
    // });
</script>

