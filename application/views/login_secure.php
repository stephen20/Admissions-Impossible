<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomas
 * Date: 12/4/2015
 * Time: 3:12 PM
 */

include_once '/../includes/db_connect.php';
include_once '/../includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Secure Login: Log In</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script type="text/JavaScript" src="/../js/sha512.js"></script>
    <script type="text/JavaScript" src="/../js/forms.js"></script>
</head>
<body>
<?php
if (isset($_GET['error'])) {
    echo '<p class="error">Error Logging In!</p>';
}
?>
<form action="<?php echo $this->config->site_url('application/includes/process_login')?>" method="post" name="login_form">
    Email: <input type="text" name="email" />
    Password: <input type="password"
                     name="password"
                     id="password"/>
    <input type="button"
           value="Login"
           onclick="formhash(this.form, this.form.password);" />
</form>

<?php
if (login_check($mysqli) == true) {
    echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';

    echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
} else {
    echo '<p>Currently logged ' . $logged . '.</p>';
    echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
}
?>
</body>
</html>

<script>
   //base url
    var base = "<?php echo $this->config->base_url()?>";

    //Submit
    $("#submit").on("click",function(){
        //loc = base + "application/includes/process_login.php";
        //location.href = loc;
    });
</script>
