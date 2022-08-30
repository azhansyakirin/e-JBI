<?php

    session_start();
    require "config.php";

    $icJBI = $_SESSION["userIC"];
    $nopermohonan = $_SESSION["nopermohonan"];

    if($_POST['btnTerima']){
        $statuspenerimaan = $_POST['btnTerima'];

        $sql = "UPDATE `permohonanhantar` 
                SET `penerimaanJBI` = '$statuspenerimaan'
                WHERE `icJBI` = '$icJBI';
            
                UPDATE `permohonanJBI`
                SET `statuspermohonan` = 'DITERIMA JURUBAHASA'
                WHERE `nopermohonan` = '$nopermohonan';
            
                UPDATE `pendaftaranjbi`
                SET `statusjbi` = 'NOT AVAILABLE'
                WHERE `nokadpengenalan` = '$icJBI';";

        $rs = mysqli_multi_query($link,$sql);

    }else{
        $statuspenerimaan = $_POST['btnTolak'];

        $sql = "UPDATE `permohonanhantar` 
                SET `penerimaanJBI` = '$statuspenerimaan'
                WHERE `icJBI` = '$icJBI'";

        $rs = mysqli_query($link,$sql);
    }

    if($rs){
        echo "<script> location.href='panggilanJBI.php'; </script>";
    }
    else{
        echo "<script> location.href='utamaJBI.php'; </script>";
    }

?>