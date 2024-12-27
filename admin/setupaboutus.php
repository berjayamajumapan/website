<?php
session_start();
include "../include/connection.php";
include "fungsi.php";
include "viewer.php";

checklanjut();

if(isset($_POST['simpan'])){
	if($_POST['no']=="AUTO"){ //tambah
		$no=ambilnomor("IDAboutus","tbl_parameter","0","000000000");
		$field[1][1]="ID";
		$field[1][2]="'".$no."'";
		$field[2][1]="Title";
		$field[2][2]="'".$_POST['judul']."'";
		$field[3][1]="Content";
		$field[3][2]="'".$_POST['MyTextAreaName']."'";
		$field[4][1]="Publish";
		$field[4][2]="'".$_POST['publish']."'";
		$field[5][1]="";
		$field[5][2]="";
		generate_query("insert",$field,"tbl_aboutus","","");
	}
	else{ //edit
		$field[1][1]="ID";
		$field[1][2]="'".$_POST['no']."'";
		$field[2][1]="Title";
		$field[2][2]="'".$_POST['judul']."'";
		$field[3][1]="Content";
		$field[3][2]="'".$_POST['MyTextAreaName']."'";
		$field[4][1]="Publish";
		$field[4][2]="'".$_POST['publish']."'";
		$field[5][1]="";
		$field[5][2]="";
		generate_query("update",$field,"tbl_aboutus","where ID='".$_POST['no']."'","");
		if(isset($_GET['no'])){
			$_GET['no']="";
		}
	}
}

if(isset($_POST['pub'])){
	$field[1][1]="Publish";
	$field[1][2]="'0'";
	generate_query("update",$field,"tbl_aboutus","","");
	while(list($key, $value)=each($_POST['publish'])){
		$field[1][1]="Publish";
		$field[1][2]="'1'";
		generate_query("update",$field,"tbl_aboutus","where ID='".$value."'","");
	}
}

if(isset($_GET['hapus'])){
	if($_GET['no']!=""){
		generate_query("delete","","tbl_aboutus","where ID='".$_GET['no']."'","");
	}
	if(isset($_GET['no'])){
		$_GET['no']="";
	}
}

if(isset($_GET['edit'])){
	if($_GET['no']!=""){
		$result1= mysql_query("select * from tbl_aboutus where ID='".$_GET['no']."'");
		$row1=mysql_fetch_row($result1);
	}
}

$result = mysql_query("select * from tbl_aboutus order by ID");

header_view();
?>
				<tr>
					<td class="judulbiru">
						Setup Aboutus:
					</td>
				</tr>
				<tr>
					<td>
						<table class="tekshitam" cellspacing="0">
							<form action="setupaboutus.php" method="post" enctype="multipart/form-data">
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
									Title
								</td>
								<td class="rapet">	
									<input type="text" name="judul" size="40" class="tekshitam" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[1];
									}
									?>">
								</td>
							</tr>
							<tr>
								<td valign="top">	
									Summary
								</td>
								<td class="rapet">	
									<textarea cols="90" rows="20" name="MyTextAreaName">
									<font size="1" color="#000000"><?php
									if(isset($_GET['edit'])){
										echo $row1[2];
									}
									?></font>
									</textarea>
									<script language="JavaScript">
										//comment any button that you want to hide
										var AK_DisplayedButtons = Array(	
																'FontName',
																'FontSize',
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
									Publish
								</td>
								<td class="rapet">	
									<select name="publish" class="tekshitam">
										<option value="1" <?php
										if(isset($_GET['edit'])){
											if($row1[3]==1)
												echo "selected";
										}
										?>>Yes</option>
										<option value="0" <?php
										if(isset($_GET['edit'])){
											if($row1[3]==0)
												echo "selected";
										}
										?>>No</option>
									</select>
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
								<td>
									Title
								</td>
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
									<a href="setupaboutus.php?edit=1&no=<?php echo $row[0]?>" class="link">Edit</a>
								</td>
								<td>
									<a href="setupaboutus.php?hapus=1&no=<?php echo $row[0]?>" class="link">Delete</a>
								</td>
								<td>
									<input type="checkbox" name="publish[]" value="<?php echo $row[0]?>" <?php
									if($row[3]=='1'){
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