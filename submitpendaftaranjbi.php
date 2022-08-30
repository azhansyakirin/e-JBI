<?php
require_once "config.php";

// get the post records
$namapenuh = $_POST['namapenuh'];
$nokadpengenalan = $_POST['nokadpengenalan'];
$notel = $_POST['notel'];
$emel = $_POST['emel'];
$tarikhlahir = $_POST['tarikhlahir'];
$jantina = $_POST['jantina'];
$alamat = $_POST['alamat'];
$bandar = $_POST['bandar'];
$poskod = $_POST['poskod'];
$daerah = $_POST['daerah'];
$negeri = $_POST['negeri'];
$statuspekerjaan = $_POST['statuspekerjaan'];
$kemahiranbahasa = $_POST['kemahiranbahasa'];
$mfdstatus = $_POST['mfdstatus'];
$kemahiranvo = $_POST['kemahiranvo'];
$checkbox1=$_POST['kemahiranbahasa']; 

$chk="";  
foreach($checkbox1 as $chk1)  
{  
	$chk .= $chk1." , ";  
}

//substr nokadpengenalan
$subIC = substr($nokadpengenalan, 0 ,8);

//upload file target location
$targetlocation = "uploads/pendaftaran/";

//file upload 1
$file_name1 = $_FILES['copyic']['name'];
$file_temp1 = $_FILES['copyic']['tmp_name'];
$file_size1 = $_FILES['copyic']['size'];
$file_ext1 = explode('.', $file_name1);
$file_act_ext1 = strtolower(end($file_ext1));
$file_new_name1 = $subIC . "_IC." . $file_act_ext1;

//file upload 2
$file_name2 = $_FILES['copysijil']['name'];
$file_temp2 = $_FILES['copysijil']['tmp_name'];
$file_size2 = $_FILES['copysijil']['size'];
$file_ext2 = explode('.', $file_name2);
$file_act_ext2 = strtolower(end($file_ext2));
$file_new_name2 = $subIC . "_SIJIL." . $file_act_ext2;


if($file_size1 > 5242880 or $file_size2 > 5242880){
	echo "<script>alert('Saiz file terlalu besar. Maximum adalah 5 MB.');location.href='permohonan_jbi.php';</script>";
}else{
	// database insert SQL code
	$sql = "INSERT INTO `pendaftaranjbi`
			(`namapenuh`, `nokadpengenalan`, `notel`, `emel`, `tarikhlahir`, `jantina`, `alamat`, `bandar`,
			`poskod`, `daerah`, `negeri`, `statuspekerjaan`, `kemahiranbahasa`, `mfdstatus`, `kemahiranvo`, `statusjbi`)
			VALUES
			('$namapenuh', '$nokadpengenalan', '$notel', '$emel', '$tarikhlahir', '$jantina', '$alamat', '$bandar',
			'$poskod', '$daerah', '$negeri', '$statuspekerjaan', '$chk', '$mfdstatus', '$kemahiranvo', 'AVAILABLE');
			
			INSERT INTO `uploaded_files_pendaftaran`
			(`nokad`, `file1`, `filenew1`, `file2`, `filenew2`)
			VALUES
			('$nokadpengenalan', '$file_name1', '$file_new_name1', '$file_name2', '$file_new_name2');";

	// insert in database 
	$rs = mysqli_multi_query($link, $sql);

	if($rs){
		move_uploaded_file($file_temp1, $targetlocation . $file_new_name1);
		move_uploaded_file($file_temp2, $targetlocation . $file_new_name2);

		echo "<script> location.href='pendaftaranberjaya.php'; </script>";
	}else {

		echo "<script> location.href='pendaftarangagal.php'; </script>";
	}
}
?>