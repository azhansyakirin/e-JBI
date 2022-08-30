<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta name="keywords" content="" />
    <meta name="description" content="" />
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

        $('.namapenuh').keyup(function() {
            $('span.error-keyup-2').remove();
            var inputVal = $(this).val();
            var characterReg = /^\s*[a-zA-Z,\s]+\s*$/;
            if(!characterReg.test(inputVal)) {
                $(this).after('<span class="error error-keyup-2" style="color:red">No special characters and numbers allowed.</span>');
            }
        });

        $(document).ready(function() {

            $("#kategoripemohon").change(function() {
                if($(this).val() == "INDIVIDU") {
                    $("#dokumen").show();
                    $("#salinan_div").show();
                    $("#surat_div , #aturcara_div").hide();
                    $("#ucapan").hide();
                }else if($(this).val() == "KERAJAAN","SWASTA","BADAN BERKANUN", "OKU PENDENGARAN"){
                    $("#dokumen").show();
                    $("#surat_div, #aturcara_div, #salinan_div").show();
                    $("#ucapan").show();
                }		
            });
        });

    </script>

</head>

<body>
    <header class="sticky">
        <a href="utamaPemohon.php"><img class="logo" src="ico/logoejbi2.svg"></a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navigation">
            <li><a href="utamaPemohon.php" accesskey="1" title="">Utama</a></li>
            <li><a href="permohonan.php" accesskey="2" title="">Permohonan JBI</a></li>
            <li><a href="semakpermohonan.php" accesskey="3" title="">Semak Rekod Permohonan</a></li>
            <li><a href="logout.php" accesskey="4" title=""><i class="fa fa-lock"></i> Log Keluar <br><?php echo strtoupper($_SESSION["username"]); ?></a></li>
        </ul>
    </header>
</body>