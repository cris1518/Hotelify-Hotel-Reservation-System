<?php
require("./includes/config.php");
require("./includes/functions.php");
$conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    //Validate Username
    if (empty(trim($_POST['username']))) {
        $username_err="Inserire Username";
    } else {
        $sql="SELECT * FROM users WHERE Username='".trim($_POST['username'])."'";

        $res=$conn->query($sql);
        if ($res->num_rows>0) {
            $username_err="Username già utilizzato";
        } else {
            $username = trim($_POST["username"]);
        }
    }


    //Validate Password
    if (empty(trim($_POST['password']))) {
        $password_err="Inserire Password";
    } elseif (strlen(trim($_POST["password"])) < 9) {
        $password_err = "La password deve avere almeno 9 caratteri";
    } else {
        $password = trim($_POST["password"]);
    }



    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Inserire Conferma Password";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "La password non corrisponde";
        }
    }

    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $npassword=password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (Username, Password,Nome,Cognome,Email,Telefono) VALUES ('$username', '$npassword','','','','')";

        $conn->query($sql);
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
                <H3>CREA ACCOUNT</H3>

                <div class="mb-3">
                    <label for="username class=" form-label">Username </label> <?php echo (!empty($username_err)) ? '<span class="form-err">'.$username_err.'</span>' : ''; ?>
                    <input type="username" class="form-control" id="username" name="username" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="password class=" form-label">Password</label> <?php echo (!empty($password_err)) ? '<span class="form-err">'.$password_err.'</span>' : ''; ?>

                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="mb-3">
                    <label for="confirm_password class=" form-label">Conferma Password</label> <?php echo (!empty($confirm_password_err)) ? '<span class="form-err">'.$confirm_password_err.'</span>' : ''; ?>

                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                </div>
                <button type="submit" class="btn btn-primary">Registrati</button>
            </div>
        </div>
    </form>

    <?php require("./includes/js.php"); ?>
</body>

</html>

<?php
$conn->close;
