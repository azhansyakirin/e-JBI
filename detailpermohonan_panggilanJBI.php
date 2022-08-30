<?php

    include('header_jbi.php');

    require "config.php";
?>
<head>
    <title>Semak Panggilan Perkhidmatan</title>
</head>

<body>
    <section class="container">
        <div class="container-table">

            <?Php

            ////////////////////////////////////////////
            // Collecting data from query string
            $id=$_GET['id'];

            // Checking data it is a number or not
            if(!is_numeric($id)){
            echo "Data Error";
            exit;
            }
            
            // MySQL connection string
            $con = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($con,'jbipermohonan');

            $count="SELECT P.*, U.newname1, U.newname2, U.newname3 FROM permohonanjbi P 
                    JOIN uploaded_files_permohonan U on P.nopermohonan = U.nopermohonan where P.nopermohonan=?";

            if($stmt = $con->prepare($count)){
                $stmt->bind_param('i',$id);
                $stmt->execute();

                $result = $stmt->get_result();            
                $row=$result->fetch_object();

                echo "<table id=tabledetail>";
                echo "<thead>
                <th>Nombor Permohonan</th><td style=color:red; >".$id."</td></th></thead>
            
                <tr><td colspan=2></td></tr>
                <tr><th colspan=2>MAKLUMAT PEMOHON</th></tr>
                <tr><td><b>Nama Pemohon</b></td><td>$row->namapemohon</td></tr>
                <tr><td><b>Nombor KP</b></td><td>$row->nokadpengenalan</td></tr>
                <tr><td><b>Nombor Telefon</b></td><td>$row->notelpemohon</td></tr>
                <tr><td><b>Email</b></td><td>$row->emelpemohon</td></tr>
                <tr><td><b>Kategori Pemohon</b></td><td>$row->kategoripemohon</td></tr>
                <tr><td><b>Jenis Permohonan</b></td><td>$row->jenispermohonan</td></tr>
            
                <tr><th colspan=2>BUTIRAN PROGRAM</th></tr>
                <tr><td><b>Nama Program / Urusan</b></td><td>$row->namaprogram</td></tr>
                <tr><td><b>Tarikh Program</b></td><td>$row->tarikhprogrammula hingga $row->tarikhprogramtamat</td></tr>
                <tr><td><b>Alamat Program</b></td><td>$row->alamat, $row->bandar, $row->poskod, $row->daerah</td></tr>
                <tr><td><b>Negeri</b></td><td>$row->negeri</td></tr>
                <tr><td><b>Jenis Program</b></td><td>$row->jenismajlis</td></tr>
                <tr><td><b>Bahasa</b></td><td>$row->kemahiranbahasa</td></tr>
                <tr><td><b>Voice Over</b></td><td>$row->kemahiranvo</td></tr>
                <tr><td><b>Jumlah JBI</b></td><td>$row->jumlahjbi</td></tr>

                <tr><th colspan=2>DOKUMEN SOKONGAN</th></tr>
                <tr><td><b>Surat Permohonan</b></td><td><a href=uploads/permohonan/$row->newname2 target=_blank>$row->newname2</td></tr>
                <tr><td><b>Aturcara Program</b></td><td><a href=uploads/permohonan/$row->newname3 target=_blank>$row->newname3</td></tr>
                <tr><td><b>Salinan Kad Pengenalan</b></td><td><a href=uploads/permohonan/$row->newname1 target=_blank>$row->newname1</td></tr>
                ";
                echo "</table>";

                $_SESSION["nopermohonan"] = $id;

            }else{
                echo $con->error;
            }
            ?>
            <form method="post" action="jbiterima.php">
                <div style="text-align:center;">
                    <br>
                    <button style="border: 0;" class="btn btn-lulus" value="TERIMA" name="btnTerima">Terima</button>

                    <button style="border: 0;" class="btn btn-tolak" value="TOLAK" name="btnTolak">Tolak</button>

                </div>

            </form>
        </div>
    </section>
</body> 


