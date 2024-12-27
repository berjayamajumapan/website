<?php
session_start();
include "viewer.php";
include "include/connection.php";
include "include/manipulation_function.php";
include "include/query_function.php";

$noorder = $_GET['noorder'];

print_header("");

?>
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>

<br>
<table width="90%" align="center">
	<tr>
		<td class="teksjudul" height="40">
			<font size="3"><img src="images/icon_hasil.gif" align="absmiddle"> Visi dan Misi Perusahaan</font>
		</td>
		<td align="right">
		<a href="keranjang.php"  class="tekslink">
		
		
		</td>
	</tr>
		<tr>
		<td colspan="2" class="teksjudul"><p></font>
              </p>
		  <p><font color="#FF4500" size="3">Visi Perusahaan<br>
                      </font><strong>Mitra bisnis yang dapat diandalkan, pilihan terbaik bagi bisnis  anda di Kalimantan Tengah.</strong><font color="#0000FF" size="2"><br>
                                        </font>
                  </p>
		  <p><font color="#FF4500" size="3">Misi Perusahaan<br>
		  </font> 
            <font size="2"><span class="style1">1.<strong> Menyediakan bahan bangunan dengan berbagai macam  merk dan spesifikasi yang diperlukan</strong><br>
2.<strong> Menjadi mitra bisnis yang mampu memberikan  solusi terbaik bagi bisnis anda</strong></span></font><font color="#0000FF" size="2"><br>
<br>
</font>
</td>		
	</tr>
<tr>
	<td colspan="2" align="center">
	&nbsp;&nbsp;<a href="javascript:history.back();" class="tekslink1"><b>[ Back ]</b></a>
	</td>
</tr>
</table>
<?php
print_footer();
?>