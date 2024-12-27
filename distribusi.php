<?php
session_start();

include "viewer.php";
include "include/connection.php";
include "include/manipulation_function.php";

print_header("info");
?>
<table width="99%" align="center">
	<tr>
		<td class="teksjudul" height="40">
			<font size="3"><img src="images/icon_berita.gif" align="absmiddle"> Customer And Client Project  </font>		</td>
		<td align="right">
		<a href="keranjang.php"  class="tekslink"></a>		</td>
	</tr>

</table>
<hr size="1" color="#87C6EC" width="95%">

<?php
$result = mysql_query("select * from tw_distribusi where Publish='1' order by ID") or die(mysql_error());
while($row=mysql_fetch_row($result)){
?>
<br>

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td class="tekshitam">
			<b><font size="2"><?php echo $row[0]?>. <?php echo $row[1]?></font></b>
		</td>
	</tr>
	<tr>
		<td  class="tekshitamkecil">
			<?php echo $row[2]?>
		</td>
	</tr>
</table>
<br>
<?php
}
	
print_footer();
?>