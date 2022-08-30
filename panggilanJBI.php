<?php

    include('header_jbi.php');

    require "config.php";

?>
<head>
    <title>EJBI | Semak Panggilan Perkhidmatan</title>
</head>

<body>
    <section class="container">
        <div class="container-display">

            <?Php
            ////////////////////////////////////////////
            

            $count= "SELECT * FROM pendaftaranjbi where nokadpengenalan = $_SESSION[userIC]";

            $count2= "SELECT * FROM permohonanhantar where (icJBI = $_SESSION[userIC] AND penerimaanJBI = '') OR (icJBI = $_SESSION[userIC] AND penerimaanJBI = 'TERIMA')";

                    if($stmt = $link->query($count)){

                        echo
                        "
                        <div class=container-head><h2>Maklumat Jurubahasa Isyarat</h2></div> <br>";

                        while ($row = $stmt->fetch_assoc()) {
                            echo 
                            "

                            <div><label>NO KAD PENGENALAN</label>
                            <br>
                            <textarea readonly>$row[nokadpengenalan]</textarea>
                            </div> <br>

                            <div><label>NAMA PENUH</label>
                            <br>
                            <textarea readonly>$row[namapenuh]</textarea>
                            </div> <br>

                            <div><label>NO TELEFON</label>
                            <br>
                            <textarea readonly>$row[notel]</textarea>
                            </div> <br>

                            <div><label>EMEL</label>
                            <br>
                            <textarea readonly>$row[emel]</textarea>
                            </div> <br>

                            <div><label>TARIKH LAHIR</label>
                            <br>
                            <textarea readonly>$row[tarikhlahir]</textarea>
                            </div> <br>

                            <div><label>JANTINA</label>
                            <br>
                            <textarea readonly>$row[jantina]</textarea>
                            </div> <br>

                            <div><label>ALAMAT PENUH</label>
                            <br>
                            <textarea readonly>$row[alamat], $row[bandar], $row[poskod], $row[negeri]</textarea>
                            </div> <br>

                            <div><label>DAERAH</label>
                            <br>
                            <textarea readonly>$row[daerah]</textarea>
                            </div> <br>

                            <div><label>STATUS PEKERJAAN</label>
                            <br>
                            <textarea readonly>$row[statuspekerjaan]</textarea>
                            </div> <br>

                            <div><label>KEMAHIRAN BAHASA</label>
                            <br>
                            <textarea readonly>$row[kemahiranbahasa]</textarea>
                            </div> <br>

                            <div><label>STATUS MFD</label>
                            <br>
                            <textarea readonly>$row[mfdstatus]</textarea>
                            </div> <br>

                            <div><label>KEMAHIRAN VOICE OVER</label>
                            <br>
                            <textarea readonly>$row[kemahiranvo]</textarea>
                            </div> <br>
                            
                            <div><label>NEGERI OPERASI</label>
                            <br>
                            <textarea readonly>$row[negerioperasi1], $row[negerioperasi2], $row[negerioperasi3]</textarea>
                            <span id=help-box>Jika kosong, sila klik <b><a href=negerioperasi_jbi.php>disini</a></b> untuk menambah </span>
                            </div><br>

                            <div><label>STATUS</label>
                            <br>
                            <textarea readonly>$row[statusjbi]</textarea>
                            <span id=help-box>Sila klik <b><a href=status_jbi.php>disini</a></b> untuk kemaskini status </span>
                            </div> <br>
                            ";
                            
                        }
   
                    }

                    if($stmt2 = $link->query($count2)){

                        echo
                        "
                        <div class=container-head><h2>Panggilan Perkhidmatan</h2></div> <br>
                        ";

                        while ($row2 = $stmt2->fetch_assoc()) {
                        echo"
                        <div><label>JOB AVAILABLE</label>
                        <br>
                        <textarea readonly>$row2[idpermohonan]</textarea>
                        <span id=help-box>Sila klik <b><a href=detailpermohonan_panggilanJBI.php?id=$row2[idpermohonan]>disini</a></b> untuk maklumat penuh </span>
                        </div> <br>
                        ";
                        }
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
