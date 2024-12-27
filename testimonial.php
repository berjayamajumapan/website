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
			<img src="images/icon_bintang.gif" align="absmiddle"> Testimonial
		</td>
		<td align="right">
		<a href="keranjang.php"  class="tekslink">
		<?php
			$result=mysql_query("select count(ID) from tr_keranjang where ID='".$_SESSION['id']."' and status='0' ");
			$row=mysql_fetch_row($result);
			echo $row[0];
		?>
									product pada reservasi Anda <img src="images/icon_keranjang.gif" align="absmiddle" border="0"></a>
		</td>
	</tr>
	<tr>
		<td colspan="2"><hr color="#A50021" size="3"></td>
	</tr>
</table>
<table width="100%" border="0" align="center" bgcolor="#F6F6F6" cellpadding="0" cellspacing="0">
<?php
	$result=mysql_query("select * from t_artikel where ID='".$_GET['id']."' and Publish='1'");
	while($row=mysql_fetch_row($result)){
?>
	<tr>
		<td  class="judulartikel">
			&nbsp;<?php echo $row[1]?>
		</td>
	</tr>
	<tr>
		<td   class="atikel">
			<i><?php echo $row[2]?></i>
			<br>
			<br>
		</td>
	</tr>
	<tr>
		<td   class="atikel">
			<?php
			if($row[4]!=""){
			?>
				<img src="<?php echo $row[4]?>" align="left">
			<?php
			}
			?>
			<?php echo $row[3]?>
		</td>
	</tr>
<?php
	}
?>
</table>
<?php
$result = mysql_query("select * from tw_testimonial where Publish='1'") or die(mysql_error());

while($row=mysql_fetch_row($result)){
?>
<table width="95%" border="0" align="center" cellpadding="5" cellspacing="0">
        <tr>
                <td width="20" height="20">
                </td>
                <td class="teksjudul">
                        <?php echo $row[1]?>
                </td>
        </tr>
        <tr>
                <td>
                </td>
                <td  class="tekshitam">
                        <?php echo $row[2]?>
                </td>
        </tr>
</table>
<br>
<?php
}
print_footer();
?>