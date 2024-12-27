<?php
session_start();
include "viewer.php";
include "include/connection.php";
include "include/query_function.php";

checkawal();

print_header("login");

?>
<table width="99%" align="center">
	<tr>
		<td class="teksjudul" height="40">
			<font size="3"><img src="images/icon_siswa.gif" align="absmiddle"> Login Member </font>		</td>
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
<hr size="1" color="#87C6EC" width="95%">
						<!--BEGIN : ISI TENGAH-->
						<table width="99%" align="center">
						</table>
						<table width="99%" align="center">
							<tr height="120">
								<td class="teksjudul" width="35%" valign="top" align="center">
									<font color="#FF0000"><?php echo $error?></font>
									<br>
									<?php
										if(!isset($_SESSION['id'])){
									?>
									<table cellspacing="1" bgcolor="#FF9966" width="50%" align="center">
										<tr>
											<td bgcolor="#ffffff" valign="top">
												<table width="100%" cellpadding="5">
													<form action="" method="post">
													<tr>
														<td width="37%" valign="top" colspan="2" class="teksjudul">
															SIGN IN
														</td>
													</tr>
													<tr>
														<td width="37%" valign="top" align="right" class="tekshitamkecil">
															Email :
														</td>
														<td>
															<input type="text" name="id" class="tekshitamkecil">
														</td>
													</tr>
													<tr>
														<td width="10%" valign="top" align="right" class="tekshitamkecil">
															Password :
														</td>
														<td>
															<input type="password" name="pass" class="tekshitamkecil">
														</td>
													</tr>
													<tr>
														<td width="10%" valign="top" align="right" class="tekshitamkecil">
														</td>
														<td>
															<input type="image" name="login" src="images/button_login.gif" value=" GO ! ">
														</td>
													</tr>
													</form>
												</table>
											</td>
										</tr>
									</table>
									<?php
									}
									?>
									<br><br><br>
									<a href="#" onClick="document.fmSearch.submit();"><img src="images/button_continue_shop.gif" border="0"></a>
								</td>
							</tr>
						</table>

<?php
print_footer();
?>