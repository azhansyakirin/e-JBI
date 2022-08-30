<?php 

    include('header_admin.php');

    require_once "config.php";
    
?>

<body>
    <section class="container">
        <div class="container-table">

            <?Php

                $count= "SELECT * FROM pendaftaranjbi";
                if($stmt = $link->query($count)){

                
                    echo 
                    "<table id=tablejbi>
                        <tr>
                        <thead>
                            <th>NEGERI OPERASI</th>
                            <th>NAMA JURUBAHASA</th>
                            <th>NO KAD PENGENALAN</th>
                            <th>NO TELEFON</th>
                            <th>EMEL</th>
                            <th>KEMAHIRAN BAHASA</th>
                            <th>KEMAHIRAN VOICE OVER</th>
                            <th>BUANG JBI</th>
                        </thead>
                    </tr> ";

                    while($row = $stmt->fetch_assoc()){
                    echo 
                    "<tr>
                        <td>$row[negerioperasi1], $row[negerioperasi2], $row[negerioperasi3]</td>
                        <td>$row[namapenuh]</td>
                        <td><a href=admindetailJBI.php?id=$row[nokadpengenalan]>$row[nokadpengenalan]</td>
                        <td>$row[notel]</td>
                        <td>$row[emel]</td>
                        <td>$row[kemahiranbahasa]</td>
                        <td>$row[kemahiranvo]</td>
                        <td><a style=color:red href=deleteJBI.php?id=$row[nokadpengenalan]>Delete</a></td>
                    </tr>";

                    }

                    echo "</table>";
                } 
            ?>
        </div>
    </section>
</body>