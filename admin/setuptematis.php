<?
session_start();
include "../include/connection.php";
include "fungsi.php";
include "viewer.php";

checklanjut();

if(isset($_POST['simpan'])){
	$gambar="";
	$gambar1="";
	if (is_uploaded_file($_FILES['gambar']['tmp_name'])){			
		if (move_uploaded_file($_FILES['gambar']['tmp_name'], "../cimages/".$_FILES['gambar']['name']) ){													
			$error = "Sukses upload gambar...";
			$suksesupload=1;
			$gambar="cimages/".$_FILES['gambar']['name'];
		}			
	}

	if (is_uploaded_file($_FILES['gambar1']['tmp_name'])){			
		if (move_uploaded_file($_FILES['gambar1']['tmp_name'], "../cimages/".$_FILES['gambar1']['name']) ){													
			$error = "Sukses upload gambar...";
			$suksesupload=1;
			$gambar1="cimages/".$_FILES['gambar1']['name'];
		}			
	}

	if($_POST['kode']=="AUTO"){ //tambah
		$field[1][1]="Judul";
		$field[1][2]="'".$_POST['judul']."'";
		$field[2][1]="Judul_PathGambar";
		$field[2][2]="'".$gambar."'";
		$field[3][1]="isi";
		$field[3][2]="'".$_POST['MyTextAreaName']."'";
		$field[4][1]="PathGambar";
		$field[4][2]="'".$gambar1."'";
		$field[5][1]="Publish";
		$field[5][2]="'".$_POST['publish']."'";
		$field[6][1]="";
		$field[6][2]="";
		generate_query("insert",$field,"t_tematis","","");
	}
	else{ //edit
		if($gambar=="")
			$gambar=$_POST['tmpgambar'];
		if($gambar1=="")
			$gambar1=$_POST['tmpgambar1'];
			
		$field[1][1]="Judul";
		$field[1][2]="'".$_POST['judul']."'";
		$field[2][1]="Judul_PathGambar";
		$field[2][2]="'".$gambar."'";
		$field[3][1]="isi";
		$field[3][2]="'".$_POST['MyTextAreaName']."'";
		$field[4][1]="PathGambar";
		$field[4][2]="'".$gambar1."'";
		$field[5][1]="Publish";
		$field[5][2]="'".$_POST['publish']."'";
		$field[6][1]="";
		$field[6][2]="";
		generate_query("update",$field,"t_tematis","where ID=".$_POST['kode'],"");
		if(isset($_GET['kode'])){
			$_GET['kode']="";
		}
	}
}

if(isset($_POST['pub'])){
	$field[1][1]="Publish";
	$field[1][2]="'0'";
	$field[2][1]="";
	$field[2][2]="";
	generate_query("update",$field,"t_tematis","","");
	while(list($key, $value)=each($_POST['publish'])){
		$field[1][1]="Publish";
		$field[1][2]="'1'";
		$field[2][1]="";
		$field[2][2]="";
		generate_query("update",$field,"t_tematis","where ID=".$value,"");
	}
}

if(isset($_GET['hapus'])){
	if($_GET['kode']!=""){
		generate_query("delete","","t_tematis","where ID=".$_GET['kode'],"");
	}
	if(isset($_GET['kode'])){
		$_GET['kode']="";
	}
}

if(isset($_GET['edit'])){
	if($_GET['kode']!=""){
		$result1= mysql_query("select * from t_tematis where ID=".$_GET['kode']) or die(mysql_error());
		$row1=mysql_fetch_row($result1);
	}
}

$result = mysql_query("select * from t_tematis order by ID");

