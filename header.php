<!DOCTYPE html>

<html lang="en">

<head>

    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link href="http://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link rel="stylesheet" href="css/default.css" type="text/css" media="all">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="ico/logo.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src = "jquery/jquery.min.js"></script>
    <script type="text/javascript" src = "jquery/jquery.validate.js"></script>

    <script type="text/javascript">

        window.addEventListener('scroll', function(){
            const header = document.querySelector('header');
            header.classList.toggle("sticky", window.scrollY > 0); 
        })

        function toggleMenu(){
            const menuToggle = document.querySelector('.menuToggle');
            const navigation = document.querySelector('.navigation');
            menuToggle.classList.toggle('active');
            navigation.classList.toggle('active');
        }
    </script>


</head>
<body>
    <header class="sticky">
        <a href="index.php" id="tm-logo">
            <img src="ico/logoejbi2.svg" class="logo">
        </a>
        <div class="menuToggle" onclick="toggleMenu();"></div>

        <ul class="navigation">
            <li>
                <a href="login.php">Log Masuk Pengguna <i class="fa fa-lock"></i></a>
            </li>

            <li>
                <a href="login_admin.php">Log Masuk Admin <i class="fa fa-user"></i></a>
            </li>
        </ul>
    </header>
</body>

