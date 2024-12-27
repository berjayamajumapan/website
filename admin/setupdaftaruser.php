<?php
session_start();
include "../include/connection.php";
include "fungsi.php";
include "viewer.php";


checklanjut();
init_print_nav(3);

if(isset($_POST['txtEmail'])){ //proses
	
	//cek alamat email yang sudah terpakai
	if($_GET['edit']!="1"){
		$result = mysql_query("select 1 from tr_anggota where ID='".$_POST['txtEmail']."'");
	}
	else{
		$result = mysql_query("select 1 from tr_anggota where ID=''");
	}
	$row=mysql_fetch_row($result);
	
	if($row[0]=="1"){
		$ulang=true;
		echo "<SCRIPT LANGUAGE = 'JavaScript'>";
	    echo "alert ('Alamat Email sudah dipakai! Silahkan isi alamat email baru!');";
		echo "</SCRIPT>";
	}
	else{
		$field[1][1]="ID";
		$field[1][2]="'".$_POST['txtEmail']."'";
		$field[2][1]="Password";
		$field[2][2]="'".$_POST['txtPassword']."'";
		$field[3][1]="JK";
		$field[3][2]="'".$_POST['txtJK']."'";
		$field[4][1]="FirstName";
		$field[4][2]="'".$_POST['txtFirstName']."'";
		$field[5][1]="LastName";
		$field[5][2]="'".$_POST['txtLastName']."'";
		$field[6][1]="TanggalLahir";
		$field[6][2]="'".$_POST['txtTanggalLahir']."'";
		$field[7][1]="Email";
		$field[7][2]="'".$_POST['txtEmail']."'";
		$field[8][1]="Jalan";
		$field[8][2]="'".$_POST['txtJalan']."'";
		$field[9][1]="Suburb";
		$field[9][2]="'".$_POST['txtSuburb']."'";
		$field[10][1]="KodePos";
		$field[10][2]="'".$_POST['txtKodePos']."'";
		$field[11][1]="Kota";
		$field[11][2]="'".$_POST['txtKota']."'";
		$field[12][1]="Zone";
		$field[12][2]="'".$_POST['txtZone']."'";
		$field[13][1]="Negara";
		$field[13][2]="'".$_POST['txtNegara']."'";
		$field[14][1]="Telepon";
		$field[14][2]="'".$_POST['txtTelepon']."'";
		$field[15][1]="Fax";
		$field[15][2]="'".$_POST['txtFax']."'";
		$field[16][1]="NewArrival";
		$field[16][2]="'".$_POST['txtNewArrival']."'";
		$field[17][1]="Newsletter";
		$field[17][2]="'".$_POST['txtNewsletter']."'";
		$field[18][1]="";
		$field[18][2]="";

		if($_GET['edit']!="1"){
			generate_query("insert",$field,"tr_anggota","","");
		}
		else{
			generate_query("update",$field,"tr_anggota"," where ID='".$_POST['txtEmail']."' ","");
			$_GET['edit']="";
		}		
	}
}

if(isset($_GET['edit'])){
	if($_GET['no']!=""){
		$result1= mysql_query("select * from tr_anggota where ID='".$_GET['no']."'");
		$row1=mysql_fetch_row($result1);
	}
}


if(isset($_GET['hapus'])){
	if($_GET['no']!=""){
		generate_query("delete","","tr_anggota","where ID='".$_GET['no']."'","");
	}
	if(isset($_GET['no'])){
		$_GET['no']="";
	}
}

$result1 = mysql_query("select * from tr_anggota $limit");

header_view();

