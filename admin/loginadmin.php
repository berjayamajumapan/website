<?php
session_start();
include "../include/connection.php";
include "fungsi.php";
include "viewer.php";


checklanjut();

if($_SESSION['kat']!="1"){
	header("Location: index.php");
}

if(isset($_POST['simpan'])){
	if(!isset($_GET['id'])){ //tambah
		generate_query("delete","","tw_admin","where ID='".$_POST['id']."'","");
		$field[1][1]="ID";
		$field[1][2]="'".$_POST['id']."'";
		$field[2][1]="Password";
		$field[2][2]="'".$_POST['pass']."'";
		$field[3][1]="Category";
		$field[3][2]="'".$_POST['kat']."'";
		generate_query("insert",$field,"tw_admin","","");
	}
	elseif(isset($_GET['id'])){ //edit
		$field[1][1]="ID";
		$field[1][2]="'".$_POST['id']."'";
		$field[2][1]="Password";
		$field[2][2]="'".$_POST['pass']."'";
		$field[3][1]="Category";
		$field[3][2]="'".$_POST['kat']."'";
		generate_query("update",$field,"tw_admin","where ID='".$_POST['id']."'","");
		if(isset($_GET['id'])){
			$_GET['id']="";
		}
	}
}

if(isset($_GET['hapus'])){
	generate_query("delete","","tw_admin","where ID='".$_GET['id']."'","");
	if(isset($_GET['id'])){
		$_GET['id']="";
	}
}

if(isset($_GET['edit'])){
	if($_GET['id']!=""){
		$result1= mysql_query("select * from tw_admin where ID='".$_GET['id']."'");
		$row1=mysql_fetch_row($result1);
	}
}

$result = mysql_query("select * from tw_admin");

header_view();
?>
				<tr>
					<td class="judulbiru">
						Login Admin:
					</td>
				</tr>
				<tr>
					<td>
						<table class="tekshitam" cellspacing="0">
							<form action="loginadmin.php" method="post" enctype="multipart/form-data">
							<tr>
								<td>
									ID
								</td>
								<td class="rapet">
									<input type="text" name="id" size="25" value="<?php
									if(isset($_GET['id'])){
										echo $row1[0];
									}
									?>" class="tekshitam">
								</td>
							</tr>
							<tr>
								<td>	
									Password
								</td>
								<td class="rapet">	
									<input type="text" name="pass" size="25" class="tekshitam" value="<?php
									if(isset($_GET['edit'])){
										echo $row1[1];
									}
									?>">
								</td>
							</tr>
							<tr>
								<td>	
									Kategori
								</td>
								<td class="rapet">	
									<select name="kat" class="tekshitam">
										<option value="1" <?php
										if(isset($_GET['edit'])){
											if($row1[2]=="1")
												echo "selected";
										}
										?>>Super Admin</option>
										<option value="0" <?php
										if(isset($_GET['edit'])){
											if($row1[2]=="0")
												echo "selected";
										}
										?>>Admin</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>								
								</td>
								<td>
									<input type="submit" name="simpan" value=" Save " class="tekshitam">
									<input type="reset" name="reset" value=" Reset " class="tekshitam">
								</td>
							</tr>
							</form>
						</table>
						<br>
						<table  bgcolor="#333333" cellspacing="1" border="0">
							<tr class="teksmerah" bgcolor="#FF9966">
								<td>
									ID
								</td>
								<td>
									Password
								</td>
								<td>
									Category
								</td>
								<td>
									Edit
								</td>
								<td>
									Delete
								</td>
							</tr>
							<form action="" method="post" enctype="multipart/form-data">
							<?php
							while($row=mysql_fetch_row($result)){
							?>
							<tr bgcolor="#FDFDFD" class="tekshitam">
								<td>
									<?php echo $row[0]?>		
								</td>
								<td>
									<?php echo $row[1]?>
								</td>
								<td>
									<?php
									if($row[2] == '1'){
										echo "Super Admin";
									}
									else{
										echo "Admin";
									}
									?>
								</td>
								<td>
									<a href="loginadmin.php?edit=1&id=<?php echo $row[0]?>" class="link">Edit</a>
								</td>
								<td>
									<a href="loginadmin.php?hapus=1&id=<?php echo $row[0]?>" class="link">Delete</a>
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