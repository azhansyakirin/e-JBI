<?php

    include('header_admin.php');

    require_once "config.php";


?>
<head>
    <title>Semak Permohonan</title>
</head>

<body>
    <section class="container">
        <div class="container-table">

            <div class="tab">
                <button style="width:13em;" class="tablinks" onclick="openTab(event, 'sedangDiproses')">Sedang Diproses</button>
                <button style="width:13em;" class="tablinks" onclick="openTab(event, 'lulus')">Diterima Jurubahasa</button>
            </div>

            <div id="sedangDiproses" class="tabcontent" style="display: block;">

                <h2 style="color:black; text-align:center; margin-top:20px;">SEDANG DIPROSES</h2>
                <br>

                <?Php

                    $count= "SELECT * FROM permohonanjbi WHERE statuspermohonan='SEDANG DIPROSES'";

                    if($stmt = $link->query($count)){
                        echo 
                        "<table id=tablejbi>
                            <tr>
                            <thead>
                                <th>NOMBOR PERMOHONAN</th>
                                <th>NAMA PROGRAM</th>
                                <th>NO TELEFON</th>
                                <th>NEGERI PROGRAM</th>
                                <th colspan=2>TARIKH DAN MASA PROGRAM</th>
                                <th>JURUBAHASA DIPERLUKAN</th>
                                <th>STATUS PERMOHONAN</th>
                            </thead>
                            </tr> ";

                        while ($row = $stmt->fetch_assoc()) {
                        echo 
                        "<tr>
                            <td><a href=detailpermohonanAdmin.php?id=$row[nopermohonan]>$row[nopermohonan]</a></td>
                            <td>$row[namaprogram]</td>
                            <td>$row[notelpemohon]</td>
                            <td>$row[negeri]</td>
                            <td>$row[tarikhprogrammula]</td>
                            <td>$row[tarikhprogramtamat]</td>
                            <td>$row[jumlahjbi]</td>
                            <td style=color:black;>$row[statuspermohonan]</td>
                        </tr>";
                        }

                        echo "</table>";
                    }  
                ?>
            </div>

            <div id="lulus" class="tabcontent">

                <h2 style="color:black; text-align:center; margin-top:20px;">PERMOHONAN DITERIMA</h2>
                <br>

                <?Php

                    
                    $count= "SELECT P.*, H.penerimaanJBI, H.icJBI FROM permohonanjbi P JOIN permohonanhantar H
                            ON P.nopermohonan = H.idpermohonan where H.penerimaanJBI = 'TERIMA'";

                    if($stmt = $link->query($count)){
                        echo 
                        "<table id=tablejbi>
                            <tr>
                            <thead>
                                <th>NOMBOR PERMOHONAN</th>
                                <th>NAMA PROGRAM</th>
                                <th>NO TELEFON</th>
                                <th>NEGERI PROGRAM</th>
                                <th colspan=2>TARIKH DAN MASA PROGRAM</th>
                                <th>JURUBAHASA DIPERLUKAN</th>
                                <th>STATUS PERMOHONAN</th>
                            </thead>
                            </tr> ";

                        while ($row = $stmt->fetch_assoc()) {
                        echo 
                        "<tr>
                            <td><a href=detailpermohonan_Admin.php?id=$row[nopermohonan]>$row[nopermohonan]</a></td>
                            <td>$row[namaprogram]</td>
                            <td>$row[notelpemohon]</td>
                            <td>$row[negeri]</td>
                            <td>$row[tarikhprogrammula]</td>
                            <td>$row[tarikhprogramtamat]</td>
                            <td>$row[jumlahjbi]</td>
                            <td style=color:black;>$row[statuspermohonan]</td>
                        </tr>";

                        $_SESSION["icJBI"] = $row['icJBI'];
                        }

                        echo "</table>";
                    }  
                ?>
            </div>
        </div>
                </section>
</body>