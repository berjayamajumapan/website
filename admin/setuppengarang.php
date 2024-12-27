<?php
session_start();
include "../include/connection.php";
include "fungsi.php";
include "viewer.php";


checklanjut();

if(isset($_POST['simpan'])){

	if($_POST['no']=="AUTO"){ //tambah
		$no=ambilnomor("IDPengarang","tr_pengarang","","000");
		$field[1][1]="IDPengarang";
		$field[1][2]="'".$no."'";
		$field[2][1]="NamaPengarang";
		$field[2][2]="'".$_POST['txt']."'";
		$field[3][1]="Keterangan";
		$field[3][2]="'".$_POST['MyTextAreaName']."'";
		$field[4][1]="";
		$field[4][2]="";
		generate_query("insert",$field,"tr_pengarang","","");
	}
	else{ //edit

		$field[1][1]="IDPengarang";
		$field[1][2]="'".$_POST['no']."'";
		$field[2][1]="NamaPengarang";
		$field[2][2]="'".$_POST['txt']."'";
		$field[3][1]="Keterangan";
		$field[3][2]="'".$_POST['MyTextAreaName']."'";
		$field[4][1]="";
		$field[4][2]="";
		generate_query("update",$field,"tr_pengarang","where IDPengarang='".$_POST['no']."'","");
		if(isset($_GET['no'])){
			$_GET['no']="";
		}
	}
}

if(isset($_GET['hapus'])){
	if($_GET['no']!=""){
		generate_query("delete","","tr_pengarang","where IDPengarang='".$_GET['no']."'","");
	}
	if(isset($_GET['no'])){
		$_GET['no']="";
	}
}

if(isset($_GET['edit'])){
	if($_GET['no']!=""){
		$result1= mysql_query("select * from tr_pengarang where IDPengarang='".$_GET['no']."'");
		$row1=mysql_fetch_row($result1);
	}
}

$result = mysql_query("select * from tr_pengarang order by IDPengarang");

header_view();
?>
				<tr>
					<td class="judulbiru">
						Setup News:
					</td>
				</tr>
				<tr>
					<td>
					<table class="tekshitam" cellspacing="0">
						<form action="setuppengarang.php" method="post" enctype="multipart/form-data">
							<tr>
								<td>
									ID
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
									?>" class="tekshitam" disabled>
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
									Pengarang
								</td>
								<td class="rapet">	
									<input type="text" name="txt" size="40" class="tekshitam" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[1];
									}
									?>">
								</td>
							</tr>
							<tr>
								<td valign="top">	
									Keterangan
								</td>
								<td class="rapet">	
									<textarea cols="90" rows="20" name="MyTextAreaName"><?php
									if(isset($_GET['edit'])){
										echo $row1[2];
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
								</td>
								<td align="center">
									<input type="submit" name="simpan" value="Save" class="tekshitam">
									<input type="reset" name="reset" value="Reset" class="tekshitam">
								</td>
							</tr>
							</form>
						</table>
						<br>
						<table  bgcolor="#333333" cellspacing="1" border="0" width="80%" cellpadding="3">
							<tr class="teksmerah" bgcolor="#FF9966">
								<td>
									ID
								</td>
								<td>
									Judul
								</td>
								<td width="50">
									Edit
								</td>
								<td width="10">
									Delete
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
									<a href="setuppengarang.php?edit=1&no=<?php echo $row[0]?>" class="link">Edit</a>
								</td>
								<td>
									<a href="setuppengarang.php?hapus=1&no=<?php echo $row[0]?>" class="link">Delete</a>
								</td>
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