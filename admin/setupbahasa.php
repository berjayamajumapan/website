<?php

session_start();

include "../include/connection.php";

include "fungsi.php";

include "viewer.php";



checklanjut();



if(isset($_POST['simpan'])){

        if($_POST['no']=="AUTO"){ //tambah

                $no=ambilnomor("IDKategoriBahasa","tr_kategori_bahasa","","00");

                $field[1][1]="IDKategoriBahasa";

                $field[1][2]="'".$no."'";

                $field[2][1]="KategoriBahasa";

                $field[2][2]="'".$_POST['txt']."'";

                $field[3][1]="";

                $field[3][2]="";

                generate_query("insert",$field,"tr_kategori_bahasa","","");

        }

        else{ //edit

                $field[1][1]="IDKategoriBahasa";

                $field[1][2]="'".$_POST['no']."'";

                $field[2][1]="KategoriBahasa";

                $field[2][2]="'".$_POST['txt']."'";

                $field[3][1]="";

                $field[3][2]="";

                generate_query("update",$field,"tr_kategori_bahasa","where IDKategoriBahasa='".$_POST['no']."'","");

                if(isset($_GET['no'])){

                        $_GET['no']="";

                }

        }

}



if(isset($_GET['hapus'])){

        if($_GET['no']!=""){

                generate_query("delete","","tr_kategori_bahasa","where IDKategoriBahasa='".$_GET['no']."'","");

        }

        if(isset($_GET['no'])){

                $_GET['no']="";

        }

}



if(isset($_GET['edit'])){

        if($_GET['no']!=""){

                $result1= mysql_query("select * from tr_kategori_bahasa where IDKategoriBahasa='".$_GET['no']."'");

                $row1=mysql_fetch_row($result1);

        }

}



$result = mysql_query("select * from tr_kategori_bahasa order by IDKategoriBahasa");



header_view();

?>

                                <tr>

                                        <td class="judulbiru">

                                                Setup Bahasa:

                                        </td>

                                </tr>

                                <tr>

                                        <td>

                                                <table class="tekshitam" cellspacing="0">

                                                        <form action="setupbahasa.php" method="post" enctype="multipart/form-data">

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

                                                                        Bahasa

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

                                                <table  bgcolor="#333333" cellspacing="1" border="0" width="90%">

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

                                                                <td align="center">

                                                                        <a href="setupbahasa.php?edit=1&no=<?php echo $row[0]?>" class="link">Edit</a>

                                                                </td>

                                                                <td align="center">

                                                                        <a href="setupbahasa.php?hapus=1&no=<?php echo $row[0]?>" class="link">Delete</a>

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