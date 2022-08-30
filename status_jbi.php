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
            <div class="container-head"><h2>KEMASKINI STATUS</h2></div>

                <form action="" method="post" enctype="multipart/form-data">  

                    <div>

                        <input style="width: 100%; border:0;" type="submit" class="btn btn-home" value="AVAILABLE" name="btnStatus">
                        <input style="width: 100%; border:0;" type="submit" class="btn btn-home" value="NOT AVAILABLE" name="btnStatus">
                                    

                    </div>

                </form> 

                        <?php  
                        if(isset($_POST['btnStatus']))  
                        {  

                        $statusjbi = $_POST['btnStatus'];

                        $in_ch=mysqli_query($link,"UPDATE `pendaftaranjbi`
                                                    SET `statusjbi` = '$statusjbi'
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