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
	   $no=ambilnomor("ID","t_biodata","","0000");
		$field[1][1]="ID";
		$field[1][2]="'".$no."'";
		$field[2][1]="Nama";
		$field[2][2]="'".$_POST['nama']."'";
		$field[3][1]="TTL";
		$field[3][2]="'".$_POST['ttl']."'";
		$field[4][1]="Alamat";
		$field[4][2]="'".$_POST['alamat']."'";
		$field[5][1]="Telp";
		$field[5][2]="'".$_POST['telp']."'";
		$field[6][1]="Publish";
		$field[6][2]="'".$_POST['publish']."'";
		$field[7][1]="";
		$field[7][2]="";
		generate_query("insert",$field,"t_biodata","","");
	}
	else{ //edit
		if($gambar=="")
			$gambar=$_POST['tmpgambar'];
		if($icon=="")
			$icon=$_POST['tmpicon'];
			
		$field[1][1]="ID";
		$field[1][2]="'".$_POST['no']."'";
		$field[2][1]="Nama";
		$field[2][2]="'".$_POST['nama']."'";
		$field[3][1]="TTL";
		$field[3][2]="'".$_POST['ttl']."'";
		$field[4][1]="Alamat";
		$field[4][2]="'".$_POST['alamat']."'";
		$field[5][1]="Telp";
		$field[5][2]="'".$_POST['telp']."'";
		$field[6][1]="Publish";
		$field[6][2]="'".$_POST['publish']."'";
		$field[7][1]="";
		$field[7][2]="";
		generate_query("update",$field,"t_biodata","where ID='".$_POST['no']."'","");
		if(isset($_GET['no'])){
			$_GET['no']="";
		}
	}
}

if(isset($_POST['pub'])){
	$field[1][1]="Publish";
	$field[1][2]="'0'";
	generate_query("update",$field,"t_biodata","","");
	while(list($key, $value)=each($_POST['publish'])){
		$field[1][1]="Publish";
		$field[1][2]="'1'";
		generate_query("update",$field,"t_biodata","where ID='".$_GET['no']."'","");
	}
}

if(isset($_GET['hapus'])){
	if($_GET['no']!=""){
		generate_query("delete","","t_biodata","where ID='".$_GET['no']."'","");
	}
	if(isset($_GET['no'])){
		$_GET['no']="";
	}
}

if(isset($_GET['edit'])){
	if($_GET['no']!=""){
		$result1= mysql_query("select * from t_biodata where ID='".$_GET['no']."'");
		$row1=mysql_fetch_row($result1);
	}
}

$result = mysql_query("select * from t_biodata order by ID");

header_view();
?>
				<tr>
					<td class="judulbiru">
						Setup Biodata:
					</td>
				</tr>
				<tr>
					<td>
						<table class="tekshitamkecil" cellspacing="0">
							<form action="setupbiodata.php" method="post" enctype="multipart/form-data">
							<tr>
								<td width="140">
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
									Nama
								</td>
								<td class="rapet">	
									<input type="text" name="nama" size="50" class="tekshitamkecil" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[1];
									}
									?>">
								</td>
							</tr>
							
							
							
							
							<tr>
								<td>	
									TTL
								</td>
								<td class="rapet">	
									<input type="text" name="ttl" size="50" class="tekshitamkecil" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[2];
									}
									?>">
								</td>
							</tr>
							<tr>
								<td>	
									Alamat
								</td>
								<td class="rapet">	
									<input type="text" name="alamat" size="50" class="tekshitamkecil" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[3];
									}
									?>">
								</td>
							</tr>
							
							
							
							<tr>
								<td>	
									Telp
								</td>
								<td class="rapet">	
									<input type="text" name="telp" size="50" class="tekshitamkecil" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[4];
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
										<option value="1" <?php
										if(isset($_GET['edit'])){
											if($row1[1000]==1)
												echo "selected";
										}
										?>>Yes</option>
										<option value="0" <?php
										if(isset($_GET['edit'])){
											if($row1[1000]==0)
												echo "selected";
										}
										?>>No</option>
									</select>
								</td>
							</tr>
							<tr>
							
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
						<table  bgcolor="#333333" cellspacing="1" border="0" width="100%">
							<tr class="teksmerah" bgcolor="#FF9966">
								<td>
									ID
								</td>
								<td>
									Nama
								</td>
								<td>
									TTL
								</td>
								<td>
									Alamat
								</td>
								<td>
									Telp
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
									<?php echo $row[2]?>
								
								</td>
								<td>
									<?php echo $row[3]?>
								
								</td>
								<td>
									<?php echo $row[4]?>
								
								</td>
								<td>
									<a href="setupbiodata.php?edit=1&no=<?php echo $row[0]?>" class="link">Edit</a>
								</td>
								<td>
									<a href="setupbiodata.php?hapus=1&no=<?php echo $row[0]?>" class="link">Delete</a>
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