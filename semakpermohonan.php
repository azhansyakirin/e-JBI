<?php

    include('header_pemohon.php');

    require "config.php";

?>
<head>
    <title>EJBI | Semak Permohonan</title>
</head>

<body>
    <section class="container">                                          
        <div class="container-table">

            <?Php

            $count= "SELECT * FROM permohonanjbi where nokadpengenalan= $_SESSION[userIC]";

            if($stmt = $link->query($count)){
            echo 
            "<table id=tablejbi>
                <tr>
                <thead>
                    <th>NOMBOR PERMOHONAN</th>
                    <th>NAMA PEMOHON</th>
                    <th>NO TELEFON</th>
                    <th>NAMA PROGRAM</th>
                    <th colspan=2>TARIKH dan MASA PROGRAM</th>
                    <th>JBI DIPERLUKAN</th>
                    <th>STATUS PERMOHONAN</th>
                </thead>
            </tr> ";

            while ($row = $stmt->fetch_assoc()) {
            echo 
            "<tr>
                <td><a href=detailpermohonan.php?id=$row[nopermohonan]>$row[nopermohonan]</a></td>
                <td>$row[namapemohon]</td>
                <td>$row[notelpemohon]</td>
                <td>$row[namaprogram]</td>
                <td>$row[tarikhprogrammula]</td>
                <td>$row[tarikhprogramtamat]</td>
                <td>$row[jumlahjbi]</td>
                <td>$row[statuspermohonan]</td>
            </tr>";
            }

            echo "</table>";
            }else{
            echo $link->error;
            }
            ?>




        </div>
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
