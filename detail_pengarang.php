<?php
session_start();
include "viewer.php";
include "include/connection.php";

print_header();

?>
<table width="99%" align="center">
	<tr>
		<td class="teksjudul" height="40">
			<font size="3"><img src="images/icon_siswa.gif" align="absmiddle"> Detail Product </font>		</td>	
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
</table>
						 <table width="99%">
							<tr height="160">
								<?php
								$result = mysql_query("select * from tr_pengarang  
													   where IDPengarang='".$_GET['ID']."'") or die(mysql_error());
								$row=mysql_fetch_row($result);
								?>
								<td class="" colspan="2">
									<table cellspacing="1" bgcolor="#87C6EC" width="97%" height="100%" align="center">
										<tr>	
											<td bgcolor="#FFFFFF" valign="top">
												<table width="95%" height="100%" cellpadding="2" align="center">
													<tr>
														<td valign="top" class="tekshitam">
															<font size="3"><b>Product Name : <?php echo $row[1]?></b></font></div>														</td>
													</tr>
													<tr>
														<td class="title">
															<font color="#FF6633">Product : </font>														</td>
													</tr>
													<?php
													$result2 = mysql_query("select IDBuku, Judul from tr_buku  
																		   where IDPengarang='".$_GET['ID']."'") or die(mysql_error());
													while($row2=mysql_fetch_row($result2)){
													?>
													<tr>
														<td class="teksjudul_1">
															<li> <a href="product_detail.php?ID=<?php echo $row2[0]?>" class="tekslink1"><font color="#FF6633"><?php echo $row2[1]?></font></a>
														</td>
													</tr>
													<?php
													}
													?>
													<tr>
														<td colspan="2" class="teksjudul">
															<br>
															Product Detail :
														</td>
													</tr>
													<tr>
														<td colspan="2" class="tekshitamkecil">
															<?php echo $row[2]?>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="2" align="left">
									&nbsp;&nbsp;<a href="javascript:history.back();" class="tekslink1"><b>[ Back ]</b></a>
								</td>
							</tr>

						</table>
						


<?php
print_footer();
?>