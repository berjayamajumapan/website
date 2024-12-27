<?php
session_start();
include "../include/connection.php";
include "fungsi.php";
include "viewer.php";


checklanjut();

if(isset($_POST['simpan'])){
	$gambar="";
	$icon="";
	if (is_uploaded_file($_FILES['gambar']['tmp_name'])){			
		if (move_uploaded_file($_FILES['gambar']['tmp_name'], "../bookimages/".$_FILES['gambar']['name']) ){													
			$error = "Success upload images...";
			$suksesupload=1;
			$gambar="bookimages/".$_FILES['gambar']['name'];
		}			
	}
	if (is_uploaded_file($_FILES['icon']['tmp_name'])){			
		if (move_uploaded_file($_FILES['icon']['tmp_name'], "../bookimages/".$_FILES['icon']['name']) ){													
			$error = "Success upload images...";
			$suksesupload=1;
			$icon="bookimages/".$_FILES['icon']['name'];
		}			
	}
	if($_POST['no']=="AUTO"){ //tambah
		$no=ambilnomor("RIGHT(IDBuku,4)","tr_buku","B","0000");
		$field[1][1]="IDBuku";
		$field[1][2]="'".$no."'";
		$field[2][1]="Judul";
		$field[2][2]="'".$_POST['judul']."'";
		$field[3][1]="IDKategoriSpesifikasi";
		$field[3][2]="'".$_POST['spesifikasi']."'";
		$field[4][1]="IDPengarang";
		$field[4][2]="'".$_POST['pengarang']."'";
		$field[5][1]="IDKategoriBuku";
		$field[5][2]="'".$_POST['katbuku']."'";
		$field[6][1]="IDPenerbit";
		$field[6][2]="'".$_POST['penerbit']."'";
		$field[7][1]="JumlahHalaman";
		$field[7][2]="'".$_POST['jmlhal']."'";
		$field[8][1]="Edisi";
		$field[8][2]="'".$_POST['isbn']."'";
		$field[9][1]="IDKategoriBahasa";
		$field[9][2]="'".$_POST['katbahasa']."'";
		$field[10][1]="IDFormat";
		$field[10][2]="'".$_POST['format']."'";
		$field[11][1]="Kondisi";
		$field[11][2]="'".$_POST['kondisi']."'";
		$field[12][1]="TahunTerbit";
		$field[12][2]="'".$_POST['tahun']."'";
		$field[13][1]="Detail";
		$field[13][2]="'".$_POST['MyTextAreaName']."'";
		$field[14][1]="HargaBeli";
		$field[14][2]="'".$_POST['hargabeli']."'";
		$field[15][1]="HargaJual";
		$field[15][2]="'".$_POST['hargajual']."'";
		$field[16][1]="PathGambar1";
		$field[16][2]="'".$gambar."'";
		$field[17][1]="PathGambar";
		$field[17][2]="'".$icon."'";
		$field[18][1]="Publish";
		$field[18][2]="'".$_POST['publish']."'";
		$field[19][1]="New";
		$field[19][2]="'".$_POST['new']."'";
		$field[20][1]="Cool";
		$field[20][2]="'".$_POST['cool']."'";
		$field[21][1]="StokBuku";
		$field[21][2]="'".$_POST['stokbuku']."'";
		$field[22][1]="";
		$field[22][2]="";
		generate_query("insert",$field,"tr_buku","","");
	}
	else{ //edit
		if($gambar=="")
			$gambar=$_POST['tmpgambar'];
		if($icon=="")
			$icon=$_POST['tmpicon'];
			
		$field[1][1]="IDBuku";
		$field[1][2]="'".$_POST['no']."'";
		$field[2][1]="Judul";
		$field[2][2]="'".$_POST['judul']."'";
		$field[3][1]="IDKategoriSpesifikasi";
		$field[3][2]="'".$_POST['spesifikasi']."'";
		$field[4][1]="IDPengarang";
		$field[4][2]="'".$_POST['pengarang']."'";
		$field[5][1]="IDKategoriBuku";
		$field[5][2]="'".$_POST['katbuku']."'";
		$field[6][1]="IDPenerbit";
		$field[6][2]="'".$_POST['penerbit']."'";
		$field[7][1]="JumlahHalaman";
		$field[7][2]="'".$_POST['jmlhal']."'";
		$field[8][1]="Edisi";
		$field[8][2]="'".$_POST['isbn']."'";
		$field[9][1]="IDKategoriBahasa";
		$field[9][2]="'".$_POST['katbahasa']."'";
		$field[10][1]="IDFormat";
		$field[10][2]="'".$_POST['format']."'";
		$field[11][1]="Kondisi";
		$field[11][2]="'".$_POST['kondisi']."'";
		$field[12][1]="TahunTerbit";
		$field[12][2]="'".$_POST['tahun']."'";
		$field[13][1]="Detail";
		$field[13][2]="'".$_POST['MyTextAreaName']."'";
		$field[14][1]="HargaBeli";
		$field[14][2]="'".$_POST['hargabeli']."'";
		$field[15][1]="HargaJual";
		$field[15][2]="'".$_POST['hargajual']."'";
		$field[16][1]="PathGambar1";
		$field[16][2]="'".$gambar."'";
		$field[17][1]="PathGambar";
		$field[17][2]="'".$icon."'";
		$field[18][1]="Publish";
		$field[18][2]="'".$_POST['publish']."'";
		$field[19][1]="New";
		$field[19][2]="'".$_POST['new']."'";
		$field[20][1]="Cool";
		$field[20][2]="'".$_POST['cool']."'";
		$field[21][1]="StokBuku";
		$field[21][2]="'".$_POST['stokbuku']."'";
		$field[22][1]="";
		$field[22][2]="";
		generate_query("update",$field,"tr_buku","where IDBuku='".$_POST['no']."'","");
		if(isset($_GET['no'])){
			$_GET['no']="";
		}
	}
}

