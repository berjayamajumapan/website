<?php
session_start();
include "../include/connection.php";
include "fungsi.php";
include "viewer.php";

checklanjut();

if(isset($_GET['edit'])){
        if($_GET['no']!=""){
                $result1= mysql_query("select * from t_contact_user where ID='".$_GET['no']."'");
                $row1=mysql_fetch_row($result1);
        }
}

$result = mysql_query("select * from t_contact_user order  by ID desc");

header_view();

?>
                                <tr>

                                        <td class="judulbiru">

                                                Daftar Kontak User:

                                        </td>

                                </tr>
<?php
if(isset($_GET['no'])){
?>
                                <tr>
                                        <td class="tekshitam">
                                                Detail Contact:
                                        </td>
                                </tr>
                                <tr>
                                        <td class="tekshitam">										
											<table width="95%" align="center" class="tekshitamkecil">
												<tr>
													<td width="10%"> 
														ID
													</td>
													<td width="1%">:</td>
													<td>
														<?php echo $row1[0]?>
													</td>
												</tr>
												<tr>
													<td>
														Nama
													</td>
													<td>:</td>
													<td>
														<?php echo $row1[1]?>
													</td>
												</tr>
												<tr>
													<td>
														Email
													</td>
													<td>:</td>
													<td>
														<?php echo $row1[2]?>
													</td>
												</tr>
												<tr>
													<td valign="top">
														Alamat
													</td>
													<td>:</td>
													<td>
														<pre><?php echo $row1[3]?></pre>
													</td>
												</tr>
												<tr>
													<td>
														Telp / Fax
													</td>
													<td>:</td>
													<td>
														<?php echo $row1[4]?>
													</td>
												</tr>
												<tr>
													<td valign="top">Pesan</td>
													<td>:</td>
													<td>
														<pre><?php echo $row1[5]?></pre>
													</td>
												</tr>
											</table>
                                        </td>
                                </tr>
<?php
}
?>
								<tr>
									<td>
										<hr size="1">
                                                <br>
                                                <table  bgcolor="#CC3300" cellspacing="1" border="0" width="95%" cellpadding="3" align="center">
                                                        <tr class="teksmerah" bgcolor="#FFCC66">
                                                                <td>
                                                                       Kode
                                                                </td>
                                                                <td>
                                                                        Nama
                                                                </td>
                                                                <td width="100">
                                                                        Email
                                                                </td>
                                                                <td width="50">
                                                                        Action
                                                                </td>
                                                        </tr>
                                                        <?php
                                                        while($row=mysql_fetch_row($result)){
                                                        ?>
                                                        <tr bgcolor="#FDFDFD" class="tekshitamkecil" valign="top">
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
                                                                        <a href="setupcontactuser.php?edit=1&no=<?php echo $row[0]?>" class="link">Lihat Detail Penjualan</a>
                                                                </td>
                                                        </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                </table>
									</td>
								</tr>
                        </table>
                </td>
        </tr>
<?php
footer_view();
?>