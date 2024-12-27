<?php
function ambilnamabulan($e){
	$daftarbulan = array(1=>"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	return $daftarbulan[$e];
}

function ambilhariawalbulan($t, $b){
	$timestamp = mktime(0,0,0,$b,1,$t);
	$date = getdate ($timestamp);
	$dayofweek = $date['wday'];
	return $dayofweek;
}


function ambiljumlahhari($t , $b){
	$kabisat = false;
	if (t % 4 == 0)
		$kabisat = true;
	//$a = array;
	$a[1] = 31;
	$a[2] = ($kabisat) ? 29 : 28;
	$a[3] = 31;
	$a[4] = 30;
	$a[5] = 31;
	$a[6] = 30;
	$a[7] = 31;
	$a[8] = 31;
	$a[9] = 30;
	$a[10] = 31;
	$a[11] = 30;
	$a[12] = 31;
	return $a[$b];
}

function ambilkalender($tahun, $bulan, $namabulan, $mulai, $hariawalbulan, $angka, $jumlahhari, $tanggal, $hlm){
$warna = "#ffffff";
$tabelkal = "";
$tabelkal = "<table border=0 class='judul' bgcolor='#CCCCCC' cellpading=5 cellspacing=1 width=130>";
$tabelkal = $tabelkal . "<tr><td align= center bgcolor='#000000' colspan=7><b><font size=2 color='#CC0033'>" . $namabulan . ", " . $tahun . "</font></b></td></tr>";
$tabelkal = $tabelkal . "<tr><th>M</th><th>S</th><th>S</th><th>R</th><th>K</th><th>J</th><th>S</th></tr>";
for($baris=0; $baris<=5; $baris++)
	{
	$tabelkal = $tabelkal . "<tr>";
	for($kolom=0; $kolom<=6; $kolom++)
		{
		if($kolom == $hariawalbulan)
			$mulai = true;
		if($mulai && ($angka <= $jumlahhari))
			{
			if(($kolom == 0) && ($angka != $tanggal))
			$warna = "#BF363B";
			else
			{
			if($angka == $tanggal)
			$warna = "#00ff00";
			else
			$warna = "#ffffff";
			}
			
			$resulthal = mysql_query("SELECT COUNT(ID) FROM images WHERE Date <= '".$tahun."-".$bulan."-".$angka."'") or die(mysql_error());
			$rowhal = mysql_fetch_row($resulthal);
			$resultdate = mysql_query("SELECT Date, Title FROM images WHERE Date='".$tahun."-".$bulan."-".$angka."'") or die(mysql_error());
			$rowdate = mysql_fetch_row($resultdate);
			
			if($rowdate[0]!=''){
				$tabelkal = $tabelkal . "<td class=tekshitam align=center bgcolor=" . $warna . " ><a href='".$hlm."?viewdate=VIEW&thn=" . $tahun . "&bln=" . $bulan . "&tgl=" . $angka . "&hal=". $rowhal[0] ."' class='tekslinkbiru' title='".$rowdate[1]."'>";
				$tabelkal = $tabelkal . $angka . "</a></td>";
			}
			else{
				$tabelkal = $tabelkal . "<td class=tekshitam align=center bgcolor=" . $warna . " >". $angka . "</td>";
			}
			
			$angka++;
			}
		else
			{
			$warna = "#ffffff";
			$tabelkal = $tabelkal . "<td bgcolor= " . $warna . " class=teks>";
			}
		}
	$tabelkal = $tabelkal . "</tr>";
	}
$tabelkal = $tabelkal . "</table>";
return $tabelkal;
}

function init($i, $hlm){
	if($i==true){
		$today = getdate(); 
		$bulan = $today['mon']; 
		$tanggal = $today['mday']; 
		$tahun = $today['year']; 
		//var tahun = tgl.getYear();
		//var bulan = tgl.getMonth();
		//var tanggal = tgl.getDate();
	}
	else{
		//$bulan = parseInt (f.bln.options[f.bln.selectedIndex].value);
		//$tahun = parseInt (f.thn.options[f.thn.selectedIndex].value);
		$bulan = $_GET['bln'];
		$tahun = $_GET['thn'];
		$tanggal = 0;
	}
	$namabulan = ambilnamabulan($bulan);
	$hariawalbulan = ambilhariawalbulan($tahun, $bulan);
	$jumlahhari = ambiljumlahhari($tahun, $bulan);
	$kalender = "";
	$kalender = ambilkalender($tahun, $bulan, $namabulan, false, $hariawalbulan, 1, $jumlahhari, $tanggal, $hlm);
	return $kalender;
}

?>

