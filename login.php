<?php
    include "LoadClass.php";
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Environmental Monitoring System | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name" ></h1>

            </div>
            <h3>Welcome to EMS</h3>
            <p>This website is central monitoring centre for Environmental Monitoring System for Colombo Mayor

            </p>
            <p>Login in. To see it in action.</p>

            <form class="m-t" role="form" action="php/Login.php" method="post">
                <div class="form-group">
                    <input type="text" name="user_name" class="form-control" placeholder="Username" required>
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b" >Login</button>

                <p class="text-muted text-center"><small>Do not have an account?</small></p>

                <a class="btn btn-sm btn-white btn-block" href="register.php">Create an account</a>

            </form>
            <p class="m-t"> <small>Ozious Techbology &copy; 2015</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
