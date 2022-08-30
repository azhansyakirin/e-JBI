<?php

    include('header_jbi.php');

    require "config.php";

?>
<head>
    <title>Semak Panggilan Perkhidmatan</title>
</head>

<body>
    <section>
        <div class="container-operasi-negeri">
            <div class="container-head"><h2>NEGERI OPERASI JURUBAHASA ISYARAT</h2></div>

                <form action="" method="post" enctype="multipart/form-data">  

                    <div>

                        <div class="row" style="margin-top: 0em;">

                            <div class="column">
                                <table id="tableoperasi">  

                                <tr>  
                                    <td>Johor</td>  
                                    <td><input class="single-checkbox" type="checkbox" name="negerioperasi[]" value="JOHOR"></td>  
                                </tr> 
                                        
                                <tr>  
                                    <td>Kedah</td>  
                                    <td><input class="single-checkbox" type="checkbox" name="negerioperasi[]" value="KEDAH"></td>  
                                </tr>

                                <tr>  
                                    <td>Kelantan</td>  
                                    <td><input class="single-checkbox" type="checkbox" name="negerioperasi[]" value="KELANTAN"></td>  
                                </tr>

                                <tr>  
                                    <td>Melaka</td>  
                                    <td><input class="single-checkbox" type="checkbox" name="negerioperasi[]" value="MELAKA"></td>  
                                </tr>

                                <tr>  
                                    <td>Negeri Sembilan</td>  
                                    <td><input class="single-checkbox" type="checkbox" name="negerioperasi[]" value="NEGERI SEMBILAN"></td>  
                                </tr>

                                <tr>  
                                    <td>Pahang</td>  
                                    <td><input class="single-checkbox" type="checkbox" name="negerioperasi[]" value="PAHANG"></td>  
                                </tr>

                                <tr>  
                                    <td>Perak</td>  
                                    <td><input class="single-checkbox" type="checkbox" name="negerioperasi[]" value="PERAK"></td>  
                                </tr>

                                <tr>  
                                    <td>Perlis</td>  
                                    <td><input class="single-checkbox" type="checkbox" name="negerioperasi[]" value="PERLIS"></td>  
                                </tr>

                                <tr>  
                                    <td>Pulau Pinang</td>  
                                    <td><input class="single-checkbox" type="checkbox" name="negerioperasi[]" value="PULAU PINANG"></td>  
                                </tr>

                                <tr>  
                                    <td>Sabah</td>  
                                    <td><input class="single-checkbox" type="checkbox" name="negerioperasi[]" value="SABAH"></td>  
                                </tr>

                                <tr>  
                                    <td>Sarawak</td>  
                                    <td><input class="single-checkbox" type="checkbox" name="negerioperasi[]" value="SARAWAK"></td>  
                                </tr>

                                <tr>  
                                    <td>Selangor</td>  
                                    <td><input class="single-checkbox" type="checkbox" name="negerioperasi[]" value="SELANGOR"></td>  
                                </tr>

                                <tr>  
                                    <td>Terengganu</td>  
                                    <td><input class="single-checkbox" type="checkbox" name="negerioperasi[]" value="TERENGGANU"></td>  
                                </tr>  
                                        
                                <tr>  
                                    <td>WP Kuala Lumpur</td>  
                                    <td><input class="single-checkbox" type="checkbox" name="negerioperasi[]" value="KUALA LUMPUR"></td>  
                                </tr>

                                <tr>  
                                    <td>WP Labuan</td>  
                                    <td><input class="single-checkbox" type="checkbox" name="negerioperasi[]" value="LABUAN"></td>  
                                </tr>

                                <tr>  
                                    <td>WP Putrajaya</td>  
                                    <td><input class="single-checkbox" type="checkbox" name="negerioperasi[]" value="PUTRAJAYA"></td>  
                                </tr>
 
                                </table>
                            </div>

                        </div>
                                    
                            <input style="margin-top: 2em; width: 100%;" type="submit" class="btn btn-primary" value="submit" name="sub">

                    </div>

                </form> 

                        <?php  
                        if(isset($_POST['sub']))  
                        {  

                        $negerioperasi = $_POST['negerioperasi'];

                        $in_ch=mysqli_query($link,"UPDATE `pendaftaranjbi`
                                                    SET `negerioperasi1` = '$negerioperasi[0]', `negerioperasi2` = '$negerioperasi[1]', `negerioperasi3` = '$negerioperasi[2]'
                                                    WHERE `pendaftaranjbi`.`nokadpengenalan` = $_SESSION[userIC]");  
                        if($in_ch==1)  
                        {  
                            echo'<script>alert("Data dikemaskini!");history.go(-2);</script>';  
                        }  
                        else  
                        {  
                            echo'<script>alert("Failed To Insert");history.go(-1);</script>';  
                        }  
                        }  
                        ?>  


            </div>

        </div>

    </section>

</body>