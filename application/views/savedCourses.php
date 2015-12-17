<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomas
 * Date: 11/30/2015
 * Time: 7:25 PM
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
                <a id="seal">
                    <img id="blackseal" src="SealBlack.jpg">
                </a>
            </ul>
        </div>
    </div>
</nav>

<body>
<label style="text-align: center">Saved Courses </label>
<table id="savedCourses" class="table table-striped centered-table">
</table>
<input id="removeSaved" type="button" value="Remove Selected Courses" class="btn btn-default" style="margin-left: 300px">
</body>

</html>
<script>
    var percent = 0;
    var rowCount = 0;
    var majorCourses = [];
    var savedCourses =[];
    var matchingCourses = [];

    $(document).ready(function() {
            $.post(
                '?c=student_profile&m=getSavedCourses',
                function (data) {
                    var json = (JSON.parse(data));
                    console.log(json);
                    var newTable = "<thead><th> Saved Course </th><th> Matching Marist Course</th></thead>";
                    savedCourses = [];
                    for (var i = 0; i < json.rows.length; i++) {
                        console.log(json.rows[i]);
                        newTable += "<tr id=saved" + i+"><td>";
                        var dept = (json.rows[i].department);
                        var course_num = (json.rows[i].course_num);
                        savedCourses.push({dept: dept, courseNum:course_num});
                        var course_name = (json.rows[i].course_name);
                        newTable += dept + " " + course_num + " " + course_name;
                        newTable += "</td>";
                        newTable += "</tr>"
                    }
                    $('#savedCourses').append(newTable);
                    getMatchingCourses(savedCourses);
                }
            )}
    );

    function getMatchingCourses(object) {
        console.log(savedCourses);
        $.post(
            '?c=course_comparison&m=getMatchingSavedCourses',
            {'savedCourses': savedCourses},
            function (data) {
                console.log(data);
                var json = (JSON.parse(data));
                console.log(json);
                for(var i=0; i<json.length; i++){
                    var table = "";
                    var department = json[i][0].department;
                    var course_num = json[i][0].course_num;
                    var course_name = json[i][0].course_name;
                    matchingCourses.push(course_num);
                    table += "<td>" + department + " " + course_num + " " + course_name + "</td>";
                    console.log(table);
                    $('#saved'+i).append(table);
                    $('#saved'+i).append("<td><input type='checkbox' class='checkbox' id='checkbox"+ i + "'> </td>");
                }
            }
        );
    }

    function addCheckBox(){
        var table = document.getElementById('savedCourses');
        console.log(table);
    }


    $('#removeSaved').on('click', function () {
        var removeCourses = [];
        $('#savedCourses tr').filter(':has(:checkbox:checked)').each(function() {
           console.log($(this).attr('id'));

        });
    })


</script>
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

    //Nav Home Button
    $("#navHomeBtn").on("click",function(){
        loc = base + "?c=student_profile&m=studentHome";
        location.href = loc;
    });

    //Load Saved Courses
    $("#majorCompletion").on("click",function(){
        loc = base + "?c=student_profile&m=majorCompletion";
        location.href = loc;
    });

    $("#logOut").on("click",function(){
        loc = base + "?c=student_profile&m=logOut";
        location.href = loc;
    });


</script>
