<?php
session_start();
include "viewer.php";
include "include/connection.php";
include "include/manipulation_function.php";
include "include/query_function.php";

$message="";
if(isset($_POST['Kirim'])){
		$no=ambilnomor("ID","t_contact_user","0","00");

		$field[1][1]="ID";
		$field[1][2]="'".$no."'";
		$field[2][1]="Nama";
		$field[2][2]="'".$_POST['nama']."'";
		$field[3][1]="Email";
		$field[3][2]="'".$_POST['email']."'";
		$field[4][1]="Alamat";
		$field[4][2]="'".$_POST['alamat']."'";
		$field[5][1]="TelpFax";
		$field[5][2]="'".$_POST['telpfax']."'";
		$field[6][1]="Pesan";
		$field[6][2]="'".$_POST['pesan']."'";
		$field[7][1]="";
		$field[7][2]="";
		generate_query("insert",$field,"t_contact_user","","");
		$message="Pesan terkirim, dan akan segera diproses! Terimakasih";
}

print_header("contact");
?>
<table width="99%" align="center">
	<tr>
		<td class="teksjudul" height="40">
			<font size="3"><img src="images/icon_pesan.gif" align="absmiddle"> Kontak Kami</font>
		</td>
		<td align="right">
		<a href="keranjang.php"  class="tekslink"></a>		</td>
	</tr>
</table>
<hr size="1" color="#87C6EC" width="95%">
<table width="90%" align="center" class="tekshitam">
	<tr>
		<td colspan="2">
			<font color="#FF0000"><?php echo $message?></font>
		</td>
	</tr>
<form action="" method="post">
	<tr>
		<td>
			Name
		</td>
		<td>
			<input type="text" name="nama" size="80">
		</td>
	</tr>
	<tr>
		<td>
			Email
		</td>
		<td>
			<input type="text" name="email" size="80">
		</td>
	</tr>
	<tr>
		<td>
			Alamat
		</td>
		<td>
			<input type="text" name="alamat" size="80">
		</td>
	</tr>
	<tr>
		<td>
			Telp / Fax
		</td>
		<td>
			<input type="text" name="telpfax" size="80">
		</td>
	</tr>
	<tr>
		<td>
			Pesan
		</td>
		<td>
			<textarea name="pesan" cols="90" rows="5"></textarea>
		</td>
	</tr>
	<tr>
		<td>
		</td>
	  <td>
			<input type="submit" name="Kirim" size="20" value=" Send ">
			<input type="reset" name="Reset" size="20" value=" Reset "> <p>Reservasi :<br />
			  Toko   : Berjaya Maju Mapan<br />
			  Telp   : xxxx-xxxxx/xxxxxx ,  Fax. xxxx-xxxxx<br />
			  Office : xxxx-xxxx, Fax.xxx-xxxx<br />
			  Email : bmm@gmail.com</p>
			<p> Office :<br />
			  xxxxxxxxxxxxxxxxxxxxxxxxxxxx, <br />
			  xxxxxxxxxxxxxxxxxxxxxxxxxx. </p>		
			  		  
			  			  </td>
	</tr>
</form>
</table>
<?php
print_footer();
?>	