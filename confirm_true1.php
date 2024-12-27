<?php
include "viewer.php";
include "include/connection.php";

print_header("login");

?>
						<!--BEGIN : ISI TENGAH-->
<table width="99%" align="center">
	<tr>
		<td class="teksjudul" height="40">
			<font size="3"><img src="images/icon_alur.gif" align="absmiddle"> Registration Confirmation </font>
		</td>
		<td align="right">
		<a href="keranjang.php"  class="tekslink">
		<?php
			$result=mysql_query("select count(ID) from tr_keranjang where ID='".$_SESSION['id']."' and status='0' ");
			$row=mysql_fetch_row($result);
			echo $row[0];
		?>
			buku pada pesanan Anda <img src="images/icon_keranjang.gif" align="absmiddle" border="0"></a>
		</td>
	</tr>
</table>
<hr size="1" color="#87C6EC" width="95%">
<table width="99%" align="center">
	<tr height="120">
		<td class="teksjudul" width="35%" valign="top" align="center">
			<br>
				<font color="#FF0000">
				Password sudah kami kirim ke email anda, silahkan cek email anda! Terimakasih!
				</font>
			<br>
		</td>
	</tr>
</table>

<?php
print_footer();
?>