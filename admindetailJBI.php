<?php

include('header_admin.php');

require_once "config.php";

error_reporting(0);

?>

<body>
<section class="container">
    <div class="container-table">
        
        <?Php

            ////////////////////////////////////////////
            // Collecting data from query string
            $nama = $_GET['id'];


            $count="SELECT P.*, U.filenew1, U.filenew2 FROM pendaftaranjbi P 
                    JOIN uploaded_files_pendaftaran U on P.nokadpengenalan = U.nokad where P.nokadpengenalan= ?";

            if($stmt = $link->prepare($count)){
                $stmt->bind_param('i',$nama);
                $stmt->execute();

                $result = $stmt->get_result();            
                $row=$result->fetch_object();

                echo "<table id=tabledetail>";
                echo "<thead>

                    <tr><th colspan=2>MAKLUMAT JURUBAHASA</th></tr>
                    <tr><td><b>Nama Jurubahasa</b></td><td>$row->namapenuh</td></tr>
                    <tr><td><b>Nombor Kad Pengenalan</b></td><td>$row->nokadpengenalan</td></tr>
                    <tr><td><b>Nombor Telefon</b></td><td>$row->notel</td></tr>
                    <tr><td><b>Email</b></td><td>$row->emel</td></tr>
                    <tr><td><b>Tarikh Lahir</b></td><td>$row->tarikhlahir</td></tr>
                    <tr><td><b>Jantina</b></td><td>$row->jantina</td></tr>

                    <tr><th colspan=2>ALAMAT JURUBAHASA</th></tr>
                    <tr><td><b>Alamat Program</b></td><td>$row->alamat, $row->bandar, $row->poskod, $row->negeri</td></tr>
                    <tr><td><b>Status Pekerjaan</b></td><td>$row->statuspekerjaan</td></tr>
                    <tr><td><b>Kemahiran Bahasa</b></td><td>$row->kemahiranbahasa</td></tr>
                    <tr><td><b>Kemahiran Voice Over</b></td><td>$row->kemahiranvo</td></tr>
                    <tr><td><b>Negeri Operasi</b></td><td>$row->negerioperasi1, $row->negerioperasi2, $row->negerioperasi3 </td></tr>

                    <tr><th colspan=2>DOKUMEN SOKONGAN</th></tr>
                    <tr><td><b>Salinan Kad Pengenalan</b></td><td><a href=uploads/pendaftaran/$row->filenew1 target=_blank>$row->filenew1</a></td></tr>
                    <tr><td><b>Salinan Sijil Kelayakan</b></td><td><a href=uploads/pendaftaran/$row->filenew2 target=_blank>$row->filenew2</a></td></tr>
                    ";
                echo "</table>";

        ?>
        <form method="post" action="javascript:history.go(-1)">

            <div style="text-align: center;">
                <br>
                <input style="border:0;"type="submit" class="btn btn-home" value="Kembali" name="btnBack">
            </div>

        </form>

        <?Php

            }
        ?>
    </div>
</section>
</body>