header_view();
?>
				<tr>
					<td class="judul">
						<font size="2">Setup Halaman Utama:</font>
					</td>
				</tr>
				<tr>
					<td>
						<table class="tekshitam" cellspacing="0">
							<form action="setuptematis.php" method="post" enctype="multipart/form-data">
							<tr>
								<td>
									Kode
								</td>
								<td class="rapet">
									<input type="text" name="tmpno" size="12" value="<?
									if(isset($_GET['kode'])){
										if($_GET['kode']==""){
											echo "AUTO";
										}
										else{
											echo $row1[0];
										}
									}
									else
										echo "AUTO";
									?>" class="tekshitam" disabled>
									<input type="hidden" name="kode" size="12" value="<?
									if(isset($_GET['kode'])){
										if($_GET['kode']==""){
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
									Judul
								</td>
								<td class="rapet">	
									<input type="text" name="judul" size="70" class="tekshitam" maxlength="90" value="<?
									if(isset($_GET['edit'])){
										echo $row1[1];
									}
									?>">
								</td>
							</tr>
							<tr>
								<td>
									Path Gambar Judul
								</td>
								<td class="rapet">
									<input type="file" name="gambar" size="40" class="tekshitam">
									<?
									if(isset($_GET['edit'])){
										echo $row1[2];
									}
									?>
									<input type="hidden" name="tmpgambar" size="40" class="tekshitam" value="<?
									if(isset($_GET['edit'])){
										echo $row1[2];
									}
									?>">
								</td>
							</tr>
							<tr>
								<td valign="top">	
									Isi
								</td>
								<td class="rapet">	
									<textarea cols="90" rows="20" name="MyTextAreaName"><?
									if(isset($_GET['edit'])){
										echo $row1[4];
									}
									else{
										echo "Tulis disini..";
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
									Path Gambar
								</td>
								<td class="rapet">	
									<input type="file" name="gambar1" size="40" class="tekshitam">
									<?
									if(isset($_GET['edit'])){
										echo $row1[3];
									}
									?>
									<input type="hidden" name="tmpgambar1" size="40" class="tekshitam" value="<?
									if(isset($_GET['edit'])){
										echo $row1[3];
									}
									?>">
								</td>
							</tr>
							<tr>
								<td>	
									Publish
								</td>
								<td class="rapet">	
									<select name="publish" class="tekshitam">
										<option value="1" <?
										if(isset($_GET['edit'])){
											if($row1[5]=='1')
												echo "selected";
										}
										?>>Ya</option>
										<option value="0" <?
										if(isset($_GET['edit'])){
											if($row1[5]=='0')
												echo "selected";
										}
										?>>Tidak</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>								
								</td>
								<td align="center">
									<input type="submit" name="simpan" value="simpan" class="tekshitam">
									<input type="reset" name="reset" value="reset" class="tekshitam">
								</td>
							</tr>
							</form>
						</table>
						<hr size="1" color="#CC3300">
						<br>
						<table  bgcolor="#CC3300" cellspacing="1" border="0" width="80%" align="center">
							<tr class="tableheader" bgcolor="#FFCC66">
								<td height="20" width="10%">
									No
								</td>
								<td width="80%">
									Judul
								</td>
								<td width="2%">
									Edit
								</td>
								<td width="2%">
									Hapus
								</td>
								<td width="2%">
									Publish
								</td>
							</tr>
							<form action="" method="post" enctype="multipart/form-data">
							<?
							while($row=mysql_fetch_row($result)){
							?>
							<tr bgcolor="#FDFDFD" class="tekshitam" valign="top">
								<td>
									<?=$row[0]?>		
								</td>
								<td>
									<?=$row[1]?>		
								</td>
								<td>
									<a href="setuptematis.php?edit=1&kode=<?=$row[0]?>" class="tekslink">Edit</a>
								</td>
								<td>
									<a href="setuptematis.php?hapus=1&kode=<?=$row[0]?>" class="tekslink">Hapus</a>
								</td>
								<td>
									<input type="radio" name="publish[]" value="<?=$row[0]?>" <?
									if($row[5]=='1'){
										echo "checked";
									}
									?>>
								</td>
							</tr>
							<?
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
									<input type="submit" name="pub" class="tekshitam" value="Simpan">
								</td>
							</tr>
							</form>
						</table>
						<br>
					</td>
				</tr>
<?php
footer_view();
?>