if(isset($_POST['pub'])){
	$field[1][1]="Publish";
	$field[1][2]="'0'";
	generate_query("update",$field,"tr_buku","","");
	while(list($key, $value)=each($_POST['publish'])){
		$field[1][1]="Publish";
		$field[1][2]="'1'";
		generate_query("update",$field,"tr_buku","where IDBuku='".$value."'","");
	}
}

if(isset($_GET['hapus'])){
	if($_GET['no']!=""){
		generate_query("delete","","tr_buku","where IDBuku='".$_GET['no']."'","");
	}
	if(isset($_GET['no'])){
		$_GET['no']="";
	}
}

if(isset($_GET['edit'])){
	if($_GET['no']!=""){
		$result1= mysql_query("select * from tr_buku where IDBuku='".$_GET['no']."'");
		$row1=mysql_fetch_row($result1);
	}
}

$result = mysql_query("select * from tr_buku order by IDBuku");

header_view();
?>
				<tr>
					<td class="judulbiru">
						Setup Product :
					</td>
				</tr>
				<tr>
					<td>
						<table class="tekshitamkecil" cellspacing="0">
							<form action="setupbuku.php" method="post" enctype="multipart/form-data">
							<tr>
								<td width="140">
									ID Product
								</td>
								<td class="rapet">
									<input type="text" name="tmpno" size="12" value="<?php
									if(isset($_GET['no'])){
										if($_GET['no']==""){
											echo "AUTO";
										}
										else{
											echo $row1[0];
										}
									}
									else
										echo "AUTO";
									?>" class="tekshitamkecil" disabled>
									<input type="hidden" name="no" size="12" value="<?php
									if(isset($_GET['no'])){
										if($_GET['no']==""){
											echo "AUTO";
										}
										else{
											echo $row1[0];
										}
									}
									else
										echo "AUTO";
									?>" class="tekshitam">
								</td>
							</tr>
							<tr>
								<td>	
									Judul Product								</td>
								<td class="rapet">	
									<input type="text" name="judul" size="40" class="tekshitamkecil" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[1];
									}
									?>">
								</td>
							</tr>
							<tr>
								<td>	
									Spesifikasi
								</td>
								<td>	
									<?php
									$result2=mysql_query("SELECT * FROM tr_kategori_spesifikasi");
									?>
									<select name="spesifikasi"  class="tekshitamkecil">
										<option>pilih------------------------------</option>
									<?php
									while($row2=mysql_fetch_row($result2)){
									?>
										<option value="<?php echo $row2[0]?>" <?php
											if(isset($_GET['edit'])){
												if($row1[2]==$row2[0]){
													echo " selected ";
												}
											}
										?>><?php echo $row2[1]?></option>
									<?php
									}
									?>
									</select>
								</td>
							</tr>
							<tr>
								<td>	
									Pengarang
								</td>
								<td>	
									<?php
									$result2=mysql_query("SELECT * FROM tr_pengarang");
									?>
									<select name="pengarang"  class="tekshitamkecil">
										<option>pilih------------------------------</option>
									<?php
									while($row2=mysql_fetch_row($result2)){
									?>
										<option value="<?php echo $row2[0]?>" <?php
											if(isset($_GET['edit'])){
												if($row1[3]==$row2[0]){
													echo " selected ";
												}
											}
										?>><?php echo $row2[1]?></option>
									<?php
									}
									?>
									</select>
								</td>
							</tr>
							<tr>
								<td>	
									Kategori Product								</td>
								<td>	
									<?php
									$result2=mysql_query("SELECT * FROM tr_kategori_buku");
									?>
									<select name="katbuku"  class="tekshitamkecil">
										<option>pilih------------------------------</option>
									<?php
									while($row2=mysql_fetch_row($result2)){
									?>
										<option value="<?php echo $row2[0]?>" <?php
											if(isset($_GET['edit'])){
												if($row1[4]==$row2[0]){
													echo " selected ";
												}
											}
										?>><?php echo $row2[1]?></option>
									<?php
									}
									?>
									</select>
								</td>
							</tr>
							<tr>
								<td>	
									Penerbit
								</td>
								<td>	
									<?php
									$result2=mysql_query("SELECT * FROM tr_penerbit");
									?>
									<select name="penerbit"  class="tekshitamkecil">
										<option>pilih------------------------------</option>
									<?php
									while($row2=mysql_fetch_row($result2)){
									?>
										<option value="<?php echo $row2[0]?>" <?php
											if(isset($_GET['edit'])){
												if($row1[5]==$row2[0]){
													echo " selected ";
												}
											}
										?>><?php echo $row2[1]?></option>
									<?php
									}
									?>
									</select>
								</td>
							</tr>
							
							<tr>
								<td>	
									Jumlah Halaman
								</td>
								<td class="rapet">	
									<input type="text" name="jmlhal" size="12" class="tekshitamkecil" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[6];
									}
									?>">
								</td>
							</tr>
							<tr>
								<td>	
									Edisi
								</td>
								<td class="rapet">	
									<input type="text" name="isbn" size="40" class="tekshitamkecil" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[7];
									}
									?>">
								</td>
							</tr>
							
							<tr>
								<td>	
									Kategori Bahasa
								</td>
								<td>	
									<?php
									$result2=mysql_query("SELECT * FROM tr_kategori_bahasa");
									?>
									<select name="katbahasa"  class="tekshitamkecil">
										<option>pilih------------------------------</option>
									<?php
									while($row2=mysql_fetch_row($result2)){
									?>
										<option value="<?php echo $row2[0]?>" <?php
											if(isset($_GET['edit'])){
												if($row1[8]==$row2[0]){
													echo " selected ";
												}
											}
										?>><?php echo $row2[1]?></option>
									<?php
									}
									?>
									</select>
								</td>
							</tr>
							<tr>
								<td>	
									Format
								</td>
								<td>	
									<?php
									$result2=mysql_query("SELECT * FROM tr_format");
									?>
									<select name="format"  class="tekshitamkecil">
										<option>pilih------------------------------</option>
									<?php
									while($row2=mysql_fetch_row($result2)){
									?>
										<option value="<?php echo $row2[0]?>" <?php
											if(isset($_GET['edit'])){
												if($row1[9]==$row2[0]){
													echo " selected ";
												}
											}
										?>><?php echo $row2[1]?></option>
									<?php
									}
									?>
									</select>
								</td>
							</tr>
							<tr>
								<td>	
									Kondisi
								</td>
								<td class="rapet">	
									<input type="text" name="kondisi" size="40" class="tekshitamkecil" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[10];
									}
									?>">
								</td>
							</tr>
							
							<tr>
								<td>	
									Tahun Terbit
								</td>
								<td class="rapet">	
									<input type="text" name="tahun" size="12" class="tekshitamkecil" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[11];
									}
									?>">
								</td>
							</tr>
							
							<tr>
								<td valign="top">	
									Detail Isi / Sinopsis
								</td>
								<td class="rapet">	
									<textarea cols="90" rows="20" name="MyTextAreaName"><?php
									if(isset($_GET['edit'])){
										echo $row1[12];
									}
									else{
										echo "";
									}
									?></textarea>
									<script language="JavaScript">
										//comment any button that you want to hide
										var AK_DisplayedButtons = Array(	
																'FontName',
																//'FontSize',
																'SelectAll',
																'Delete',
																'Cut',
																'Copy',
																'Paste',
																'SaveAs',
																'Print',
																'Separator',	
																'Bold',
																'Italic',
																'Underline',
																'Strikethrough',
																'Separator',
																'JustifyLeft',
																'JustifyCenter',
																'JustifyRight',
																'JustifyFull',
																'Separator',
																'InsertOrderedList',
																'InsertUnorderedList',
																'Outdent',
																'Indent',
																'Separator',
																'SuperScript',
																'SubScript',
																'Separator',
																'InsertHorizontalRule',
																'CreateLink',
																'Unlink',
																'Image',
																'Table',
																'SpecialChars',
																'Separator',
																'Forecolor',
																'Backcolor',
																'Separator',
																'Date',
																'ChangeMode',
																'Separator',							
																'Help'					//the last one has NO comma
															);
											var AK_width = 600;
											var AK_height = 300;
											
										// All fields are optional. Place "null" where you don't want to specify.
										//ak_wysiwyg_generator(width, height, "TextAreaName", DisplayedButtonList);
										ak_wysiwyg_generator(AK_width, AK_height, "MyTextAreaName", AK_DisplayedButtons);
										
										//Examples:
										// ak_wysiwyg_generator(null, null, "MyTextAreaName", AK_DisplayedButtons);
										// ak_wysiwyg_generator(AK_width, AK_height, null, AK_DisplayedButtons);
										// ak_wysiwyg_generator(AK_width, AK_height, "MyTextAreaName", null);
										
										// It can be no parameter at all
										// ak_wysiwyg_generator();  
									</script>
								</td>
							</tr>
							<tr>
								<td>	
									Harga Beli
								</td>
								<td class="rapet">	
									<input type="text" name="hargabeli" size="12" class="tekshitamkecil" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[13];
									}
									?>">
								</td>
							</tr>
							<tr>
								<td>	
									Harga Jual
								</td>
								<td class="rapet">	
									<input type="text" name="hargajual" size="12" class="tekshitamkecil" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[14];
									}
									?>">
								</td>
							</tr>
							<tr>
								<td>	
									Path Gambar
								</td>
								<td class="rapet">	
									<input type="file" name="gambar" size="40" class="tekshitam">
									<?php
									if(isset($_GET['edit'])){
										echo $row1[16];
									}
									?>
									<input type="hidden" name="tmpgambar" size="40" class="tekshitam" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[16];
									}
									?>"> <img src="../<?php echo $row1[16]?>" align="texttop">
								</td>
							</tr>
							<tr>
								<td>	
									Path Icon
								</td>
								<td class="rapet">	
									<input type="file" name="icon" size="40" class="tekshitam">
									<?php
									if(isset($_GET['edit'])){
										echo $row1[15];
									}
									?>
									<input type="hidden" name="tmpicon" size="40" class="tekshitam" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[15];
									}
									?>"> <img src="../<?php echo $row1[15]?>" align="texttop">
								</td>
							</tr>
							<tr>
								<td>	
									Publish
								</td>
								<td class="rapet">	
									<select name="publish" class="tekshitam">
										<option value="1" <?php
										if(isset($_GET['edit'])){
											if($row1[17]==1)
												echo "selected";
										}
										?>>Yes</option>
										<option value="0" <?php
										if(isset($_GET['edit'])){
											if($row1[17]==0)
												echo "selected";
										}
										?>>No</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>	
									New Book
								</td>
								<td class="rapet">	
									<select name="new" class="tekshitam">
										<option value="1" <?php
										if(isset($_GET['edit'])){
											if($row1[18]==1)
												echo "selected";
										}
										?>>Yes</option>
										<option value="0" <?php
										if(isset($_GET['edit'])){
											if($row1[18]==0)
												echo "selected";
										}
										?>>No</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>	
									Cool Book
								</td>
								<td class="rapet">	
									<select name="cool" class="tekshitam">
										<option value="1" <?php
										if(isset($_GET['edit'])){
											if($row1[19]==1)
												echo "selected";
										}
										?>>Yes</option>
										<option value="0" <?php
										if(isset($_GET['edit'])){
											if($row1[19]==0)
												echo "selected";
										}
										?>>No</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>	
									<b>Stok Product</b>								</td>
								<td class="rapet">	
									<input type="text" name="stokbuku" size="12" class="tekshitamkecil" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[20];
									}
									?>">
								</td>
							</tr>
							<tr>
								<td>								
								</td>
								<td align="center">
									<input type="submit" name="simpan" value="Save" class="tekshitam">
									<input type="reset" name="reset" value="Reset" class="tekshitam">
								</td>
							</tr>
							</form>
						</table>
						<br>
						<table  bgcolor="#333333" cellspacing="1" border="0" width="80%">
							<tr class="teksmerah" bgcolor="#FF9966">
								<td>
									ID
								</td>
								<td>Product</td>
								<td width="50">
									Edit
								</td>
								<td width="10">
									Delete
								</td>
								<td width="10">
									Publish
								</td>
							</tr>
							<form action="" method="post" enctype="multipart/form-data">
							<?php
							while($row=mysql_fetch_row($result)){
							?>
							<tr bgcolor="#FDFDFD" class="tekshitam" valign="top">
								<td>
									<?php echo $row[0]?>		
								</td>
								<td>
									<?php echo $row[1]?>
								</td>
								<td>
									<a href="setupbuku.php?edit=1&no=<?php echo $row[0]?>" class="link">Edit</a>
								</td>
								<td>
									<a href="setupbuku.php?hapus=1&no=<?php echo $row[0]?>" class="link">Delete</a>
								</td>
								<td>
									<input type="checkbox" name="publish[]" value="<?php echo $row[0]?>" <?php
									if($row[17]=='1'){
										echo "checked";
									}
									?>>
								</td>
							</tr>
							<?php
							}
							?>
							<tr bgcolor="#FDFDFD" class="tekshitam">
								<td>
								</td>
								<td>
								</td>
								<td>
								</td>
								<td>
								</td>
								<td>
									<input type="submit" name="pub" class="tekshitam" value="publish">
								</td>
							</tr>
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