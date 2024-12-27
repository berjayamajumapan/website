<?php
session_start();
include "viewer.php";
include "include/connection.php";

print_header("");

?>
<br>
<table width="99%" align="center">
	<tr>
		<td class="teksjudul" height="40">
			<font size="3"><img src="images/icon_bintang.gif" align="absmiddle"> Artikel </font>
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
	<tr>
		<td colspan="2"><hr color="#A50021" size="3"></td>
	</tr>
</table>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
<?php
	$result=mysql_query("select * from tw_testimonial where ID='".$_GET['id']."' and Publish='1'");
	while($row=mysql_fetch_row($result)){
?>
	<tr>
		<td  class="teksjudul">
			&nbsp;<?php echo $row[1]?><br><br>
		</td>
	</tr>
	<tr>
		<td   class="tekshitamkecil">
			<?php echo $row[2]?>
			<br>
			<br>
		</td>
	</tr>
<?php
	}
?>
</table>
<hr>
<?php
$result = mysql_query("select * from tw_testimonial where Publish='1'") or die(mysql_error());

while($row=mysql_fetch_row($result)){
?>
<table width="95%" border="0" align="center" cellpadding="5" cellspacing="0">
        <tr>
                <td width="20" height="20">
                </td>
                <td class="teksjudul">
                        <li> <a href="artikel.php?id=<?php echo $row[0]?>"><?php echo $row[1]?></a>
                </td>
        </tr>
</table>
<?php
}
print_footer();
?>