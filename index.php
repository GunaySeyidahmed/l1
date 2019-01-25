<?php
require 'connection.php';
require 'functions.php';
error_reporting(-1);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        .position-center {
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -30%);
            width: 30%;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
            header('Location: contacts.php');;
        }

        if (!empty($username) && !empty($password)) {
            $checkResult = checkUser($username, $password);
            if ($checkResult) {
                if (!empty($_POST["remember"])) {
                    setcookie('username',$username, time() + 3600*24*7);
                    setcookie('password',$password, time() + 3600*24*7);
                    echo "Cookies Set Successfuly";
                } else {
                    setcookie("username", "");
                    setcookie("password", "");
                    echo "Cookies Not Set";
                }
                header('Location: contacts.php');
            } else {
                echo "<div class=\"alert alert-danger mx-auto position-absolute\" role=\"alert\" style=\"width: 30%;bottom: 0px;left: 50%; transform: translateX(-50%)\">
                    Istifadeci adi veya parol yanlisdir. </div>";
            }
        }

    ?>
    <div class="col-md-6 position-center">
        <h1 class="text-center" style="font-size:2.6rem">Sistemə giriş</h1>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="username" required="required">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="password" required="required">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <div class="form-group" style="margin-top: 30px">
                <button type="submit" name="crud" class="btn btn-primary" style="padding: 5px 30px;">Login</button>
                <a href="register.php" class="btn btn-primary" style="padding: 5px 30px;">Sign in</a>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
</body>
</html>