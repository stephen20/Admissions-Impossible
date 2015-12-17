<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomas
 * Date: 11/30/2015
 * Time: 7:15 PM
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
<p style="align-content: center" id="courseComparisonContent">Show Major Completion Here</p>
<table id="savedCourses" class="table table-striped centered-table">
</table>
<br>
<label id="progressLabel" style="margin-left: 255px"> Select A Major Below to See Approximate Completion</label>
<div class="progress" style="margin-left: 255px; margin-right: 15px">
    <div class="progress-bar progress-bar progress-bar-striped" role="progressbar" aria-valuenow="100"
         aria-valuemin="0" aria-valuemax="100" style="width:100%">
        <span id="progressText"> 0 % </span>
    </div>
</div>

<select id="majorSelect" style="margin-left: 255px"><option>Select a Major</option><option>Computer Science</option></select>
<table id="majorCourses" class="table table-striped centered-table">
</table>

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
            '?c=student_profile&m=getMajors',
            function (data) {
                console.log(data);
                $("#majorSelect").empty();
                var options = '<option>Select Major</option>';
                var json = (JSON.parse(data));
                for (var i = 0; i < json.rows.length; i++) {
                    var dept = json.rows[i].major_name.valueOf();
                    options += '<option value="' + dept + '">' + json.rows[i].major_name.valueOf() + '</option>';
                }
                $("#majorSelect").html(options)
            });
    });

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
                    }
                }
            );
        }

    $("#majorSelect").on("change",function(){
        $.post(
            '?c=student_profile&m=getMajorCourses',
            {'major': $(this).val()},
            function (data) {
                $('#majorCourses').empty();
                var json = (JSON.parse(data));
                // console.log(json);
                var newTable = "<thead><th></th><th>Department </th><th>Course Number</th><th>Course Name</th></thead>";
                majorCourses = [];
                for (var i = 0; i < json.length; i++) {
                    console.log(json[i].department);
                    newTable += "<tr><td>" + (i+1) + "</td>";
                    newTable += "<td id=" + i + ">";
                    var dept = (json[i].department);
                    newTable += dept;
                    newTable += "</td><td id=" + i + ">";
                    var course_num = (json[i].course_num);
                    majorCourses.push(course_num);
                    newTable += course_num;
                    newTable += "</td><td id=" + i + ">";
                    var course_name = (json[i].course_name);
                    newTable += course_name;
                    //newTable += dept + " " + course_name + " " + course_num;
                    newTable += "</td></tr>";
                    rowCount ++;
                }
                $('#majorCourses').append(newTable);
                determinePercent();
            }
        );
    });

    function determinePercent(){
        var coursesThatCount = 0;
        console.log(majorCourses);
        console.log(savedCourses);
        for(var i = 0; i < savedCourses.length; i++){
            if(majorCourses.indexOf(matchingCourses[i]) > -1){
                coursesThatCount++;
            }
        }
        percent = Math.round((coursesThatCount/(majorCourses.length-1))*100);

        console.log("Percent: " +percent);
        updateProgressBar();
    }

    function updateProgressBar(){
        var major =  $("#majorSelect").val();
        $('#progressText').text(percent + "% ");
        $('.progress-bar').attr("aria-valuenow", percent).css("width", (percent+"%"));
        $('#progressLabel').text("Approximately " + percent + "% of " + major + " Completed");
    }

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
    $("#savedSearches").on("click",function(){
        loc = base + "?c=student_profile&m=savedSearches";
        location.href = loc;
    });

    $("#logOut").on("click",function(){
        loc = base + "?c=student_profile&m=logOut";
        location.href = loc;
    });

</script>
<!---->
<!--/*  for (var i = 0; i < json.rows.length; i++) {-->
<!--console.log(json);-->
<!--$("table#savedCourses").empty();-->
<!--newTable += "<tr><td id=" + i+">";-->
<!--        var courseNum = (json.rows[i].course_id.valueOf());-->
<!--        getMatchedCourse(courseNum);-->
<!--        newTable += courseNum;-->
<!--        newTable += "</td></tr>";-->
<!--}-->
<!---->
<!--});-->
<!---->
<!--function(data) {else {-->
<!--if (json.length > 1) {-->
<!---->
<!--}-->
<!--});-->
<!---->
<!--function getMatchedCourse(courseNum){-->
<!---->
<!--}-->