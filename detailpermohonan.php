<?php

    include('header_pemohon.php');

    require  "config.php";

    error_reporting(0);

?>

<body>
    <section class="container">
        <div class="container-table">

            <?Php

            ////////////////////////////////////////////
            // Collecting data from query string
            $id=$_GET['id'];

            // Checking data if it is a number or not
            if(!is_numeric($id)){
            echo "Data Error";
            exit;
            }
            
            // MySQL connection string

            $count="SELECT P.*, U.newname1, U.newname2, U.newname3 FROM permohonanjbi P 
                    JOIN uploaded_files_permohonan U on P.nopermohonan = U.nopermohonan where P.nopermohonan=?";

            $count2 = "SELECT J.* FROM pendaftaranjbi J 
                    JOIN permohonanhantar I on J.nokadpengenalan =  I.icJBI where I.idpermohonan = ? and I.penerimaanJBI = 'LULUS'";

            if($stmt = $link->prepare($count)){
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
            <tr><td><b>Alamat Program</b></td><td>$row->alamat, $row->bandar, $row->poskod, $row->negeri</td></tr>
            <tr><td><b>Daerah</b></td><td>$row->daerah</td></tr>
            <tr><td><b>Jenis Program</b></td><td>$row->jenismajlis</td></tr>
            <tr><td><b>Bahasa</b></td><td>$row->kemahiranbahasa</td></tr>
            <tr><td><b>Jumlah JBI</b></td><td>$row->jumlahjbi</td></tr>

            <tr><th colspan=2>DOKUMEN SOKONGAN</th></tr>
            <tr><td><b>Surat Permohonan</b></td><td><a href=uploads/permohonan/$row->newname2 target=_blank>$row->newname2</td></tr>
            <tr><td><b>Aturcara Program</b></td><td><a href=uploads/permohonan/$row->newname3 target=_blank>$row->newname3</td></tr>
            <tr><td><b>Salinan Kad Pengenalan</b></td><td><a href=uploads/permohonan/$row->newname1 target=_blank>$row->newname1</td></tr>
            ";
            

            if($stmt2 = $link->prepare($count2)){
                $stmt2->bind_param('i',$id);
                $stmt2->execute();

                $result2 = $stmt2->get_result();            
                $row2=$result2->fetch_object();

                echo 
                "<tr><th colspan=2>BUTIRAN JURUBAHASA</th></tr>
                <tr><td><b>Nama Jurubahasa</b></td><td><a href=detailJBI.php>$row2->namapenuh</td></tr>
                <tr><td><b>Nombor Telefon</b></td><td>$row2->notel</td></tr>
                <tr><td><b>Emel Jurubahasa</b></td><td>$row2->emel</td></tr>
                ";

                $_SESSION["nama"] = $row2->namapenuh;
            }

            echo "</table>";

            //echo "No of records : ".$result->num_rows."<br>";

        }
            ?>

        </div>

        <form method="post" action="javascript:history.go(-1)">

            <div style="text-align: center;">
                <br>
                <input type="submit" style="border:0;" class="btn btn-lulus" value="Kembali" name="btnBack">
            </div>

        </form>

    </section>

    <footer>
        <section class="footer">                
            <div class="Alamat">
                <img src="ico/logojkom.svg">
                <p>Jabatan Komunikasi Komuniti (JKOM)<br>Aras 3, Kompleks KKMM,<br>Lot 4G9, Persiaran Perdana, Presint 4,<br>Pusat Pentadbiran Kerajaan Persekutuan,<br>62100, Putrajaya, Malaysia</p>
            </div>

            <div class="simbol">
                <ul>
                    <p class="text">Ikuti kami di : </p>
                    <li><a href="#" target="_blank"><img src="ico/logo-01.png"></a></li>
                    <li><a href="#" target="_blank"><img src="ico/logo-02.png"></a></li>
                    <li><a href="#" target="_blank"><img src="ico/logo-03.png"></a></li>
                </ul>
                <br>
                <p>Hubungi kami : <a href="tel:60389115146">03 - 8911 5146</a></p>
                <br>
                <p class="email">Email : <a href="mailto:ejbi.jkom@gmail.com">ejbi.jkom@gmail.com</a></p>
            </div>
        </section>

        <section class="wm">
            <p>© Hak Cipta Terpelihara | Jabatan Komunikasi Komuniti (2021)</p>
        </section>

    </footer>
</body> 

