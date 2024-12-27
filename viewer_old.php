<?php
function print_header(){
?>
<HTML>
<HEAD>
<TITLE>buku135</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE = "JavaScript">
<!--

function IsNamaBenar (str)
{
  str = str.toUpperCase ()
  for (var i = 0; i < str.length; i++)
  {
    var kar = str.charAt (i);
    if (((kar < "A")  || (kar > "Z")) &&
        (kar != " "))
        return false;
  }
  return true;
}

function IsEmailBenar (str)
{
  var cek1 = str.indexOf ("@");

  // Cek karakter titik
  if (cek1 == -1)
    return 1;

  // Memastikan sah tidaknya letak karakter "@"
  if  ((cek1 == 0) || (cek1 == str.length - 1) ||
       (cek1 != str.lastIndexOf ("@")))
    return 2;

  var cek2 = str.lastIndexOf (".");

  // Cek karakter titik
  if (cek2 == -1)
    return 3;

  if ((cek2 == 0) || (cek2 == str.length - 1))
    return 4;

  // Cek letak karakater @ dan titik
  if ((cek1 > cek2) || (cek1 == cek2 - 1) ||
      (cek1 == cek2 + 1))
    return 5;

  // Cek ada tidaknya spasi
  if (str.indexOf (" ") != -1)
    return 6;
  return 0;
}

function evKirim ()
{
  // Cek kotak teks sudah diisi atau belum
  if (document.fmForm.txtFirstName.value == "")
  {
    alert ("Anda harus mengisi First Name!");
    document.fmForm.txtFirstName.focus ();
    return false;
  }

  if (document.fmForm.txtLastName.value == "")
  {
    alert ("Anda harus mengisi  Last Name!");
    document.fmForm.txtLastName.focus ();
    return false;
  }
  
  if (document.fmForm.txtTanggalLahir.value == "")
  {
    alert ("Anda harus mengisi  Tanggal Lahir!");
    document.fmForm.txtTanggalLahir.focus ();
    return false;
  }
  
  if (document.fmForm.txtEmail.value == "")
  {
    alert ("Anda harus mengisi alamat Email!");
    document.fmForm.txtEmail.focus ();
    return false;
  }
  
  if (document.fmForm.txtJalan.value == "")
  {
    alert ("Anda harus mengisi alamat Jalan!");
    document.fmForm.txtJalan.focus ();
    return false;
  }
  
  if (document.fmForm.txtSuburb.value == "")
  {
    alert ("Anda harus mengisi alamat Suburb!");
    document.fmForm.txtSuburb.focus ();
    return false;
  }
   
  if (document.fmForm.txtKodePos.value == "")
  {
    alert ("Anda harus mengisi Kode Pos!");
    document.fmForm.txtKodePos.focus ();
    return false;
  }
  
  if (document.fmForm.txtKota.value == "")
  {
    alert ("Anda harus mengisi Kota!");
    document.fmForm.txtKota.focus ();
    return false;
  }
  
  if (document.fmForm.txtZone.value == "")
  {
    alert ("Anda harus mengisi Zone!");
    document.fmForm.txtZone.focus ();
    return false;
  }

  if (document.fmForm.txtNegara.value == "")
  {
    alert ("Anda harus mengisi Negara!");
    document.fmForm.txtNegara.focus ();
    return false;
  }

  if (document.fmForm.txtTelepon.value == "")
  {
    alert ("Anda harus mengisi nomor Telepon!");
    document.fmForm.txtTelepon.focus ();
    return false;
  }

  if (document.fmForm.txtPassword.value == "")
  {
    alert ("Anda harus mengisi Password!");
    document.fmForm.txtPassword.focus ();
    return false;
  }

  if (document.fmForm.txtPassword1.value == "")
  {
    alert ("Anda harus mengisi Konfirmasi Password!");
    document.fmForm.txtPassword1.focus ();
    return false;
  }
 

  // Cek alamat email yang dimasukkan benar atau tidak  
  var Cek = IsEmailBenar (document.fmForm.txtEmail.value);
  if (Cek != 0)
  {
    if (Cek == 1)
      alert ("Alamat email harus ada karakter @");
    else if (Cek == 2)
      alert ("Letak karakter karakter @ pada alamat email tidak sah");
    else if (Cek == 3)
      alert ("Alamat email harus ada tanda titik");
    else if (Cek == 4)
      alert ("Letak karakter titik pada alamat email tidak sah");
    else if (Cek == 5)
      alert ("Letak @ atau . pada alamat email tidak sah");
    else if (Cek == 6)
      alert ("Alamat email tidak boleh berisi spasi");
    document.fmForm.txtEmail.focus ();
    return false;
  }
  
  //cek validasi password
  if(document.fmForm.txtPassword.value!=document.fmForm.txtPassword1.value){
    alert ("Passord yang di Re-Type tidak sama! Silahkan diketik ulang");
    document.fmForm.txtPassword1.focus ();
    return false;
  }
  

  return true;
}

function basketSubmit(action){
	document.fmForm.txtAction.value=action;
	//alert(action);
	if(action=="chkout"){
		document.fmForm.action="delivery_details.php";
	}
	document.fmForm.submit();
	return true;
}

//-->
</SCRIPT>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<style type="text/css">
<!--
.style1 {
	font-family: verdana;
	font-weight: bold;
}
.style6 {color: #666666}
.style8 {color: #00CC33}
.style9 {color: #660000}
.style10 {color: #FF9900}
.style11 {color: #33CC33}
.style12 {
	font-size: large;
	font-weight: bold;
	color: #990000;
}
-->
</style>
</HEAD>
<BODY BGCOLOR="#353535" LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0 onLoad="MM_preloadImages('images/samping_roll_09.gif','images/samping_roll_11.gif','images/samping_roll_12.gif','images/samping_roll_13.gif','images/samping_roll_18.gif')">
<center>
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 bgcolor="#FF9966">
	<TR>
		<TD valign="top">
			<TABLE WIDTH=186 BORDER=0 CELLPADDING=0 CELLSPACING=0>
				<TR>
					<TD>
						<IMG SRC="images/samping_kiri_01.gif" WIDTH=186 HEIGHT=92 ALT=""></TD>
				</TR>
				<TR>
					<TD>
						<a href="index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image49','','images/samping_roll_09.gif',1)"><img src="images/samping_kiri_09.gif" alt="Home" name="Image49" width="186" height="30" border="0"></a></TD>
				</TR>
				<TR>
					<TD>
						<a href="about.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image50','','images/samping_roll_11.gif',1)"><img src="images/samping_kiri_11.gif" alt="About Us" name="Image50" width="186" height="30" border="0"></a></TD>
				</TR>
				<TR>
					<TD>
						<a href="information.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image48','','images/samping_roll_121.gif',1)"><img src="images/samping_kiri_121.gif" alt="Informations" name="Image48" width="186" height="32" border="0"></a></TD>
				</TR>
				<TR>
					<TD>
						<a href="artikel.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image52','','images/samping_roll_132.gif',1)"><img src="images/samping_kiri_132.gif" alt="Article" name="Image52" width="186" height="34" border="0"></a></TD>
				</TR>
				<TR>
					<TD>
						<a href="contact.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image52','','images/samping_roll_131.gif',1)"><img src="images/samping_kiri_131.gif" alt="Contact Us" name="Image52" width="186" height="34" border="0"></a></TD>
				</TR>
				<TR>
					<TD>
						<a href="http://buku135.blogspot.com/" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image51','','images/samping_roll_18.gif',1)"><img src="images/samping_kiri_18.gif" alt="Our Blog" name="Image51" width="186" height="42" border="0"></a></TD>
				</TR>
				<TR>
					<TD>
					<!--BEGIN : ISI SAMPING-->
						<table width="100%">
							<tr>
								<td align="center"><br><a href='ymsgr:sendIM?sherlyhermawan'><img border=0 src='http://opi.yahoo.com/online?u=sherlyhermawan&m=g&t=2'></a></td>								
							</tr>
							 <tr>
								<td class="teksjudul" align="center" height="50" valign="middle">
									<img src="images/panah_kebawah.gif" align="absmiddle"> Book Categories&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</td>
							</tr>
							<tr>
								<td align="right" valign="top">
									<!--
									<table width="95%" cellpadding="5" cellspacing="2" bgcolor="#F58954">
										<tr>	
											<td bgcolor="#F8C5B6" valign="top">
									-->
												<table class="teksmerah" cellpadding="3" width="95%">
												<?php
												$result=mysql_query("select * from tr_kategori_bahasa order by IDKategoriBahasa ");
												while($row=mysql_fetch_row($result)){
												?>
													<tr>
														<td colspan="2" class="teksjudul_1">
															In <?php echo $row[1]?>
														</td>
													</tr>
												<?php
													$result1=mysql_query("select * from tr_kategori_buku where IDKategoriBahasa='".$row[0]."' order by IDKategoriBuku ");
													while($row1=mysql_fetch_row($result1)){
												?>
													<tr>
														<td valign="top">
															<img src="images/icon_tambah.gif" align="absmiddle">
														</td>
														<td>
															 <a href="product_list.php?kat=<?php echo $row1[0]?>&kat1=<?php echo str_replace('&','amp;',$row1[1])?>" class="teksmerah"><?php
															 	echo str_replace('&','&amp;',$row1[1])
															 ?></a>
														</td>
													</tr>
												<?php
													}
												}
												?>
												</table>
									<!--
											</td>
										</tr>
									</table>
									-->
								</td>
							</tr>
						</table>
                                                                                                                                 <td align="center"><br><!-- Search Google -->
<center>
<form method="get" action="http://www.google.com/custom" target="_top">
<table bgcolor="#ff9966">
<tr><td nowrap="nowrap" valign="top" align="left" height="22">
<a href="http://www.google.com/">
<img src="http://www.google.com/logos/Logo_25wht.gif" border="0" alt="Google" align="middle"></img></a>
<br/>
<label for="sbi" style="display: none">Enter your search terms</label>
<input type="text" name="q" size="16" maxlength="255" value="" id="sbi"></input>
</td></tr>
<tr><td valign="top" align="left">
<label for="sbb" style="display: none">Submit search form</label>
<input type="submit" name="sa" value="Search" id="sbb"></input>
<input type="hidden" name="client" value="pub-1780888485442778"></input>
<input type="hidden" name="forid" value="1"></input>
<input type="hidden" name="ie" value="ISO-8859-1"></input>
<input type="hidden" name="oe" value="ISO-8859-1"></input>
<input type="hidden" name="safe" value="active"></input>
<input type="hidden" name="cof" value="GALT:#008000;GL:1;DIV:#336699;VLC:663399;AH:center;BGC:FFFFFF;LBGC:336699;ALC:0000FF;LC:0000FF;T:000000;GFNT:0000FF;GIMP:0000FF;FORID:1"></input>
<input type="hidden" name="hl" value="en"></input>
</td></tr></table>
</form>
</center>
<!-- Search Google -->
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                            <td align="center"><br><!-- Start www.Answers.com Answers Box --> <div id="squareBox" style="width:115px;background-color:white;text-align:center;border:1px solid #003399;"><form action="http://www.answers.com/main/ntquery"  method="get" accept-charset="UTF-8" style="display:inline;" onsubmit="return document.getElementById('answers_s').value != '';"><a href="http://www.answers.com" target="_blank"><img border="0" src="http://www.answers.com/main/images/answers_small2.gif"  style="width:105px;height:21px;vertical-align:top;"  alt="Online dictionary at www.Answers.com"/></a><br/><span style="padding-top:0px;margin-top:0px;color:#003399;font-family: Trebuchet MS;font-size:8pt;"><a href="http://www.answers.com" style="text-decoration:none;color:#003399;" target="_blank">Answers, not links</a></span><input type="hidden" name="initiator" id="initiator" value="12" /><input type="hidden" name="afid" value="6051" /><input type="text" id="answers_s" name="s" size="16" maxlength="80" style="width:100px;margin-bottom:2px;" /><br/><input type="submit" style="width:108px;font-size:9pt;padding:3px 0px 3px 0px;" value=" Tell me about... " /></form></div> <!-- End www.Answers.com Answers Box --> 
                                                                                                                </tr>

					<!--END   : ISI SAMPING-->
					</TD>
				</TR>
			</TABLE>
		</TD>
		<TD valign="top" height="100%">
			<TABLE WIDTH=25 BORDER=0 CELLPADDING=0 CELLSPACING=0 height="100%">
				<TR>
					<TD>
						<IMG SRC="images/tengah1_02.gif" WIDTH=25 HEIGHT=126 ALT=""></TD>
				</TR>
				<TR>
					<TD>
						<IMG SRC="images/tengah1_10.gif" WIDTH=25 HEIGHT=168 ALT=""></TD>
				</TR>
				<TR>
					<TD WIDTH=25 HEIGHT=100% background="images/tengah1_23.gif">&nbsp;
					
					</TD>
				</TR>
				<TR>
					<TD>
						<IMG SRC="images/tengah1_24.gif" WIDTH=25 HEIGHT=23 ALT=""></TD>
				</TR>
			</TABLE>
		</TD>
		<TD valign="top" height="100%">
			<TABLE WIDTH=632 BORDER=0 CELLPADDING=0 CELLSPACING=0 height="100%">
				<tr>
					<td valign="top">
						<TABLE WIDTH=632 BORDER=0 CELLPADDING=0 CELLSPACING=0>
							<TR>
								<TD>
									<IMG SRC="images/tengah2_atas_03.gif" WIDTH=400 HEIGHT=97 ALT=""></TD>
								<TD  WIDTH=232  HEIGHT=97 background="images/tengah2_atas_04.gif" align="center" valign="top" class="tekshitam">
									<br>
									<font color="#666666">
									<?php
									if(isset($_SESSION['id'])){
									?>
									<?php echo $_SESSION['id']?> [<a href="logout.php?logout=1">Logout</a>]
									<?php
									}
									?>
									</font>
			
								</TD>
							</TR>
						</TABLE>
					</td>
				</tr>
				<tr height="100%">
					<td valign="top">
						<TABLE WIDTH=632 BORDER=0 CELLPADDING=0 CELLSPACING=0 height="100%">
							<TR>
								<TD background="images/tengah2_bawah_071.gif" WIDTH=632 HEIGHT=130>
									<table width="100%">
										<td class="tekshitam" width="50%">
											<?php
											$result=mysql_query("select * from tr_grup_diskon where Publish='1'");
											$row=mysql_fetch_row($result);
											echo $row[1];
											
											global $ID1, $ID2, $Disk;
											
											$ID1=$row[2];
											$ID2=$row[3];
											$Disk=$row[4];
			
											$result1=mysql_query("select HargaJual, PathGambar from tr_buku where IDBuku='".$row[2]."'");
											$row1=mysql_fetch_row($result1);
			
											$result2=mysql_query("select HargaJual, PathGambar from tr_buku where IDBuku='".$row[3]."'");
											$row2=mysql_fetch_row($result2);
											?>
										</td>
										<td>
											<?php
											$result = mysql_query("select * from tr_buku 
																   left join tr_pengarang on tr_buku.IDPengarang=tr_pengarang.IDPengarang
																   where Cool='1'  and Publish='1' order by IDBuku asc limit 0, 2") or die(mysql_error());
											$row=mysql_fetch_row($result);  
											?>
												<div class="judulputih"><font size="4"><b>"Book of The Month</b>"</font></div>
												<table width="100%" height="100%" cellpadding="5">
													<tr>
														<td width="10%" valign="top">
															<img src="<?php echo $row[15]?>" height="83">
														</td>
														<td valign="top">
															<div class="teksjudul"><?php echo $row[1]?></div>
															<div class="tekshitamkecil">by <?php echo $row[21]?> (<?php echo $row[11]?>)</div>
															<div class="teksorange">Price : Rp <?php echo $row[14]?>,- </div>
															<div><a href="detail_buku.php?ID=<?php echo $row[0]?>" class="teksjudul">Book Details</a></div>
															<div align="right"><a href="keranjang.php?ID=<?php echo $row[0]?>&session="><img src="images/icon_beli_1.gif" border="0" align="bottom"></a>&nbsp;&nbsp;&nbsp;&nbsp;</div>
														</td>
													</tr>
												</table>
										</td>
									</table>
								</TD>
							</TR>
							<TR>
								<TD>
									<IMG SRC="images/tengah2_bawah_14.gif" WIDTH=632 HEIGHT=10 ALT=""></TD>
							</TR>
							<TR>
								<form action="search_result.php" method="GET" name="fmSearch">
								<TD WIDTH=632 HEIGHT=36>
									<!--BEGIN : ISI ATAS-->
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="keyword" class="tekshitamkecil" size="30">
										<select name="searchkategory" class="tekshitamkecil">
											<option value="Books by Titles">Books by Title >></option>
											<option value="Books by Category">Books by Category >></option>
											<option value="Books by Author">Books by Author >></option>
										</select>
										<input type="submit" name="search" value=" Search " class="tekshitam">
									<!--END   : ISI ATAS-->
								</TD>
								</form>
							</TR>
							<TR>
								<TD>
									<IMG SRC="images/tengah2_bawah_19.gif" WIDTH=632 HEIGHT=6 ALT=""></TD>
							</TR>
							<TR>
								<TD WIDTH=632 bgcolor="#FFFFFF" valign="top" height="100%">
<?php
}

function print_footer(){
?>
								</TD>
							<TR>
								<TD bgcolor="#FFFFFF">
									<table width="100%">
										<tr>
											<td colspan="2">
												<br>
												<div align="center" class="style1"><span class="style8">www.</span><span class="style9">Buku</span><span class="style10">135</span><span class="style11">.com</span>							    
												</div>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<div align="center" class="tekshitamkecil style6">Jl. Sutera Jelita II no. 15, Perumahan Alam Sutera, Serpong, Tangerang 15326, Banten, Indonesia<br>
												Telepon:  (021)70201863,  Fax:  (021)53127438     SMS:  0816 111 4006       
											</div></td>
										</tr>
									</table>
									<!--END   : ISI TENGAH-->
								</TD>
							</TR>
							<TR>
								<TD background="images/tengah2_bawah_25.gif" WIDTH=632 HEIGHT=23></TD>
							</TR>
						</TABLE>
					</td>
				</tr>
			</table>
		</TD>
		<TD valign="top" height="100%">
			<TABLE WIDTH=8 BORDER=0 CELLPADDING=0 CELLSPACING=0 height="100%">
				<TR>
					<TD>
						<IMG SRC="images/samping_kanan_05.gif" WIDTH=8 HEIGHT=97 ALT=""></TD>
				</TR>
				<TR>
					<TD WIDTH=8 HEIGHT=130 background="images/samping_kanan_08.gif"></TD>
				</TR>
				<TR>
					<TD>
						<IMG SRC="images/samping_kanan_15.gif" WIDTH=8 HEIGHT=10 ALT=""></TD>
				</TR>
				<TR>
					<TD>
						<IMG SRC="images/samping_kanan_17.gif" WIDTH=8 HEIGHT=42 ALT=""></TD>
				</TR>
				<TR>
					<TD WIDTH=8 HEIGHT="100%" background="images/samping_kanan_21.gif"></TD>
				</TR>
				<TR>
					<TD>
						<IMG SRC="images/samping_kanan_26.gif" WIDTH=8 HEIGHT=23 ALT=""></TD>
				</TR>
			</TABLE>
		</TD>
	</TR>
</TABLE>
</center>
</BODY>
</HTML>
<?php
}
?>