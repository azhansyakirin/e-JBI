<?php 

    include('header_admin.php');

    require_once "config.php";

if(isset($_POST['btnAdminTol'])){
    $sebab = $_POST["sebabDitolak"];
    $id = $_SESSION["idpermohonan"];

    $sql = "INSERT INTO `sbbtolak`
            (`nompermohonan`, `sebab`)
            VALUES
            ('$id', '$sebab');
            
            UPDATE `permohonanjbi`
            SET `statuspermohonan` = 'DITOLAK'
            WHERE `nopermohonan` = '$id';";

    $rs = mysqli_multi_query($link, $sql);

    if($rs){
        echo "<script>location.href='adminsemakPermohonan.php'</script>";
    }
}else{

?>

<body>
    <section class="container">
        <div class="container-table">

            <?Php

                $jbimatch = $_POST["negeriProgram"];

                $emel = [];
                $icJBI = [];

                $count= "SELECT * FROM pendaftaranjbi where statusjbi = 'AVAILABLE'
                        AND negerioperasi1 = '$jbimatch' or negerioperasi2 = '$jbimatch' or negerioperasi3 = '$jbimatch'";

                if($stmt = $link->query($count)){
        
                    echo 
                    "<table id=tablejbi>
                        <tr>
                        <thead>
                            <th>NEGERI OPERASI</th>
                            <th>NAMA JURUBAHASA</th>
                            <th>NO TELEFON</th>
                            <th>EMEL</th>
                            <th>KEMAHIRAN BAHASA</th>
                            <th>KEMAHIRAN VOICE OVER</th>
                        </thead>
                    </tr> ";

                    while ($row = $stmt->fetch_assoc()) {
                    echo 
                    "<tr>
                        <td>$row[negerioperasi1], $row[negerioperasi2], $row[negerioperasi3]</td>
                        <td>$row[namapenuh]</td>
                        <td>$row[notel]</td>
                        <td>$row[emel]</td>
                        <td>$row[kemahiranbahasa]</td>
                        <td>$row[kemahiranvo]</td>
                    </tr>";

                    $emel[] = $row['emel'];
                    $icJBI[] = $row['nokadpengenalan'];
                    } 
                    echo "</table>";

                    $_SESSION["icJBI"] = $icJBI;
                
                
            ?>
            <form method="post" action="adminSendmail.php">

                <div style="text-align: center;">
                    <br>
                    <input type="submit" class="btn btn-primary" value="Notify" style="margin-top: 50px; width:150px">
                </div>
                
                <div>
                    <input type="text" value="<?php echo implode(',', $emel) ?>" name ="emelJBI" hidden>
                </div>

            </form>

            <?php
            }
        }
            ?>

            
        </div>
    </div>
</body>