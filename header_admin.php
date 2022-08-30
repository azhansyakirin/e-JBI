<?php
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login_admin.php");
        exit;
    }
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link href="http://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link rel="stylesheet" href="css/default.css" type="text/css" media="all">
    <link rel="stylesheet" href="./font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="ico/logo.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src = "jquery/jquery.min.js"></script>
    <script type="text/javascript" src = "jquery/jquery.validate.js"></script>

    <script>

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
        function upperCaseF(a){
            setTimeout(function(){
                a.value = a.value.toUpperCase();
            }, 1);
        }

        function lowerCaseF(b){
            setTimeout(function(){
                b.value = b.value.toLowerCase();
            }, 1);
        }

        function onlyNumberKey(evt) {         
        // Only ASCII charactar in that range allowed 
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
                        return false; 
                            return true; 
        }

        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

    </script>


</head>
<body>
    <header class="sticky"> 
        <a href="adminsemakPermohonan.php">
            <img src="ico/logoejbi2.svg" class="logo">
        </a>
        <div class="menuToggle" onclick="toggleMenu();"></div>

        <ul class="navigation">

            <li>
                <a href="adminsemakPermohonan.php">Semak Permohonan</a>
            </li>

            <li>
                <a href="adminsemakJBI.php">Semak Jurubahasa</a>
            </li>

            <li>
                <a href="logout.php"><i class="fa fa-lock"></i> Log Keluar <br><?php echo strtoupper($_SESSION["adminUname"]); ?></a>
            </li>

        </ul>
    </header>

</body>