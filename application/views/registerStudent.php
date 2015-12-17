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
</nav>

<body>
<form id="newStudentForm" method="post" action="?c=student_profile&m=register">
    <p style="text-align: center; color: red"> All fields marked with an * are mandatory</p>
    <table id="newStudentTable" class="table">
        <tr>
            <td id="newStudentTableLbl">
                First Name:
            </td>
            <td id="newStudentTableInput">
                <input type="text" name="first_name" id="fName">
            </td>
            <td id="asterik">
                <label> * </label>
            </td>
        </tr>
        <tr>
            <td id="newStudentTableLbl">
                Last Name:
            </td>
            <td id="newStudentTableInput">
                <input type="text" id="lName" name="last_name">
            </td>
            <td id="asterik">
                <label> * </label>
            </td>
        </tr>
        <tr>
            <td id="newStudentTableLbl">
                Email:
            </td>
            <td id="newStudentTableInput">
                <input type="text" id="email" name="email">
            </td>
            <td id="asterik">
                <label id="emailLbl"> * </label>
            </td>
        </tr>
        <tr>
            <td id="newStudentTableLbl">
                New Password:
            </td>
            <td id="newStudentTableInput">
                <input type="password" id="password" name="password">
            </td>
            <td id="asterik">
                <label> * </label>
            </td>
        </tr>
        <tr>
            <td id="newStudentTableLbl">
                Confirm Password:
            </td>
            <td id="newStudentTableInput">
                <input type="password" id="passwordCheck">
            </td>
            <td id="asterik">
                <label> * </label>
            </td>
        </tr>
      </table>
    <div style="text-align: center; padding-top: 10px">
        <input id="registerBtn" type="submit" value="Register As New Student" class="btn btn-default">
    </div>
</form>
<div style="text-align: center; color: red; margin-top: 20px">
    <?php
        if(isset($err)){
            echo $err;
        }
    ?>
</div>

</body>
<footer id="page-footer">
    <!--    <h1 style="font-size: xx-large; font-family: 'Bauer Bodoni BT'">MARIST</h1>-->
    <p>Disclaimer : All information given by this website is not for official use</p>
</footer>
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
    $(document).ready(function() {
        $("#registerBtn").attr('disabled', 'disabled');
    });
    //Check the values of the passwords are the same
    $("#passwordCheck").on("input",function(){
        validPassword();
    });

    function validPassword(){
        var input = $("#passwordCheck").val();
        var password = $("#password").val();
        var bool = false;
        if( password == "" || input == ""){
            bool = false;
        }else if(input === password) {
            $("#password").css("background-color", '#00FF33');
            $("#passwordCheck").css("background-color", '#00FF33');
            bool=true;
        }
        return bool;
    }
    $("#passwordCheck").on("focusout", function(){
        var input = $("#passwordCheck").val();
        var password = $("#password").val();
        if(input != password) {
            $("#password").css({"background-color": "red"});
            $("#passwordCheck").css({"background-color": "red"});
        }
    });


    $('#newStudentForm').keyup(function(){
        var fName = $("#fName").val();
        var lName = $("#lName").val();
        var email = $("#email").val();
        var password = $("#password").val();
        if(fName == "" || lName == "" || email == "" || !validPassword() || !validEmail()){
            $("#registerBtn").attr('disabled','disable');
        }else{
            $("#registerBtn").removeAttr('disabled');
        }
    });

    $("#email").on("focusout",function(){
        validEmail();
    });

    function validEmail(){
        var input = $("#email").val();
        var bool = false;
        if( input.toLowerCase().indexOf("@")>=0 && input.toLowerCase().indexOf(".edu")>=0) {
            $("#emailLbl").empty();
            $("#emailLbl").append("*");
            bool = true;
        }else if(input == ""){
            $("#emailLbl").empty();
            $("#emailLbl").append("*");
            bool = false;
        }else{
            $("#emailLbl").empty();
            $("#emailLbl").append("Must Be A Valid School Email");
            bool = false;
        }
        return bool
    }

    // $("#registerBtn").click(function(){
    //     var fName = $("#fName").val();
    //     var lName = $("#lName").val();
    //     var email = $("#email").val();
    //     var password = $("#password").val();
    //     $.post(
    //         "?c=student_profile&m=register",
    //         {
    //             'first_name': fName, 
    //             'last_name': lName, 
    //             'email': email, 
    //             'password': password
    //         }
    //     )
    // });

</script>