?>
				<tr>
					<td>
						<table width="99%" align="center">
							<tr>
								<td class="title" height="40">
									&nbsp;&nbsp;&raquo;Informasi Pelanggan
								</td>
								<td align="right" class="tekslink">
								</td>
							</tr>
							<tr height="160">
								<td class="" colspan="2">
									<form method="post" action="" NAME = "fmForm" onSubmit = "return evKirim()" > 
										<table width="100%" cellpadding="2" class="tekshitam">
											<tr>
												<td class="teksjudul" width="30%" align="left" valign="top">
													Personal Details  
												</td>
												<td class="teksmerah" align="right">
													<font color="#FF0000">*) Wajib diisi</font>
												</td>
											</tr>
											<tr>
												<td width="100%" colspan="2" class="tekshitamkecil">
													<table cellspacing="1" bgcolor="#FF9966" width="100%">
														<tr>
															<td bgcolor="#ffffff" valign="top" width="100%">
																<table width="100%" cellpadding="5" class="tekshitamkecil">
																	<tr>
																		<td class="tekshitamkecil"  align="left" valign="top" width="30%">
																			Jenis Kelamin
																		</td>
																		<td class="tekshitamkecil">
																			<input type="radio" value="0" NAME = "txtJK" <?php
																				if($_GET['edit']=="1"){
																					if($row1[2]=="0"){
																						echo "checked";
																					}
																				}
																			?>> Male
																			<input type="radio" value="1" NAME = "txtJK" <?php
																				if($_GET['edit']=="1"){
																					if($row1[2]!="0"){
																						echo "checked";
																					}
																				}
																			?>> FeMale 
																			<font color="#FF0000">*</font>
																		</td>
																	</tr>
																		<tr>
																			<td class="tekshitamkecil"  align="left" valign="top">
																				Nama Depan
																			</td>
																			<td>
																				<input type="text" class="tekshitamkecil" size="50" NAME = "txtFirstName" value="<?php
																					if($_GET['edit']=="1"){
																						echo $row1[3];
																					}
																				?>">
																				<font color="#FF0000">*</font>
																			</td>
																		</tr>
																		<tr>
																			<td class="tekshitamkecil"  align="left" valign="top">
																				Nama Belakang
																			</td>
																			<td>
																				<input type="text" class="tekshitamkecil" size="50" NAME = "txtLastName" value="<?php
																					if($_GET['edit']=="1"){
																						echo $row1[4];
																					}
																				?>">
																				<font color="#FF0000">*</font>
																			</td>
																		</tr>
																		<tr>
																			<td class="tekshitamkecil"  align="left" valign="top">
																				Tanggal Lahir
																			</td>
																			<td class="tekshitamkecil">
																				<input type="text" class="tekshitamkecil" size="20" NAME = "txtTanggalLahir" value="<?php
																					if($_GET['edit']=="1"){
																						echo $row1[5];
																					}
																				?>">
																				<font color="#FF0000">*</font>
																				(eg. 01/05/1970)
																			</td>
																		</tr>
																		<tr>
																			<td class="tekshitamkecil"  align="left" valign="top">
																				E-Mail <font color="#FF0000">(untuk Login ID)</font>
																			</td>
																			<td>
																				<input type="text" class="tekshitamkecil" size="50" NAME = "txtEmail" value="<?php
																					if($_GET['edit']=="1"){
																						echo $row1[6];
																					}
																				?>"><font color="#FF0000">*</font>
																			</td>
																		</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td class="teksjudul" width="30%" align="left" valign="top">
													<br>Alamat
												</td>
												<td class="teksmerah" align="right">
												</td>
											</tr>
											<tr>
												<td width="100%" colspan="2">
													<table cellspacing="1" bgcolor="#FF9966" width="100%">
														<tr>
															<td bgcolor="#ffffff" valign="top" width="100%">
																<table width="100%" cellpadding="5" class="tekshitamkecil">
																	<tr>
																		<td class="tekshitamkecil"  align="left" valign="top">
																			Jalan, No
																		</td>
																		<td>
																			<input type="text" class="tekshitamkecil" size="50" NAME = "txtJalan" value="<?php
																					if($_GET['edit']=="1"){
																						echo $row1[7];
																					}
																			?>">
																			<font color="#FF0000">*</font>
																		</td>
																	</tr>
																	<tr>
																		<td class="tekshitamkecil"  align="left" valign="top">
																			Kawasan / Daerah
																		</td>
																		<td>
																			<input type="text" class="tekshitamkecil" size="30" NAME = "txtSuburb" value="<?php
																					if($_GET['edit']=="1"){
																						echo $row1[8];
																					}
																			?>">
																			<font color="#FF0000">*</font>
																		</td>
																	</tr>
																	<tr>
																		<td class="tekshitamkecil"  align="left" valign="top">
																			Kode Pos
																		</td>
																		<td class="tekshitamkecil">
																			<input type="text" class="tekshitamkecil" size="20" NAME = "txtKodePos" value="<?php
																					if($_GET['edit']=="1"){
																						echo $row1[9];
																					}
																			?>">
																			<font color="#FF0000">*</font>
																		</td>
																	</tr>
																	<tr>
																		<td class="tekshitamkecil"  align="left" valign="top">
																			Kota
																		</td>
																		<td>
																			<input type="text" class="tekshitamkecil" size="30" NAME = "txtKota" value="<?php
																					if($_GET['edit']=="1"){
																						echo $row1[10];
																					}
																			?>">
																			<font color="#FF0000">*</font>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td class="teksjudul" width="30%" align="left" valign="top">
													<br>Informasi Kontak
												</td>
												<td class="teksmerah" align="right">
												</td>
											</tr>
											<tr>
												<td width="100%" colspan="2">
													<table cellspacing="1" bgcolor="#FF9966" width="100%">
														<tr>
															<td bgcolor="#ffffff" valign="top" width="100%">
																<table width="100%" cellpadding="5" class="tekshitamkecil">
																	<tr>
																		<td class="tekshitamkecil"  align="left" valign="top" width="30%">
																			No Telpon / HP
																		</td>
																		<td>
																			<input type="text" class="tekshitamkecil" size="30" NAME = "txtTelepon" value="<?php
																					if($_GET['edit']=="1"){
																						echo $row1[13];
																					}
																			?>">
																			<font color="#FF0000">*</font>
																		</td>
																	</tr>
																	<tr>
																		<td class="tekshitamkecil"  align="left" valign="top">
																			Nomor Fax
																		</td>
																		<td>
																			<input type="text" class="tekshitamkecil" size="30" NAME = "txtFax" value="<?php
																					if($_GET['edit']=="1"){
																						echo $row1[14];
																					}
																			?>">
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td class="teksjudul" width="30%" align="left" valign="top">
													<br>Login Password  
												</td>
												<td class="teksmerah" align="right">
												</td>
											</tr>
											<tr>
												<td width="100%" colspan="2">
													<table cellspacing="1" bgcolor="#FF9966" width="100%">
														<tr>
															<td bgcolor="#ffffff" valign="top" width="100%">
																<table width="100%" cellpadding="5" class="tekshitamkecil">
																	<tr>
																		<td class="tekshitamkecil"  align="left" valign="top"  width="30%">
																			Password
																		</td>
																		<td>
																			<input type="text" class="tekshitamkecil" size="30" NAME = "txtPassword" value="<?php
																					if($_GET['edit']=="1"){
																						echo $row1[1];
																					}
																			?>">
																			<font color="#FF0000">*</font>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<br>
													&nbsp;&nbsp;<input type="image" name="ok" value=" Lanjutkan >> " class="tekshitam" src="../images/button_continue.gif">
												</td>
												<td>
												</td>
											</tr>
										</table>
									</form>
								</td>
							</tr>

						</table>
					</td>
				</tr>

				<tr>

					<td class="teksjudul">

						Daftar Anggota:

					</td>

				</tr>

				<tr>

					<td>

						<table align="center">

							<tr class="tekshitamkecil"> 

								<td>

									<?php

										print_nav("setupdaftaruser.php", "tr_anggota", "ID", "", " ");

									?>

								</td>

							</tr>

						</table>						

						<br>

						<table  bgcolor="#CC3300" cellspacing="1" border="0" width="100%" cellpadding="3">

							<tr class="teksmerah" bgcolor="#FFCC66">

								<td width="30%">

									ID

								</td>

								<td width="40%">

									Data Pribadi

								</td>

								<td>

									Order Buku

								</td>
								<td>Update</td>

								<td width="10">
									Delete
								</td>
							</tr>

							<form action="" method="post" enctype="multipart/form-data">

							<?php

							while($row1=mysql_fetch_row($result1)){

							?>

							<tr bgcolor="#FDFDFD" class="tekshitamkecil" valign="top">

								<td>
									<br>						
									<?php echo $row1[0]?>		

								</td>

								<td>

								<?php
									$tmp1="no";
									$tmp2="no";
									if($row1[14]=="1"){
										$tmp1="yes";
									}
									if($row1[15]=="1"){
										$tmp2="yes";
									}
									
									echo "<br>

										<b>Name</b>\t\t: ".$row1[3]." ".$row1[4]."<br>

										Email\t\t: ".$row1[6]."<br><br>
										<hr size=1>
										Alamat\t\t <br>
										Jalan\t\t: ".$row1[7]."<br>
										Suburb\t\t: ".$row1[8]."<br>
										Kode Pos\t\t: ".$row1[9]."<br>
										Kota\t\t: ".$row1[10]."<br>
										Negara\t\t: ".$row1[12]."<br>
										Telp/Fax\t\t: ".$row1[13]."/".$row1[14]."<br>
										<hr size=1>
										New Arrivel : ".$tmp1."<br>
										News Letter : ".$tmp2."
										<br>";
								?>

								</td>

								<td valign="top">
									<br>

									<?php
									$result2=mysql_query("select * from tr_order where ID = '".$row1[0]."'");
									while($row2=mysql_fetch_row($result2)){
									?>
										<b><a href="setuporder.php?edit=1&no=<?php echo $row2[0]?>"><?php echo $row2[0]?></a></b>, status :
									<?php
										if($row2[6]=='0'){
											echo "Order";
										}
										elseif($row2[6]=='1'){
											echo "Approve";
										}
										elseif($row2[6]=='2'){
											echo "Finish";
										}
									?>										
									<br>
									<br>
									<?php
									}	
									?>		

								</td>
								<td>
									<a href="setupdaftaruser.php?edit=1&no=<?php echo $row1[0]?>" class="link">Edit</a>
								</td>
								<td>
									<a href="setupdaftaruser.php?hapus=1&no=<?php echo $row1[0]?>" class="link">Delete</a>
								</td>
								
								<!--

								<td align="center">

									<a href="mailto:<?php//=$row1[2]?>" class="link">Reply</a>

								</td>
								-->

							</tr>

							<?php

							}

							?>

							</form>

						</table>

					</td>

				</tr>

			</table>

		</td>

	</tr>

<?php

footer_view();

?>