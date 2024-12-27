<?php
session_start();

include "viewer.php";
include "include/connection.php";
include "include/manipulation_function.php";
include "include/query_function.php";

$grandtotal=0;
checklanjut();
$noorder="";

if($_POST['txtAction']=="chkout"){
	
	mysql_query("delete from tmp_order where ID='".$_SESSION['id']."'");

	$result2=mysql_query("select * from tw_about where Judul='Rekening' ");
	$row2=mysql_fetch_row($result2);

	//isi header order
	$field[1][1]="ID";
	$field[1][2]="'".$_SESSION['id']."'";
	$field[2][1]="AlamatKirim";
	$field[2][2]="'".$_POST['txtAlamat']."'";
	$field[3][1]="AlamatTagih";
	$field[3][2]="'".$_POST['txtAlamat']."'";
	$field[4][1]="Pembayaran";
	$field[4][2]="'".$row2[2]."'";
	$field[5][1]="";
	$field[5][2]="";
	generate_query("insert",$field,"tmp_order","","");
}

if($_POST['txtAction']=="check"){
	
	mysql_query("delete from tmp_order where ID='".$_SESSION['id']."'");

	$result2=mysql_query("select * from tw_about where Judul='Rekening' ");
	$row2=mysql_fetch_row($result2);

	//isi header order
	$field[1][1]="ID";
	$field[1][2]="'".$_SESSION['id']."'";
	$field[2][1]="AlamatKirim";
	$field[2][2]="'".$_POST['txtAlamat']."'";
	$field[3][1]="AlamatTagih";
	$field[3][2]="'".$_POST['txtAlamat']."'";
	$field[4][1]="Pembayaran";
	$field[4][2]="'".$row2[2]."'";
	$field[5][1]="";
	$field[5][2]="";
	generate_query("insert",$field,"tmp_order","","");
}

print_header("");

?>
<table width="99%" align="center">
	<tr>
		<td class="teksjudul" height="40">
			<font size="3"><img src="images/icon_berita.gif" align="absmiddle"> Delivery Details</font>
		</td>
		<td align="right">
		<a href="keranjang.php"  class="tekslink">
		<?php
			$result=mysql_query("select count(ID) from tr_keranjang where ID='".$_SESSION['id']."' and status='0' ");
			$row=mysql_fetch_row($result);
			echo $row[0];
		?>
			mobil pada reservasi Anda <img src="images/icon_keranjang.gif" align="absmiddle" border="0"></a>
		</td>
	</tr>
</table>
<hr size="1" color="#87C6EC" width="95%">
<table width="90%" align="center" class="tekshitam">
<form action="delivery_details.php" method="post" name="fmForm">
	
	<?php
		$result=mysql_query("select * from tr_anggota where ID='".$_SESSION['id']."' ");
		$row=mysql_fetch_row($result);
	?>
	<tr>
		<td class="title">
			<b>&raquo; Mailing Adress</b>
			<br>
		</td>
	</tr>	
	<tr>
		<td width="20%" valign="top">
			  Your items will be mailed to the following address:
		</td>
	</tr>
	<tr>
		<td>
		<?php
		$result1=mysql_query("select * from tmp_order where ID='".$_SESSION['id']."' ");
		$row1=mysql_fetch_row($result1);
		if($row1[1]==""){
		?>
			<textarea name=" txtAlamat" cols="50" rows="5" class="tekshitamkecil"><?php
				echo $row[7]."\n";
				echo $row[8]."\n";
				echo "Kode Pos : ".$row[9]."\n";
				echo "-------------------------------\n";
				echo $row[10].", ".$row[11]."\n";
				echo $row[12]."\n";
			?></textarea>
		<?php
		}
		else{
		?>
			<textarea name=" txtAlamat" cols="50" rows="5" class="tekshitamkecil"><?php
				echo $row1[1];
			?></textarea>
		<?php
		}
		?>		
		</td>
	</tr>
	<tr>
		<td class="tekshitamkecil">
		<br>
		<input type="hidden" name="txtAction" value="">
		<a href="#" onClick="basketSubmit('check')"><img src="images/button_change_add.gif" border="0"></a>
			&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="payment_details.php"><img src="images/button_continue1.gif" border="0"></a>
		</td>
	</tr>
	<tr>
		<td>
			<br>
			Biaya reservasi akan kami tambahkan dengan biaya administrasi dan akan
			kami konfirmasikan kepada Anda melalui telepon atau email. 
			Biaya reservasi dibayar bersama dengan biaya administrasi (dalam 1 transfer) 
			melalui transfer bank atau ATM BCA.
			Reservasi akan kami laksanakan setelah pembayaran Anda masuk di
			rekening kami.
		</td>
	</tr>
</form>
</table>
<br>
<?php
print_footer();
?>