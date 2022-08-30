<?php
    session_start();
    require_once "config.php";

    $ICarr = $_SESSION["icJBI"];
    $idPrmohonan = $_SESSION["idpermohonan"];

    foreach($ICarr as $arr){

        $sql = "INSERT INTO `permohonanhantar`
                (`idpermohonan`,`icJBI`) VALUES ('$idPrmohonan','$arr')";
        $rs = mysqli_query($link, $sql);
    }

    $emelJBI = $_POST["emelJBI"];

    $to_email = $emelJBI;

    $subject = "PANGGILAN PERKHIDMATAN SEBAGAI JURUBAHASA ISYARAT";

    // $body = "Hello JBI ,\n\n"."You have job assigned need to be confirmed. Detail as below :\n\n"."Application Id : $idPrmohonan\n\n"."Please login to the system to confirm your placement.\n\n"."Thank You\n";

    $body = "Assalamualaikum dan Salam Sejahtera,\n\n"."PANGGILAN PERKHIDMATAN SEBAGAI JURUBAHASA ISYARAT \n\n"."Diminta jurubahasa isyarat untuk merespon panggilan perkhidmatan melalui sistem E-JBI dengan segera. Log masuk sistem di pautan http://localhost/e-jbi/login.php\n\n"."Sekiranya terdapat perubahan maklumat, sila hubungi kami di talian 03-89115146.\n\n"."NOMBOR PERMOHONAN : $idPrmohonan\n\n"."Yang menjalankan amanah,\n"."Jabatan Komunikasi Komuniti";
    
    $headers = "From: JABATAN KOMUNIKASI KOMUNITI";

    if (mail($to_email, $subject, $body, $headers)) {
                
        echo '<script>alert("Email success.")</script>';
        echo "<script> location.href='adminsemakPermohonan.php'; </script>";

    } else {
        echo '<script>alert("Email failed.")</script>';
    }
        
?>
        