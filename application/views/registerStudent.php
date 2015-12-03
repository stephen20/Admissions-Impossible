<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomas
 * Date: 12/2/2015
 * Time: 1:55 PM
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
</nav>

<body>
<form method="post">
    <table id="newStudentTable" class="table ">
        <tr>
            <td id="newStudentTableLbl">
                First Name:
            </td>
            <td id="newStudentTableInput">
                <input type="text" id="fName">
            </td>
        </tr>
        <tr>
            <td id="newStudentTableLbl">
                Last Name:
            </td>
            <td id="newStudentTableInput">
                <input type="text" id="lName">
            </td>
        </tr>
        <tr>
            <td id="newStudentTableLbl">
                Email:
            </td>
            <td id="newStudentTableInput">
                <input type="text" id="email">
            </td>
        </tr>
        <tr>
            <td id="newStudentTableLbl">
                New Password:
            </td>
            <td id="newStudentTableInput">
                <input type="password" id="password">
            </td>
        </tr>
        <tr>
            <td id="newStudentTableLbl">
                Password Again:
            </td>
            <td id="newStudentTableInput">
                <input type="password" id="passwordCheck">
            </td>
        </tr>
      </table>
    <div style="text-align: center; padding-top: 10px">
    <input type="submit" value="Register As New Student" style=>
    </div>
</form>


</body>
</html>
<script type="text/javascript">
    var base = "<?php echo $this->config->base_url()?>";

    //Nav Home Button
    $("#navHomeBtn").on("click",function(){
        loc = base;
        location.href = loc;
    });
</script>

<script type="text/javascript">

</script>

