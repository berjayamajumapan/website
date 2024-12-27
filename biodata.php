<?php
session_start();
include "viewer.php";
include "include/connection.php";

print_header();

?>
<table width="99%" align="center">
	<tr>
		<td class="teksjudul" height="40">
			<font size="3"><img src="images/icon_hasil.gif" align="absmiddle"> Profile Direktur</font>
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
						 <table width="99%">
							<?php
							$result = mysql_query("select * from t_biodata where ID='".$_GET['no']."'") or die(mysql_error());
							?>
							<tr height="160">
								<?php
								$row=mysql_fetch_row($result);
								?>
								<td class="" colspan="2">
									<table cellspacing="1" bgcolor="#87C6EC" width="97%" height="100%" align="center">
										<tr>
											<td bgcolor="#FFFFFF" valign="top">
												<table width="95%" height="100%" cellpadding="2" align="center" class="tekshitam">
													<tr><td><img src="images/a.jpg" width="200" height="200" align="absmiddle"></td></tr>
													<tr>
														<td class="teksjudul_1">
															Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	: DEDI PURWANTO <font color="#FF6633"><?php echo $row[1]?></font>
														</td>
													</tr>
													<tr>
														<td class="teksjudul_1">
															TTL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Banyumas, 23 Maret 1976 <font color="#FF6633"><?php echo $row[2]?></font><br>
														</td>
													</tr>
													<tr>
														<td class="teksjudul_1">
															Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	: Karangjoang, Balikpapan, Kalimantan Timur<font color="#FF6633"><?php echo $row[3]?></font>
														</td>
													</tr>
													<tr>
														<td class="teksjudul_1">
															Telp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	: 0878 1207 4802 <font color="#FF6633"><?php echo $row[4]?></font>
														</td>
													</tr>
													<tr>
														<td class="teksjudul_1">
															No. HP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	: 0812 5473 5085  <font color="#FF6633"><?php echo $row[4]?></font>
														</td>
													</tr>
														
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="2" align="center">
									&nbsp;&nbsp;<a href="javascript:history.back();" class="tekslink1"><b>[ Back ]</b></a>
								</td>
							</tr>

						</table>
						


<?php
print_footer();
?>