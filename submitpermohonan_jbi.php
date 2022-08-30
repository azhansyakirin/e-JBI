<?php
require_once "config.php";

// get the post records
$nopermohonan = $_POST['nopermohonan'];
$namapemohon = $_POST['namapemohon'];
$notelpemohon = $_POST['notelpemohon'];
$emelpemohon = $_POST['emelpemohon'];
$kategoripemohon = $_POST['kategoripemohon'];
$nokadpengenalan = $_POST['nokadpengenalan'];
$namaprogram = $_POST['namaprogram'];
$tarikhprogrammula = $_POST['tarikhprogrammula'];
$tarikhprogramtamat = $_POST['tarikhprogramtamat'];
$alamat = $_POST['alamat'];
$bandar = $_POST['bandar'];
$poskod = $_POST['poskod'];
$daerah = $_POST['daerah'];
$negeri = $_POST['negeri'];
$jenispermohonan = $_POST['jenispermohonan'];
$jenismajlis = $_POST['jenismajlis'];
$jumlahjbi = $_POST['jumlahjbi'];
$kemahiranbahasa = $_POST['kemahiranbahasa'];
$checkbox1=$_POST['kemahiranbahasa']; 

$chk="";  
foreach($checkbox1 as $chk1)  
{  
	$chk .= $chk1." , ";  
}

//file upload location
$targetlocation = "uploads/permohonan/";

//file upload 1
$file_name1 = $_FILES['salinan']['name'];
$file_temp1 = $_FILES['salinan']['tmp_name'];
$file_size1 = $_FILES['salinan']['size'];
$file_ext1 = explode('.', $file_name1);
$file_act_ext1 = strtolower(end($file_ext1));
$file_new_name1 = $nopermohonan . "_IC." . $file_act_ext1;

//file upload 2
$file_name2 = $_FILES['surat']['name'];
$file_temp2 = $_FILES['surat']['tmp_name'];
$file_size2 = $_FILES['surat']['size'];
$file_ext2 = explode('.', $file_name2);
$file_act_ext2 = strtolower(end($file_ext2));
$file_new_name2 = $nopermohonan . "_SURAT." . $file_act_ext2;

//file upload 3
$file_name3 = $_FILES['aturcara']['name'];
$file_temp3 = $_FILES['aturcara']['tmp_name'];
$file_size3 = $_FILES['aturcara']['size'];
$file_ext3 = explode('.', $file_name3);
$file_act_ext3 = strtolower(end($file_ext3));
$file_new_name3 = $nopermohonan . "_ATURCARA.". $file_act_ext3;


if($file_size1 > 5242880 or $file_size2 > 5242880 or $file_size3 > 5242880){
	echo "<script>alert('Saiz file terlalu besar. Maximum adalah 5 MB.');location.href='permohonan_jbi.php';</script>";
}else{

	// database insert SQL code
	$sql = "INSERT INTO `permohonanjbi` 
			(`nopermohonan`, `nokadpengenalan`, `namaprogram`, `tarikhprogrammula`,`tarikhprogramtamat`, `alamat`, `bandar`, `poskod`, `daerah`,
			`negeri`, `jenispermohonan`, `jenismajlis`, `namapemohon`, `notelpemohon`, `kategoripemohon`, `jumlahjbi`, `kemahiranbahasa`, `emelpemohon`, `statuspermohonan`) 
			VALUES 
			('$nopermohonan', '$nokadpengenalan', '$namaprogram ', '$tarikhprogrammula', '$tarikhprogramtamat', '$alamat', '$bandar', '$poskod',
			'$daerah', '$negeri', '$jenispermohonan', '$jenismajlis', '$namapemohon', '$notelpemohon', '$kategoripemohon', '$jumlahjbi',
			'$chk', '$emelpemohon', 'SEDANG DIPROSES');
			
			INSERT INTO `uploaded_files_permohonan`
			(`nopermohonan`, `filename1`, `newname1`, `filename2`, `newname2`, `filename3`, `newname3`)
			VALUES
			('$nopermohonan', '$file_name1', '$file_new_name1', '$file_name2', '$file_new_name2', '$file_name3', '$file_new_name3');";

	// insert in database 
	$rs = mysqli_multi_query($link, $sql);

	if($rs){
		move_uploaded_file($file_temp1, $targetlocation . $file_new_name1);
		move_uploaded_file($file_temp2, $targetlocation . $file_new_name2);
		move_uploaded_file($file_temp3, $targetlocation . $file_new_name3);

		echo "<script> location.href='permohonanberjaya_jbi.php'; </script>";
	} else {
		echo "error";
	}
}

///AUTO EMAIL SYSTEM///

$to_email = $emelpemohon;

$subject = "PERMOHONAN ANDA TELAH DITERIMA";

$body = "Assalamualaikum dan Salam Sejahtera,\n\n"."Terima kasih atas permohonan tuan/puan. Pihak kami akan memaklumkan segera sekiranya permohonan jurubahasa isyarat anda diluluskan melalui email atau sms.\n\n"."Sekiranya terdapat perubahan maklumat, sila hubungi kami di talian 03-89115146.\n\n"."Butiran Permohonan :-\n\n"."Nama Pemohon : $namapemohon\n"."Nombor Permohonan : $nopermohonan\n\n"."Yang menjalankan amanah,\n"."Jabatan Komunikasi Komuniti";

$headers = "From: JABATAN KOMUNIKASI KOMUNITI";
 
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

?>