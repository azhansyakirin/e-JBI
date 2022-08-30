<?php

    include('header_pemohon.php');

    function jana_nofeedback() {

        $format = 'Yms';
    
    $timestamp = Date ( $format );
    
    require_once "config.php";
    
    $nofeedback = $timestamp.+1;
    
    define('nofeedback',$nofeedback);}
    
    ?>
<head>
    <title>EJBI | Utama</title>
</head>

<body>
    <section class="banner" id="banner">
        <div class="content">
            <h2>Selamat Datang</h2>
            <p>ke sistem permohonan jurubahasa isyarat atas talian. </p>
            <a href="permohonan.php" class="btn btn-home">Mohon Disini</a>
        </div>
    </section>

    <section class="about" id="about">
            <h2 class="titleText">Siapa Kami</h2>
            <br>
            <p>Sistem Jurubahasa Isyarat ini bertujuan untuk memudahkan pemohon untuk memohon khidmat jurubahasa isyarat secara dalam talian. Sistem ini juga bertujuan untuk membantu jurubahasa isyarat meluaskan khidmatnya dengan membuat pendaftaran jurubahasa isyarat didalam sistem kami ini.</p>  
            <div class="col50">
                <div class="imgBx">
                    <img src="ico/logoejbi.png">
                </div>
            </div>
        
    </section>

    <section class="feedback">

        <h2 class="titleText">Ada Cadangan? Suarakan Disini</h2>
            <p class="text">Bantu kami untuk memperbaiki mutu sistem perkhidmatan kami. Maklumbalas anda amat kami hargai.</p>

            <div class="row">
                <div class="col50">
                    <div class="contentBx">
                        <form action="" method="post" enctype="multipart/form-data"> 
                            <div class="form">
                                <input type="hidden" name="nofeedback" value="<?php echo jana_nofeedback(), nofeedback; ?>">
                                <div class="inputBx">
                                    <input type="text" name="emel" placeholder="Email" value="<?php echo ($_SESSION["emel"]); ?>">
                                </div>
                                <div class="inputBx">
                                    <textarea name="feedback" value="" placeholder="Berikan cadangan/maklumbalas anda"></textarea>
                                </div>
                                <div class="inputBx">
                                    <input type="submit" name="sub" placeholder="" value="Hantar">
                                </div>
                            </div>
                        </form>

                        <?php  
                        if(isset($_POST['sub']))  
                        {  
                        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

                        $emel = $_POST['emel'];
                        $feedback = $_POST['feedback'];
                        $nofeedback = $_POST['nofeedback'];

                        $in_ch=mysqli_query($link,"INSERT INTO `systemfeedback` (`emel`,`feedback`,`nofeedback`) VALUES ('$emel','$feedback','$nofeedback')"); 
                        if($in_ch)  
                        {  
                            echo'<script>alert("Maklumbalas diterima!");</script>';  
                        }  
                        else  
                        {  
                            echo'';  
                        }  
                        }  
                        ?> 

                    </div>
                </div>
                <div class="col50">
                    <div class="imgBx">
                        <img src="ico/oku.svg">
                    </div>
                </div>
            </div>

    </section>

    <section class="socmed" id="socmed">
        <h2 class="heading">Ikuti Kami</h2>
        <p class="text">Ikuti kami di media sosial untuk mengikuti perkembangan terkini</p>
            <div class="imgBx">
                <a href="https://www.twitter.com/dccomm_gov/"><img src="ico/twitter.png" target="_blank"></a>
                <a href="https://www.facebook.com/jabatankomunikasikomunitiofficial" target="_blank"><img src="ico/fb.png"></a>
                <a href="https://www.instagram.com/dccomm_gov/" target="_blank"><img src="ico/ig.png"></a>
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