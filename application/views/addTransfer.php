<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomas
 * Date: 11/23/2015
 * Time: 9:15 PM
 */
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

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

    <title>Admin Home Page</title>

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
                <li><a id="navHomeBtn" href="?c=ai&m=admin">Home</a></li>
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
                    <a id="newMCourse"> Add New Marist Course</a>
                </li>
                <li>
                    <a id="newCourse"> Add New Course</a>
                </li>
                <!-- <li>
                    <a id="editCourse">Edit Course</a>
                </li> -->
                <li>
                    <a id="addTransferLink"> Add Transfer Link</a>
                </li>
                <!-- <li>
                    <a id="addMajor"> Add Majors</a>
                </li>
                <li>
                    <a id="editMajor"> Edit Majors Courses</a>
                </li> -->
                <li>
                    <a id="addAdmin"> Add/Remove Admins</a>
                </li>
                <li>
                    <a id="logOut">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body>

  <div id="transferCourse" style="text-align: center">
    <h2> Add a transfer link </h2>
    <center><table id="newStudentTable" class="table">
            <tbody>
            <tr>
                <td id="editProfileLabel">
                    <label>  Marist Course Number:  </label>
                </td>
                <td id="newStudentTableInput">
                    <input type='text' name='mCourseNum' id='mCourseNum'>
                </td>
            </tr>
            <tr>
                <td id="editProfileLabel">
                    <label>  Non-Marist Course Number:  </label>
                </td>
                <td id="newStudentTableInput">
                    <input type='text' name='nMCourseNum' id='nMCourseNum'>
                </td>
            </tr>
            </tbody>
        </table>
        <button id="addTransfer" class="btn-default btn" style="margin-bottom: 100px">Add Transfer Link</button>
</div>
    
</body>
<script type="text/javascript">
    $('#addTransfer').click(function(){
        var mCourseNum = $('input#mCourseNum').val();
        var nMCourseNum = $('input#nMCourseNum').val();
        if(!mCourseNum){
            window.alert("You must enter a Marist course number to add a transferable class!");
        }
        else if(!nMCourseNum){
            window.alert("You must enter a course number to add a transferable class!");
        }
        else{
            $.post("?c=ai&m=addTLink",{mCourseNum: mCourseNum, nMCourseNum: nMCourseNum}).done(function(data){
                if (data == 1){
                    alert("Transferable Course added successfully");
                    location.reload();
                }else{
                    alert('Error in setting the instructions');
                }
            });
        }
    });

    var base = "<?php echo $this->config->base_url()?>";
    console.log(base);
    $("#newMCourse").on("click",function(){
        loc = base + "?c=ai&m=addMCourse";
        location.href = loc;
    });

    //Load Comparison Page
    $("#newCourse").on("click",function(){
        loc = base + "?c=ai&m=addNMCourse";
        location.href = loc;
    });

    //Load Major Completion Page
    $("#addTransferLink").on("click",function(){
        loc = base + "?c=ai&m=addTransfer";
        location.href = loc;
    });

    //Load Saved Courses
    $("#addAdmin").on("click",function(){
        loc = base + "?c=ai&m=addAdmin";
        location.href = loc;
    });


    //Log Out
    $("#logOut").on("click",function(){
        loc = base;
        location.href = loc;
    });

</script>