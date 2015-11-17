<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomas
 * Date: 11/6/2015
 * Time: 12:44 PM
 */
?>
<!DOCTYPE html>
<html lang ="en">

<head>
    <meta charset = "UTF-8">
    <title>Course Comparison</title>
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
<h1><center>Course Comparison</center></h1>
<div class="input-class">
    <label> Please Select Courses You Wish To Compare To Marist Courses</label>
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
                    <td id = matchedMaristCourse1></td>
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
                    <td id = matchedMaristCourse2></td>
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
                    <td id = matchedMaristCourse3></td>
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
                    <td id = matchedMaristCourse4></td>
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
                    <td id = matchedMaristCourse5></td>
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
                    <td id = matchedMaristCourse6></td>
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
                    <td id = matchedMaristCourse7></td>
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
                    <td id = matchedMaristCourse8></td>
                </tr>
        </tbody>
    </table>
</div>
</body>
</HTML>

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

    function populateDepartments(_id){
        var departments = document.getElementsByClassName('department');
        var elements = departments.item(0);
        console.log(elements);
    }
</script>





















