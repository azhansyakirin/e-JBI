<?php

include('header_jbi.php');

?>

<head>
    <title>EJBI | Pendaftaran Jurubahasa</title>
</head>

<body>

    <section class="container-permohonan">

        <!-- FORM BEGIN -->                
        <form name="pendaftaranjbi" method="post" action="submitpendaftaranjbi.php" enctype="multipart/form-data">

            <div class="row">

                <!--INFO UNTUK PENGGUNA -->

                <div class="col50">

                    <div class="container-guide">

                        <h4>Sila baca syarat permohonan sebelum mengisi borang permohonan berikut.</h4>
                        <p>1. Sila pastikan semua maklumat adalah benar.</p>
                        <p>2. Sila pastikan segala dokumen mencukupi.</p>
                        <p>3. Sila ke halaman <b><a href="panggilanJBI.php">Panggilan Perkhidmatan</a> > <a href="negerioperasi_jbi.php">Negeri Operasi</a></b>, untuk mengemaskini negeri operasi.</p>
                        <span style="color:#ff0000;">Semua bahagian bertanda * wajib diisi</span>
                                        
                    </div>

                </div>

                <div class="col50">                                

                    <div class="container-form">

                        <div class="container-head"><h2>Maklumat Pengguna</h2></div> <br>

                            <!-- NAMA PENUH JBI     -->
                            <div>
                                <label>Nama Penuh</label><span style="color:#ff0000;"> *</span>
                                <br>
                                <input type="text" name="namapenuh" value="<?php echo strtoupper($_SESSION["username"]); ?>" required onkeydown="upperCaseF(this)" required id="namapenuh"/>
                                <span id="help-box">Sila isi nama penuh seperti di Kad Pengenalan</span>     
                            </div> 
                            <br>

                            <!-- NO KAD PENGENALAN  JBI   -->
                            <div>
                                <label>No Kad Pengenalan</label><span style="color:#ff0000;"> *</span>
                                <br>
                                <input type="text" name="nokadpengenalan" value="<?php echo strtoupper($_SESSION["userIC"]); ?>" maxlength="12" onkeypress="return onlyNumberKey(event)" required/>
                                <span id="help-box">Contoh : 870904021234 (tanpa simbol -)</span>                                            
                            </div> 
                            <br>

                            <!-- NO TELEFON JBI -->
                            <div>
                                <label>No Telefon</label><span style="color:#ff0000;"> *</span>
                                <br>
                                <input type="text" name="notel" value="" maxlength="11" onkeypress="return onlyNumberKey(event)" required/>
                                <span id="help-box">Contoh : 01234567890 (tanpa simbol -)</span>
                            </div>
                            <br>

                            <!-- EMEL JBI -->
                            <div>
                                <label>Email</label><span style="color:#ff0000;"> *</span>
                                <br>
                                <input type="text" name="emel" value="<?php echo strtolower($_SESSION["emel"]); ?>" required onkeydown="lowerCaseF(this)"/>
                                <span id="help-box">Contoh : you@mail.com</span>
                            </div>
                            <br>

                            <!-- TARIKH LAHIR     -->
                            <div>
                                <label>Tarikh Lahir</label><span style="color:#ff0000;"> *</span>
                                <br>
                                <input type="date" id="tarikhlahir" name="tarikhlahir">    
                            </div>
                            <br>

                            <!-- JANTINA -->
                            <div>
                                <label>Jantina</label><span style="color:#ff0000;"> *</span>
                                <br>
                                <select type="dropdown" name="jantina">
                                    <option value="LELAKI">LELAKI</option>
                                    <option value="WANITA">WANITA</option>
                                </select>
                            </div>
                            <br>

                            <!-- ALAMAT SEMASA -->
                                <!-- ALAMAT -->
                                <div>
                                    <label style="text-align:left">Alamat</label><span style="color:#ff0000;"> *</span>
                                    <br>
                                    <input type="text" name="alamat" value="" placeholder="Alamat" required onkeydown="upperCaseF(this)"/>                                                        
                                </div>

                                <!-- BANDAR -->
                                <div>
                                    <input type="text" name="bandar" value="" placeholder="Bandar" required onkeydown="upperCaseF(this)"/>                                                        
                                </div>

                                <!-- POSKOD -->
                                <div>
                                    <input id="poskod-box" type="text" name="poskod" value="" placeholder="Poskod" maxlength=6 onkeypress="return onlyNumberKey(event)" required />
                                                                                                            
                                    <!-- DAERAH -->            
                                    <select id="daerah-box" type="dropdown" name="daerah">
                                        <option style="display:none">Daerah</option>

                                            <optgroup label="JOHOR">
                                                <option value="JOHOR BAHRU">JOHOR BAHRU</option>
                                                <option value="BATU PAHAT">BATU PAHAT</option>
                                                <option value="KLUANG">KLUANG</option>
                                                <option value="KULAI">KULAI</option>
                                                <option value="MUAR">MUAR</option>
                                                <option value="KOTA TINGGI">KOTA TINGGI</option>
                                                <option value="SEGAMAT">SEGAMAT</option>
                                                <option value="PONTIAN">PONTIAN</option>
                                                <option value="TANGKAK">TANGKAK</option>
                                                <option value="MERSING">MERSING</option>                                          
                                            </optgroup>

                                            <optgroup label="KEDAH">
                                                <option value="SUNGAI PETANI">SUNGAI PETANI</option>
                                                <option value="ALOR SETAR">ALOR SETAR</option>
                                                <option value="KULIM">KULIM</option>
                                                <option value="KUBANG PASU">KUBANG PASU</option>
                                                <option value="BALING">BALING</option>
                                                <option value="PENDANG">PENDANG</option>
                                                <option value="LANGKAWI">LANGKAWI</option>
                                                <option value="YAN">YAN</option>
                                                <option value="SIK">SIK</option>
                                                <option value="PADANG TERAP">PADANG TERAP</option>
                                                <option value="POKOK SENA">POKOK SENA</option>
                                                <option value="BANDAR BAHARU">BANDAR BAHARU</option>
                                            </optgroup>

                                            <optgroup label="KELANTAN">
                                                <option value="KOTA BHARU">KOTA BHARU</option>
                                                <option value="PASIR MAS">PASIR MAS</option>
                                                <option value="TUMPAT">TUMPAT</option>
                                                <option value="BACHOK">BACHOK</option>
                                                <option value="TANAH MERAH">TANAH MERAH</option>
                                                <option value="PASIR PUTEH">PASIR PUTEH</option>
                                                <option value="KUALA KRAI">KUALA KRAI</option>
                                                <option value="MACHANG">MACHANG</option>
                                                <option value="GUA MUSANG">GUA MUSANG</option>
                                                <option value="JELI">JELI</option>
                                                <option value="LOJING">LOJING</option>
                                            </optgroup>

                                            <optgroup label="MELAKA">
                                                <option value="MELAKA TENGAH">MELAKA TENGAH</option>
                                                <option value="ALOR GAJAH">ALOR GAJAH</option>
                                                <option value="JASIN">JASIN</option>
                                            </optgroup>

                                            <optgroup label="NEGERI SEMBILAN">
                                                <option value="SEREMBAN">SEREMBAN</option>
                                                <option value="JEMPOL">JEMPOL</option>
                                                <option value="PORT DICKSON">PORT DICKSON</option>
                                                <option value="TAMPIN">TAMPIN</option>
                                                <option value="KUALA PILAH">KUALA PILAH</option>
                                                <option value="REMBAU">REMBAU</option>
                                                <option value="JELEBU">JELEBU</option>
                                                <option value="GEMAS">GEMAS</option>
                                            </optgroup>

                                            <optgroup label="PAHANG">
                                                <option value="KUANTAN">KUANTAN</option>
                                                <option value="TEMERLOH">TEMERLOH</option>
                                                <option value="BENTONG">BENTONG</option>
                                                <option value="MARAN">MARAN</option>
                                                <option value="ROMPIN">ROMPIN</option>
                                                <option value="PEKAN">PEKAN</option>
                                                <option value="BERA">BERA</option>
                                                <option value="RAUB">RAUB</option>
                                                <option value="JERANTUT">JERANTUT</option>
                                                <option value="LIPIS">LIPIS</option>
                                                <option value="CAMERON HIGHLANDS">CAMERON HIGHLANDS</option>
                                            </optgroup>

                                            <optgroup label="PERAK">
                                                <option value="KINTA">KINTA</option>
                                                <option value="LARUT DAN MATANG">LARUT DAN MATANG</option>
                                                <option value="SELAMA">SELAMA</option>
                                                <option value="BATANG PADANG">BATANG PADANG</option>
                                                <option value="MANJUNG">MANJUNG</option>
                                                <option value="KRIAN">KRIAN</option>
                                                <option value="KUALAN KANGSAR">KUALA KANGSAR</option>
                                                <option value="HILIR PERAK">HILIR PERAK</option>
                                                <option value="HULU PERAK">HULU PERAK</option>
                                                <option value="PERAK TENGAH">PERAK TENGAH</option>
                                            </optgroup>

                                            <optgroup label="PERLIS">
                                                <option value="PERLIS">PERLIS</option>
                                            </optgroup>

                                            <optgroup label="PULAU PINANG">
                                                <option value="SEBERANG PRAI TENGAH">SEBERANG PRAI TENGAH (BKT MERTAJAM)</option>
                                                <option value="SEBERANG PRAI UTARA">SEBERANG PRAI UTARA (BUTTERWORTH)</option>
                                                <option value="SEBERANG PRAI SELATAN">SEBERANG PRAI SELATAN (NIBONG TEBAL)</option>
                                                <option value="TIMUR LAUT">DAERAH TIMUR LAUT</option>
                                                <option value="BARAT DAYA">BARAT DAYA</option>
                                            </optgroup>

                                            <optgroup label="SABAH">
                                                <option value="TAWAU">TAWAU</option>
                                                <option value="LAHAD DATU">LAHAD DATU</option>
                                                <option value="SEMPORNA">SEMPORNA</option>
                                                <option value="SANDAKAN">SANDAKAN</option>
                                                <option value="TONGOD">TONGOD</option>
                                                <option value="LABUT DAN SUGUT">LABUT DAN SUGUT</option>
                                                <option value="KOTA KINABALU">KOTA KINABALU</option>
                                                <option value="RANAU">RANAU</option>
                                                <option value="KOTA BELUD">KOTA BELUD</option>
                                                <option value="TAMPARULI">TAMPARULI</option>
                                                <option value="PENAMPANG">PENAMPANG</option>
                                                <option value="PAPAR">PAPAR</option>
                                                <option value="KUDAT">KUDAT</option>
                                                <option value="KOTA MARUDU">KOTA MARUDU</option>
                                                <option value="PITAS">PITAS</option>
                                                <option value="BEAUFORT/DL MAMPAKUR">BEAUFORT/DL MAMPAKUR</option>
                                                <option value="MENUMBUK">MENUMBUK</option>
                                                <option value="SIPITANG">SIPITANG</option>
                                                <option value="TENOM">TENOM</option>
                                                <option value="NABAWAN">NABAWAN</option>
                                                <option value="KENINGAU">KENINGAU</option>
                                                <option value="TAMBUNAN">TAMBUNAN</option>
                                                <option value="KUNAK">KUNAK</option>
                                                <option value="BELURAN">BELURAN</option>
                                                <option value="TENGHILAN">TENGHILAN</option>
                                                <option value="BUNDU TUHAN">BUNDU TUHAN</option>
                                                <option value="MENGGATAL/INANAM">MENGGATAL/INANAM</option>
                                                <option value="KINABATANGAN">KINABATANGAN</option>
                                                <option value="BANGGI">BANGGI</option>
                                                <option value="TUARAN">TUARAN</option>
                                                <option value="KUALA PENYU">KUALA PENYU</option>
                                                <option value="TELUPID">TELUPID</option>
                                            </optgroup>

                                            <optgroup label="SARAWAK">
                                                <option value="KUCHING">KUCHING</option>
                                                <option value="BAU">BAU</option>
                                                <option value="SERIAN">SERIAN</option>
                                                <option value="SIMUNJAN">SIMUNJAN</option>
                                                <option value="LUNDU">LUNDU</option>
                                                <option value="SIMANGGANG">SIMANGGANG</option>
                                                <option value="LUBOK ANTU">LUBOK ANTU</option>
                                                <option value="SARIBAS/BETONG">SARIBAS/BETONG</option>
                                                <option value="KALAKA">KALAKA</option>
                                                <option value="SIBU">SIBU</option>
                                                <option value="MUKAH">MUKAH</option>
                                                <option value="KANOWIT">KANOWIT</option>
                                                <option value="OYA/DALAT">OYA/DALAT</option>
                                                <option value="MIRI">MIRI</option>
                                                <option value="BINTULU">BINTULU</option>
                                                <option value="BARAM/MARUDI">BARAM/MARUDI</option>
                                                <option value="LIMBANG">LIMBANG</option>
                                                <option value="LAWAS">LAWAS</option>
                                                <option value="SARIKEI">SARIKEI</option>
                                                <option value="BINTANGOR">BINTANGOR</option>
                                                <option value="MATU">MATU</option>
                                                <option value="JULAU">JULAU</option>
                                                <option value="KAPIT">KAPIT</option>
                                                <option value="SONG">SONG</option>
                                                <option value="BELAGA">BELAGA</option>
                                                <option value="SAMARAHAN">SAMARAHAN</option>
                                                <option value="MERADONG">MERADONG</option>
                                                <option value="SRI AMAN/SIMANGGANG">SRI AMAN/SIMANGGANG</option>
                                                <option value="DEBAK">DEBAK</option>
                                                <option value="SIBURAN">SIBURAN</option>
                                                <option value="BUDU">BUDU</option>
                                                <option value="GEDUNG">GEDUNG</option>
                                                <option value="MELUDANG">MELUDANG</option>
                                                <option value="NANGA MEDAMIT">NANGA MEDAMIT</option>
                                                <option value="NANGA MERIT">NANGA MERIT</option>
                                                <option value="PANTU">PANTU</option>
                                                <option value="PENDAM">PENDAM</option>
                                                <option value="SADONG JAYA">SADONG JAYA</option>
                                                <option value="TEBEDU">TEBEDU</option>
                                            </optgroup>

                                            <optgroup label="SELANGOR">
                                                <option value="GOMBAK">GOMBAK</option>
                                                <option value="KLANG">KLANG</option>
                                                <option value="KUALA LANGAT">KUALA LANGAT</option>
                                                <option value="KUALA SELANGOR">KUALA SELANGOR</option>
                                                <option value="PETALING">PETALING</option>
                                                <option value="SABAK BERNAM">SABAK BERNAM</option>
                                                <option value="SEPANG">SEPANG</option>
                                                <option value="HULU LANGAT">HULU LANGAT</option>
                                                <option value="HULU SELANGOR">HULU SELANGOR</option>
                                                <option value="AMPANG JAYA">AMPANG JAYA</option>
                                            </optgroup>

                                            <optgroup label="TERENGGANU">
                                                <option value="BESUT">BESUT</option>
                                                <option value="DUNGUN">DUNGUN</option>
                                                <option value="KEMAMAN">KEMAMAN</option>
                                                <option value="KUALA TERENGGANU">KUALA TERENGGANU</option>
                                                <option value="MARANG">MARANG</option>
                                                <option value="HULU TERENGGANU">HULU TERENGGANU</option>
                                                <option value="SETIU">SETIU</option>
                                            </optgroup>

                                            <optgroup label="WP LABUAN">
                                                <option value="LABUAN">LABUAN</option>
                                            </optgroup>

                                            <optgroup label="WP KUALA LUMPUR">
                                                <option value="KUALA LUMPUR">KUALA LUMPUR</option>
                                            </optgroup>

                                            <optgroup label="WP PUTRAJAYA">
                                                <option value="PUTRAJAYA">PUTRAJAYA</option>
                                            </optgroup>
                                        </select>
                                </div>

                                <!-- NEGERI -->
                                <div>
                                    <select type="dropdown" name="negeri" id="negeri">
                                    <option style="display:none">Negeri</option>    
                                        <option value="JOHOR">JOHOR</option>
                                        <option value="KEDAH">KEDAH</option>
                                        <option value="KELANTAN">KELANTAN</option>
                                        <option value="MELAKA">MELAKA</option>
                                        <option value="NEGERI SEMBILAN">NEGERI SEMBILAN</option>
                                        <option value="PAHANG">PAHANG</option>
                                        <option value="PERAK">PERAK</option>
                                        <option value="PERLIS">PERLIS</option>
                                        <option value="PULAU PINANG">PULAU PINANG</option>
                                        <option value="SABAH">SABAH</option>
                                        <option value="SARAWAK">SARAWAK</option>
                                        <option value="SELANGOR">SELANGOR</option>
                                        <option value="TERENGGANU">TERENGGANU</option>
                                        <option value="LABUAN">WP LABUAN</option>
                                        <option value="KUALA LUMPUR">WP KUALA LUMPUR</option>
                                        <option value="PUTRAJAYA">WP PUTRAJAYA</option>
                                    </select>
                                </div>

                                <!-- STATUS PEKERJAAN -->
                                <br>
                                <div>
                                    <label>Status Pekerjaan</label><span style="color:#ff0000;"> *</span>
                                                    
                                    <br>

                                    <select type="dropdown" name="statuspekerjaan">
                                        <option value="BEKERJA">BEKERJA</option>
                                        <option value="TIDAK BEKERJA">TIDAK BEKERJA</option>
                                    </select>
                                </div>

                                <br>

                                <!-- KEMAHIRAN BAHASA-->
                                <div> 

                                    <label>Kemahiran Bahasa</label><span style="color:#ff0000;"> *</span>
                                    
                                    <br>

                                    <table>
                                        <tr>
                                            <td><input type="checkbox" name="kemahiranbahasa[]" value="BM"><label> BM</label></td>
                                            <td><input type="checkbox" name="kemahiranbahasa[]" value="BI"><label> BI</label></td>
                                            <td><input type="checkbox" name="kemahiranbahasa[]" value="MANDARIN"><label> MANDARIN</label></td>
                                            <td><input type="checkbox" name="kemahiranbahasa[]" value="TAMIL"><label> TAMIL</label></td>
                                        </tr>
                                    </table>

                                </div>

                                <br>

                                <!-- KEMAHIRAN VOICE OVER-->
                                <div>

                                    <label>Kemahiran Voice Over : </label>
                                    <span style="color:#ff0000;"> *</span>

                                    <input type="radio" name="kemahiranvo" value="BIM-BM-BIM">
                                    <label for="BIM-BM">BIM-BM-BIM</label>

                                    <input type="radio" name="kemahiranvo" value="BIM-BI-BIM" checked>
                                    <label for="BIM-BI-BIM">BIM-BI-BIM</label>
                                </div>
                                <span id="help-box">BIM : Bahasa Isyarat Malaysia</span>
                                <br>

                                <!-- DOKUMEN SOKONGAN -->
                                        
                                <div>

                                    <label>Dokumen Sokongan :-</label>

                                    <br><br>

                                    <label>Salinan Kad Pengenalan : </label>
                                    <span style="color:#ff0000;"> *</span>
                                    <input type="file" name="copyic" id="file" class="inputfile"/>
                                                    

                                    <br><br>

                                    <label>Salinan Sijil Kelayakan : </label>
                                    <span style="color:#ff0000;"> *</span>
                                    <input type="file" name="copysijil" id="file" class="inputfile"/>                                                   

                                </div>

                                <!-- BUTANG HANTAR PERMOHONAN -->

                                <div>

                                    <br>
                                    <input style="border: 0;" type="submit" class="btn btn-lulus" value="Hantar">

                                </div>
                                                                
                    </div>
                </div>
            </div>
        </form>                
        <!-- FORM END -->
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