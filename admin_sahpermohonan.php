<?php

    session_start();
    require_once "config.php";

    $status = $_POST['btnAdmin'];
    $id = $_SESSION["idpermohonan"];

    $sql = "UPDATE `permohonanjbi`
            SET `statuspermohonan` = '$status'
            WHERE `nopermohonan` = '$id';
            
            UPDATE `permohonanhantar`
            SET `penerimaanJBI` = 'LULUS'
            WHERE `idpermohonan` = '$id';";

    $rs = mysqli_multi_query($link,$sql);

    if($rs)
    {
        echo "<script> location.href='adminsemakPermohonan.php'; </script>";
    }else {
        echo "<script> location.href='adminsemakJBI.php'; </script>";
    }

?>