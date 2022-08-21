<?php
ob_start();

$dbhost = "localhost"; //Veritabanın bulunduğu host
$dbuser = "sahinnet"; //Veritabanı Kullanıcı Adı
$dbpass = "vBk9b5Wx26"; //Veritabanı Şifresi
$dbdata = "sahinnet_telefon"; //Veritabanı Adı

include 'DBBackupRestore.class.php'; //DBBackup.class.php dosyamızı dahil ediyoruz
$dbBackup = new DBYedek(); // class'imizla $dbBackup nesnemizi olusturduk

	//$kayityeri klasor yolu belirtirken sonunda mutlaka / olmali (klasoradi/) seklinde
	$kayityeri	= "temp/";	// ayni dizin için $kayityeri degiskeni bos birakilmali
	$arsiv		= false;	//Yedeği zip arsivi olarak almak için true // .sql olarak almak için false
	$tablosil	= true;		//DROP TABLE IF EXISTS satırı eklemek için true // istenmiyorsa false
	//Veri için kullanılacak sözdizimi:
	$veritipi	= 1; // INSERT INTO tbl_adı VALUES (1,2,3);
	//$veritipi	= 2; // INTO tbl_adı VALUES (1,2,3), (4,5,6), (7,8,9);
	//$veritipi	= 3; // INSERT INTO tbl_adı (sütun_A,sütun_B,sütun_C) VALUES (1,2,3);
	//$veritipi	= 4; // INSERT INTO tbl_adı (col_A,col_B,col_C) VALUES (1,2,3), (4,5,6), (7,8,9);

	$backup = $dbBackup->Disa_Aktar($kayityeri, $arsiv, $tablosil, $veritipi);

	if($backup){
		echo '<a href="' . $backup . '" download="' . $backup . '">' . $backup . '</a> <<<<< İndir..';
	} else {
		echo 'Beklenmedik hata oluştu!';
	}

$dbBackup->kapat();// $dbBackup nesnemizi kapattik

ob_end_flush();
?>