<?php
require_once("includes/initialize.php");


// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}


//SQL DB CONNECTION
$conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);

$username = $password = "";
$username_err = $password_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    //Validate Username
    if (empty(trim($_POST['username']))) {
        $username_err="Inserire Username";
    } else {
        $username = trim($_POST["username"]);
    }


    //Validate Password
    if (empty(trim($_POST['password']))) {
        $password_err="Inserire Password";
    } else {
        $password = trim($_POST["password"]);
    }



    //Validate Credentials
    if (empty($username_err) && empty($password_err)) {
        $sql="SELECT * from users WHERE Username='$username'";
        $res=$conn->query($sql);
        //Verify that account exist
        if ($res->num_rows==1) {
            //Check password
            $vals=$res->fetch_assoc();

            if (password_verify($password, $vals['Password'])) {
                setcookie("test", "login");

                session_start();

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $vals['id'];
                $_SESSION["username"] = $username;

                // Redirect user to welcome page
                header("location: index.php");
            } else {
            }
        } else {
            $username_err="Account Inesistente";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("./includes/css.php"); ?>
</head>

<body>
    <form action="" method="post">
        <div class="card col-lg-4 offset-lg-4 card-register">
            <div class="card-body">
                <H3>Login</H3>

                <div class="mb-3">
                    <label for="username class=" form-label">Username </label> <?php echo (!empty($username_err)) ? '<span class="form-err">'.$username_err.'</span>' : ''; ?>
                    <input type="username" class="form-control" id="username" name="username" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="password class=" form-label">Password</label> <?php echo (!empty($password_err)) ? '<span class="form-err">'.$password_err.'</span>' : ''; ?>

                    <input type="password" class="form-control" id="password" name="password">
                </div>


                <button type="submit" class="btn btn-primary">Accedi</button>
            </div>
        </div>
    </form>

    <?php require("./includes/js.php"); ?>
</body>

</html>

<?php
$conn->close;
