<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomas
 * Date: 11/30/2015
 * Time: 3:36 PM
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
            </ul>
        </div>
    </div>
</nav>
<div>
    <body>
    <div id="courseComparisonContent">
        <h1><center>Course Comparison</center></h1>
        <div class="input-class">
            <label> Please Select Courses You Wish To Compare To Marist Courses</label>
            <form method="post">
                <div> <label> Select School: </label> <select><option value="Dutchess County"> Dutchess County </option></select> </div>

            <table class="table table-striped table-condensed">
                <thead>
                <th>Course Department</th>
                <th>Course Number</th>
                <th>Matched Marist Course</th>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <select class="department" id="department1"></select>
                    </td>
                    <td>
                        <?php
                        echo '<select class="courseNum" id="courseNum1">';

                        echo '</select>';
                        ?>
                    </td>
                    <td id='matchedMaristCourse1'></td>
                </tr>
                <tr>
                <tr>
                    <td>
                        <select class="department" id="department2"></select>
                    </td>
                    <td>
                        <?php
                        echo '<select class="courseNum" id="courseNum2">';
                        echo '</select>';
                        ?>
                    </td>
                    <td id='matchedMaristCourse2'></td>
                </tr>
                <tr>
                <tr>
                    <td>
                        <select class="department" id="department3"></select>
                    </td>
                    <td>
                        <?php
                        echo '<select class="courseNum" id="courseNum3">';
                        echo '</select>';
                        ?>
                    </td>
                    <td id='matchedMaristCourse3'></td>
                </tr>
                <tr>
                <tr>
                    <td>
                        <select class="department" id="department4"></select>
                    </td>
                    <td>
                        <?php
                        echo '<select class="courseNum" id="courseNum4">';

                        echo '</select>';
                        ?>
                    </td>
                    <td id='matchedMaristCourse4'></td>
                </tr>
                <tr>
                <tr>
                    <td>
                        <select class="department" id="department5"></select>
                    </td>
                    <td>
                        <?php
                        echo '<select class="courseNum" id="courseNum5">';

                        echo '</select>';
                        ?>
                    </td>
                    <td id='matchedMaristCourse5'></td>
                </tr>
                <tr>
                <tr>
                    <td>
                        <select class="department" id="department6"></select>
                    </td>
                    <td>
                        <?php
                        echo '<select class="courseNum" id="courseNum6">';

                        echo '</select>';
                        ?>
                    </td>
                    <td id='matchedMaristCourse6'></td>
                </tr>
                <tr>
                <tr>
                    <td>
                        <select class="department" id="department7"></select>
                    </td>
                    <td>
                        <?php
                        echo '<select class="courseNum" id="courseNum7">';
                        echo '</select>';
                        ?>
                    </td>
                    <td id='matchedMaristCourse7'></td>
                </tr>
                <tr>
                <tr>
                    <td>
                        <select class="department" id="department8"></select>
                    </td>
                    <td>
                        <?php
                        echo '<select class="courseNum" id="courseNum8">';
                        echo '</select>';
                        ?>
                    </td>
                    <td id='matchedMaristCourse8'></td>
                </tr>
                </tbody>
            </table>
                <input id="saveCourses" type="button" value="Save Courses" href="<?php echo $this->config->base_url()?>?c=student_profile&m=studentHome">
            </form>
        </div>
    </div>
</div>
</body>
</HTML>

<!-- ---------Nav Button Links--------- -->
<script type="text/javascript">

    var base = "<?php echo $this->config->base_url()?>";

    //Nav Home Button
    $("#navHomeBtn").on("click",function(){
        loc = base + "?c=student_profile&m=studentHome";
        location.href = loc;
    });


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

    //Load Saved Courses
    $("#savedSearches").on("click",function(){
        loc = base + "?c=student_profile&m=savedSearches";
        location.href = loc;
    });

</script>
<script type="text/javascript">
    $(document).ready(function() {
//        console.log("ready");
        $.post(
            '?c=course_comparison&m=getDepartments',
            function (data) {
                $(".department").empty();
                var options = '<option>Department</option>';
                var json = (JSON.parse(data));
                for (var i = 0; i < json.rows.length; i++) {
                    var dept = json.rows[i].department.valueOf();
                    options += '<option value="' + dept + '">' + json.rows[i].department.valueOf() + '</option>';
                }
                $("select.department").html(options)
            });
    });

    $(".department").on("change",function(){
        var str = $(this).attr('id');
        var id = str.split("department");
        $.post(
            '?c=course_comparison&m=getCourses',
            {'dept': $(this).val()},
            function(data) {
                $("select#courseNum"+ id[1]).empty();
                var options= '<option>Course Number</option>';
                var json = (JSON.parse(data));
                for (var i = 0; i < json.rows.length; i++) {
                    var courseNum = json.rows[i].course_num.valueOf();
                    options += '<option value="' + courseNum + '">' + json.rows[i].course_num.valueOf() + '</option>';
                }
                $("select#courseNum"+id[1]).html(options);
                $("#matchedMaristCourse"+id[1]).empty();

            }
        );
    });

    $(".courseNum").on("change",function(){
        var str= $(this).attr('id');
        var id = str.split("courseNum");
        console.log(id);
        var dep = $('#department'+id[1]).find(":selected").text();
        $.post(
            '?c=course_comparison&m=getMatchedCourse',
            {'courseNum': $(this).val(),'dept': dep},
            function(data) {
                $("#matchedMaristCourse"+id).empty();
                var course= '';
                console.log(data[0]);
                var json = (JSON.parse(data));
                console.log(json.length);
                if(json.length == 0){
                    console.log("No Matching Course");
                    course =  '<p>' + " THERE IS NO MATCHING COURSE" + '</p>';
                    $("td#matchedMaristCourse" + id[1]).html(course);
                }else {
                    if (json.length > 1) {
                        for (var key in json) {
                            if (json.hasOwnProperty(key)) {
                                firstProp = json[key];
                                console.log("if loop:" + firstProp.key);
                                var dept = (firstProp.department.valueOf());
                                var course_num = (firstProp.course_num.valueOf());
                                var course_name = (firstProp.course_name.valueOf());
                                course += '<p>' + dept + " " + course_name + " " + course_num + '</p>';
                                console.log(course);
                                $("td#matchedMaristCourse" + id[1]).html(course);
                            }
                        }
                    } else {
                        for (var key in json) {
                            if (json.hasOwnProperty(key)) {
                                firstProp = json[key];
                                console.log("else loop:" + firstProp);
                                var dept = (firstProp.department.valueOf());
                                var course_num = (firstProp.course_num.valueOf());
                                var course_name = (firstProp.course_name.valueOf());
                                course += '<p>' + dept + " " + course_name + " " + course_num + '</p>';
                                console.log(course);
                                $("td#matchedMaristCourse" + id[1]).html(course);
                            }
                        }
                    }
                }
                console.log("ID: " + id);
            }
        );
    });

/*    // Save Courses For Student
    $("#saveCourses").on("click",function(){
        loc = base + "?c=student_profile&m=majorCompletion";
        location.href = loc;
    });*/

    function populateDepartments(_id){
        var departments = document.getElementsByClassName('department');
        var elements = departments.item(0);
        console.log(elements);
    }
</script>





















