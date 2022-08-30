<?php

include('header_admin.php');

require_once "config.php";

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

                $count="SELECT P.*, U.newname1, U.newname2, U.newname3 FROM permohonanjbi P 
                        JOIN uploaded_files_permohonan U on P.nopermohonan = U.nopermohonan where P.nopermohonan=?";

                if($stmt = $link->prepare($count)){
                    $stmt->bind_param('i',$id);
                    $stmt->execute();

                    $result = $stmt->get_result();            
                    $row=$result->fetch_object();

                    echo "<table id=tabledetail>";
                    echo "<thead>
                        <th>Nombor Permohonan</th><td style=color:red; name=nopermohonan>".$id."</td></th></thead>

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
                        <tr><td><b>Voice Over</b></td><td>$row->kemahiranvo</td></tr>
                        <tr><td><b>Jumlah JBI</b></td><td>$row->jumlahjbi</td></tr>

                        <tr><th colspan=2>DOKUMEN SOKONGAN</th></tr>
                        <tr><td><b>Surat Permohonan</b></td><td><a href=uploads/permohonan/$row->newname2 target=_blank>$row->newname2</a></td></tr>
                        <tr><td><b>Aturcara Program</b></td><td><a href=uploads/permohonan/$row->newname3 target=_blank>$row->newname3</a></td></tr>
                        <tr><td><b>Salinan KP</b></td><td><a href=uploads/permohonan/$row->newname1 target=_blank>$row->newname1</a></td></tr>
                        ";
                    echo "</table>";

                    $_SESSION["idpermohonan"] = $id;
                    $_SESSION["jumlahjbi"] = $row->jumlahjbi;
            ?>
            <form method="post" action="adminJBImatch.php">

                <div style="text-align: center;">
                    <br>
                    <button style="width:10em; margin-right: 3em" class="btn btn-primary" value="Terima" name="btnAdminSah">SAHKAN</button>

                    <button style="width:10em; margin-left: 3em" class="btn btn-primary" value="Tolak" name="btnAdminTol">TOLAK</button>

                    <br>
                    <label for="sebabDitolak">Sekiranya permohonan ditolak, berikan sebab:</label>
                    <input type="text" value="" name="sebabDitolak" style="width: 30%; margin-top:3em; margin-left:2em;">
                </div>

                <div>
                    <input type="text" value="<?php echo $row->negeri ?>" name = "negeriProgram" hidden>
                </div>

            </form>

            <?Php

                }
            ?>
        </div>
    </section>
</body>