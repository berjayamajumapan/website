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
                if (move_uploaded_file($_FILES['gambar']['tmp_name'], "../downloads/".$_FILES['gambar']['name']) ){
                        $error = "Success upload images...";
                        $suksesupload=1;
                        $gambar="downloads/".$_FILES['gambar']['name'];
                }
        }
        if (is_uploaded_file($_FILES['icon']['tmp_name'])){
                if (move_uploaded_file($_FILES['icon']['tmp_name'], "../downloads/".$_FILES['icon']['name']) ){
                        $error = "Success upload images...";
                        $suksesupload=1;
                        $icon="downloads/".$_FILES['icon']['name'];
                }
        }
        if($_POST['no']=="AUTO"){ //tambah
                $no=ambilnomor("ID","t_download","","0000");
                $field[1][1]="ID";
                $field[1][2]="'".$no."'";
                $field[2][1]="Judul";
                $field[2][2]="'".$_POST['judul']."'";
                $field[3][1]="Keterangan";
                $field[3][2]="'".$_POST['keterangan']."'";
                $field[4][1]="PathFile";
                $field[4][2]="'".$gambar."'";
                $field[5][1]="Publish";
                $field[5][2]="'".$_POST['publish']."'";
                $field[6][1]="";
                $field[6][2]="";
                generate_query("insert",$field,"t_download","","");
        }
        else{ //edit
                if($gambar=="")
                        $gambar=$_POST['tmpgambar'];
                if($icon=="")
                        $icon=$_POST['tmpicon'];

                $field[1][1]="ID";
                $field[1][2]="'".$_POST['no']."'";
                $field[2][1]="Judul";
                $field[2][2]="'".$_POST['judul']."'";
                $field[3][1]="Keterangan";
                $field[3][2]="'".$_POST['keterangan']."'";
                $field[4][1]="PathFile";
                $field[4][2]="'".$gambar."'";
                $field[5][1]="Publish";
                $field[5][2]="'".$_POST['publish']."'";
                $field[6][1]="";
                $field[6][2]="";
                generate_query("update",$field,"t_download","where ID='".$_POST['no']."'","");
                if(isset($_GET['no'])){
                        $_GET['no']="";
                }
        }
}

if(isset($_POST['pub'])){
        $field[1][1]="Publish";
        $field[1][2]="'0'";
        generate_query("update",$field,"t_download","","");
        while(list($key, $value)=each($_POST['publish'])){
                $field[1][1]="Publish";
                $field[1][2]="'1'";
                generate_query("update",$field,"t_download","where ID='".$value."'","");
        }
}

if(isset($_GET['hapus'])){
        if($_GET['no']!=""){
                generate_query("delete","","t_download","where ID='".$_GET['no']."'","");
        }
        if(isset($_GET['no'])){
                $_GET['no']="";
        }
}

if(isset($_GET['edit'])){
        if($_GET['no']!=""){
                $result1= mysql_query("select * from t_download where ID='".$_GET['no']."'");
                $row1=mysql_fetch_row($result1);
        }
}

$result = mysql_query("select * from t_download order by ID");

header_view();
?>
                                <tr>
                                        <td class="judulbiru">
                                                Setup Shop:
                                        </td>
                                </tr>
                                <tr>
                                        <td>
                                                <table class="tekshitam" cellspacing="0">
                                                        <form action="setupdownload.php" method="post" enctype="multipart/form-data">
                                                        <tr>
                                                                <td>
                                                                        ID Item
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
                                                                        Judul
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
                                                                        Keterangan
                                                                </td>
                                                                <td class="rapet">
                                                                        <textarea cols="50" rows="5" name="keterangan"><?php
                                                                        if(isset($_GET['edit'])){
                                                                                echo $row1[2];
                                                                        }
                                                                        else{
                                                                                echo "Tulis berita disini..";
                                                                        }
                                                                        ?></textarea>
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
                                                                                echo $row1[3];
                                                                        }
                                                                        ?>
                                                                        <input type="hidden" name="tmpgambar" size="40" class="tekshitam" value="<?php
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
                                                                                <option value="1" <?php
                                                                                if(isset($_GET['edit'])){
                                                                                        if($row1[4]==1)
                                                                                                echo "selected";
                                                                                }
                                                                                ?>>Yes</option>
                                                                                <option value="0" <?php
                                                                                if(isset($_GET['edit'])){
                                                                                        if($row1[4]==0)
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
                                                                        Judul
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
                                                                        <a href="setupdownload.php?edit=1&no=<?php echo $row[0]?>" class="link">Edit</a>
                                                                </td>
                                                                <td>
                                                                        <a href="setupdownload.php?hapus=1&no=<?php echo $row[0]?>" class="link">Delete</a>
                                                                </td>
                                                                <td>
                                                                        <input type="checkbox" name="publish[]" value="<?php echo $row[0]?>" <?php
                                                                        if($row[4]=='1'){
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