<?php
function header_view(){
?>

<html>

<head>

<title>Administrator :: Wangsa Tunggal </title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="../style.css" rel="stylesheet" type="text/css">

<style fprolloverstyle>

        A:hover {text-decoration: underline; color: #333333}

</style>
<div align="center"><div align='center' style='font:bold 14px Monotype Corsiva; width:310px'><p><embed name='RAOCXplayer' src='http://localhost/websiteku/Kenny G - Brahms Lullaby.mp3' type='application/x-mplayer2'  width='310' height='30' autoplay='true'  ShowStatusBar='0' ShowControls='1' EnableContextMenu='0' DisplaySize='1' loop='true' pluginspage='http://localhost/websiteku/' autostart='1' ></embed></p></a></div>
<style type="text/css">
<!--
.style2 {font-size: 36px}
.style3 {font-family: Georgia, "Times New Roman", Times, serif}
body {
	background-image: url(http://localhost/websiteku/images/Ip.gif);
}
.style4 {color: #FF0000}
.style5 {font-family: Georgia, "Times New Roman", Times, serif; color: #FF0000; }
-->
</style><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</b>
<body bgColor="#000000">
<P align="<B">
 </P>

<b>
<P align="<B">
 </P>
</b>
<P align="<B">

 </P></CENTER></b>
<SCRIPT language=JavaScript>
dCol='#00FF00';//date colour.
fCol='#00FF00';//face colour.
sCol='#FFFFFF';//seconds colour.
mCol='#00FF00';//minutes colour.
hCol='#00FF00';//hours colour.
ClockHeight=50;
ClockWidth=50;
ClockFromMouseY=0;
ClockFromMouseX=100;

//Alter nothing below! Alignments will be lost!

d=new Array("MINGGU","SENIN","SELASA","RABU","KAMIS","JUMAT","SABTU");
m=new Array("JANUARI","FEBRUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");
date=new Date();
day=date.getDate();
year=date.getYear();
if (year < 2000) year=year+1900;
TodaysDate=" "+d[date.getDay()]+" "+day+" "+m[date.getMonth()]+" "+year;
D=TodaysDate.split('');
clockH='...';
clockH=clockH.split('');
M='....';
M=M.split('');
S='.....';
S=S.split('');
Face='1 2 3 4 5 6 7 8 9 10 11 12';
font='TAHOMA';
size=1;
speed=0.5;
ns=(document.layers);
ie=!ns;
Face=Face.split(' ');
n=Face.length;
a=size*10;
ymouse=0;
xmouse=0;
scrll=0;
props="<font face="+font+" size="+size+" color="+fCol+"><B>";
props2="<font face="+font+" size="+size+" color="+dCol+"><B>";
Split=360/n;
Dsplit=360/D.length;
HandHeight=ClockHeight/4.5
HandWidth=ClockWidth/4.5
HandY=-7;
HandX=-2.5;
scrll=0;
if (ie && !(document.all)){
  step=0.09;
} else {
  step=0.06;
}

currStep=0;
clocky=new Array();clockx=new Array();clockY=new Array();clockX=new Array();
for (i=0; i < n; i++){clocky[i]=0;clockx[i]=0;clockY[i]=0;clockX[i]=0}
clockDy=new Array();clockDx=new Array();clockDY=new Array();clockDX=new Array();
for (i=0; i < D.length; i++){clockDy[i]=0;clockDx[i]=0;clockDY[i]=0;clockDX[i]=0}
if (ns){
for (i=0; i < D.length; i++)
document.write('<layer name="nsDate'+i+'" top=0 left=0 height='+a+' width='+a+'><center>'+props2+D[i]+'</font></center></layer>');
for (i=0; i < n; i++)
document.write('<layer name="nsFace'+i+'" top=0 left=0 height='+a+' width='+a+'><center>'+props+Face[i]+'</font></center></layer>');
for (i=0; i < S.length; i++)
document.write('<layer name=nsSeconds'+i+' top=0 left=0 width=15 height=15><font face=Arial size=3 color='+sCol+'><center><b>'+S[i]+'</b></center></font></layer>');
for (i=0; i < M.length; i++)
document.write('<layer name=nsMinutes'+i+' top=0 left=0 width=15 height=15><font face=Arial size=3 color='+mCol+'><center><b>'+M[i]+'</b></center></font></layer>');
for (i=0; i < clockH.length; i++)
document.write('<layer name=nsHours'+i+' top=0 left=0 width=15 height=15><font face=Arial size=3 color='+hCol+'><center><b>'+clockH[i]+'</b></center></font></layer>');
}
if (ie){
document.write('<div id="Od" style="position:absolute;top:0px;left:0px"><div style="position:relative">');
for (i=0; i < D.length; i++)
document.write('<div id="ieDate'+i+'" style="position:absolute;top:0px;left:0;height:'+a+';width:'+a+';text-align:center">'+props2+D[i]+'</B></font></div>');
document.write('</div></div>');
document.write('<div id="Of" style="position:absolute;top:0px;left:0px"><div style="position:relative">');
for (i=0; i < n; i++)
document.write('<div id="ieFace' + i + '" style="position:absolute;top:0px;left:0;height:'+a+';width:'+a+';text-align:center">'+props+Face[i]+'</B></font></div>');
document.write('</div></div>');
document.write('<div id="Oh" style="position:absolute;top:0px;left:0px"><div style="position:relative">');
for (i=0; i < clockH.length; i++)
document.write('<div id="ieHours' + i + '" style="position:absolute;width:16px;height:16px;font-family:Arial;font-size:16px;color:'+hCol+';text-align:center;font-weight:bold">'+clockH[i]+'</div>');
document.write('</div></div>');
document.write('<div id="Om" style="position:absolute;top:0px;left:0px"><div style="position:relative">');
for (i=0; i < M.length; i++)
document.write('<div id="ieMinutes'+i+'" style="position:absolute;width:16px;height:16px;font-family:Arial;font-size:16px;color:'+mCol+';text-align:center;font-weight:bold">'+M[i]+'</div>');
document.write('</div></div>')
document.write('<div id="Os" style="position:absolute;top:0px;left:0px"><div style="position:relative">');
for (i=0; i < S.length; i++)
document.write('<div id="ieSeconds'+i+'" style="position:absolute;width:16px;height:16px;font-family:Arial;font-size:16px;color:'+sCol+';text-align:center;font-weight:bold">'+S[i]+'</div>');
document.write('</div></div>')
}
(ns)?window.captureEvents(Event.MOUSEMOVE):0;
function Mouse(evnt){
ymouse = (!document.all)?evnt.pageY+ClockFromMouseY-(window.pageYOffset):event.y+ClockFromMouseY;
xmouse = (!document.all)?evnt.pageX+ClockFromMouseX:event.x+ClockFromMouseX;
}
(ns)?window.onMouseMove=Mouse:document.onmousemove=Mouse;
function ClockAndAssign(){
time = new Date ();
secs = time.getSeconds();
sec = -1.57 + Math.PI * secs/30;
mins = time.getMinutes();
min = -1.57 + Math.PI * mins/30;
hr = time.getHours();
hrs = -1.575 + Math.PI * hr/6+Math.PI*parseInt(time.getMinutes())/360;
if (ie){
document.getElementById("Od").style.top=window.document.body.scrollTop;
document.getElementById("Of").style.top=window.document.body.scrollTop;
document.getElementById("Oh").style.top=window.document.body.scrollTop;
document.getElementById("Om").style.top=window.document.body.scrollTop;
document.getElementById("Os").style.top=window.document.body.scrollTop;
}
for (i=0; i < n; i++){
 var F=(ns)?document.layers['nsFace'+i]:document.getElementById("ieFace" + i ).style;
 F.top=clocky[i] + ClockHeight*Math.sin(-1.0471 + i*Split*Math.PI/180)+scrll;
 F.left=clockx[i] + ClockWidth*Math.cos(-1.0471 + i*Split*Math.PI/180);
 }
for (i=0; i < clockH.length; i++){
 var HL=(ns)?document.layers['nsHours'+i]:document.getElementById("ieHours"+i).style;
 HL.top=clocky[i]+HandY+(i*HandHeight)*Math.sin(hrs)+scrll;
 HL.left=clockx[i]+HandX+(i*HandWidth)*Math.cos(hrs);
 }
for (i=0; i < M.length; i++){
 var ML=(ns)?document.layers['nsMinutes'+i]:document.getElementById("ieMinutes"+i).style;
 ML.top=clocky[i]+HandY+(i*HandHeight)*Math.sin(min)+scrll;
 ML.left=clockx[i]+HandX+(i*HandWidth)*Math.cos(min);
 }
for (i=0; i < S.length; i++){
 var SL=(ns)?document.layers['nsSeconds'+i]:document.getElementById("ieSeconds" + i).style;
 SL.top=clocky[i]+HandY+(i*HandHeight)*Math.sin(sec)+scrll;
 SL.left=clockx[i]+HandX+(i*HandWidth)*Math.cos(sec);
 }
for (i=0; i < D.length; i++){
 var DL=(ns)?document.layers['nsDate'+i]:document.getElementById("ieDate" + i).style;
 DL.top=clockDy[i] + ClockHeight*1.5*Math.sin(currStep+i*Dsplit*Math.PI/180)+scrll;
 DL.left=clockDx[i] + ClockWidth*1.5*Math.cos(currStep+i*Dsplit*Math.PI/180);
 }
currStep-=step;
}
function Delay(){
scrll=(ns)?window.pageYOffset:0;
clockDy[0]=Math.round(clockDY[0]+=((ymouse)-clockDY[0])*speed);
clockDx[0]=Math.round(clockDX[0]+=((xmouse)-clockDX[0])*speed);
for (i=1; i < D.length; i++){
clockDy[i]=Math.round(clockDY[i]+=(clockDy[i-1]-clockDY[i])*speed);
clockDx[i]=Math.round(clockDX[i]+=(clockDx[i-1]-clockDX[i])*speed);
}
clocky[0]=Math.round(clockY[0]+=((ymouse)-clockY[0])*speed);
clockx[0]=Math.round(clockX[0]+=((xmouse)-clockX[0])*speed);
for (i=1; i < n; i++){
clocky[i]=Math.round(clockY[i]+=(clocky[i-1]-clockY[i])*speed);
clockx[i]=Math.round(clockX[i]+=(clockx[i-1]-clockX[i])*speed);
}
ClockAndAssign();
setTimeout('Delay()',20);
}

if (ns||ie) {
Delay();
}

</SCRIPT>


<html>
<head>
<title>===> WANGSA TUNGGAL RENT CAR <=== Pusat Reservasi mobil terlengkap</title>
<link rel="stylesheet" type="text/css" href="style3.css">
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
function mmLoadMenus() {
  if (window.mm_menu_0325114156_0) return;
  window.mm_menu_0325114156_0 = new Menu("root",160,20,"Verdana, Arial, Helvetica, sans-serif",10,"#000000","#ffffff","#E7E9EC","#C8CDD2","left","middle",0,0,1000,-5,7,true,true,true,0,true,true);
  mm_menu_0325114156_0.addMenuItem("&nbsp;Kalender dan Event","location='kalender_event.php'");
  mm_menu_0325114156_0.addMenuItem("&nbsp;Ekstra Kurikuler","location='ekstra_kurikuler.php'");
  mm_menu_0325114156_0.addMenuItem("&nbsp;Karya Tulis dan Artikel","location='karyatulis_artikel.php'");
  //mm_menu_0325114156_0.addMenuItem("&nbsp;Modul - Modul Pelajaran","location='modul_pelajaran.php'");
    mm_menu_0325114156_0.hideOnMouseOut=true;
   mm_menu_0325114156_0.menuBorder=1;
   mm_menu_0325114156_0.menuLiteBgColor='#ffffff';
   mm_menu_0325114156_0.menuBorderBgColor='#ADAAAD';
   mm_menu_0325114156_0.bgColor='#ADAAAD';

  mm_menu_0325114156_0.writeMenus();
} // mmLoadMenus()

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


<script language="Javascript1.2">
	//Directory must end with a '/'
	//Examples:
	//  AK_editor_url = "TextAreaPro/"; 
	AK_editor_url = "";
	document.write('<scr' + 'ipt src="' + AK_editor_url+ 'wysiwyg.js" language="Javascript1.2"></scr' + 'ipt>'); 
</script>

<script language="javascript">
function view(){
	document.location = "?m=epoint&country=" + document.form1.negara.options[document.form1.negara.selectedIndex].value + "&selindex=" + document.form1.negara.selectedIndex;
}

function view1(){
	document.location = "?pelanggan=" + document.fmForm.pelanggan.options[document.fmForm.pelanggan.selectedIndex].value + "&selindex=" + document.fmForm.pelanggan.selectedIndex;
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

</script>


</head>



<body bgcolor="#D3EAF7" topmargin="0" bottommargin="0">

<table align="center" width="90%" cellspacing="0" height="100%">

        <tr bgcolor="#FF9966">

                <td height="90" class="judul" align="center" colspan="2">

                        <font size="+2" color="#ffffff">Administrator WANGSA TUNGGAL RENT CAR</font>

                </td>

        </tr>

        <tr bgcolor="#ffffff">

                <td height="10" align="right" class="teksjudul"  bgcolor="#FFCC66" colspan="2">

                        <font color="#000000">

                        Login as : <?php echo $_SESSION['id']?>/<?php

                        if($_SESSION['kat']==1){

                                echo "Super Admin";

                        }

                        else{

                                echo "Admin";

                        }

                        ?>

                        [<a href="logout.php?logout=1">Logout</a>]

                        </font>

                </td>

        </tr>

        <tr bgcolor="#FFFFFF">
				<td width="150" valign="top" bgcolor="#FFCC99">
					<table width="100%" cellpadding="5">
							<tr>
									<td align="left" class="teksmerah">
											<br>
											<b><font color="#0000FF">Menu Display Web :</b></font><br><br>
											<b><font color="#000080">HOME</b></font><br>
											<a href="setuptematis.php" class="teksmerahkecil">Setup Home</a> <br><br>
											<b><font color="#000080">PROFILE</b></font><br>
											<a href="setupcontact.php" class="teksmerahkecil">Setup Contact</a> <br>
											<a href="setupabout.php" class="teksmerahkecil">Setup About</a><br>
											<a href="setupbiodata.php" class="teksmerahkecil">Setup Biodata</a><br><br>
											<b><font color="#000080">DOCUMENTER</b></font><br>
											<a href="setupdokumenter.php" class="teksmerahkecil">Setup Dokumenter</a><br><br>
											<b><font color="#000080">GALLERY</b></font><br>
											<a href="setupaboutgallery.php" class="teksmerahkecil">Setup Gallery</a><br><br>
											<b><font color="#000080">AGEN RENT</b></font><br>
											<a href="setupdistribusi.php" class="teksmerahkecil">Setup Distribusi :</a> <br>
											<a href="setupdistrijateng.php" class="teksmerahkecil">=> S.Distri. JATENG</a> <br>
											<a href="setupdistrijabar.php" class="teksmerahkecil">=> S.Distri. JABAR</a> <br>
											<a href="setupdistrijatim.php" class="teksmerahkecil">=> S.Distri. JATIM</a> <br>
											<a href="setupdistrijakarta.php" class="teksmerahkecil">=> S.Distri. JAKARTA</a> <br>
											<a href="setupdistriluarjawa.php" class="teksmerahkecil">=> S.Distri. L.JAWA</a> <br><br>
											<b><font color="#000080">CONTACT</b></font><br>
											<a href="setupcontactuser.php" class="teksmerahkecil">Daftar Contact User</a> <br><br>
											<b><font color="#000080">INFO</b><br>
											<a href="setupinformation.php" class="teksmerahkecil">Setup Information</a> <br><br>
											<?php
											if($_SESSION['kat']=="1"){
											?>
											<b><font color="#000080">ADMINISTRATOR</b></font><br>
											<a href="loginadmin.php" class="teksmerahkecil">Login Admin</a> <br>

											<?php

											}

											?>
											<!--
											<a href="setuptestimonial.php" class="teksmerahkecil">Setup Artikel</a> | 
											<a href="setupgroupdiscount.php" class="teksmerahkecil">Setup Group Discount</a> | 
											-->
											<br><br>
											<b><font color="#0000FF">Menu Transaksi :</b></font><br><br>
											<b><font color="#000080">Pemesanan</b></font><br>
											<a href="setuporder.php" class="teksmerahkecil">Daftar - Online Order</a> <br><br>
											<b><font color="#000080">Penjualan</b></font><br>
											<a href="setuppenjualan.php" class="teksmerahkecil">Transaksi. Penjualan</a> <br>
											<a href="setupdaftarpenjualan.php" class="teksmerahkecil">Daftar - Trs. Penjualan</a><br><br>
											<b><font color="#000080">Retur</b></font><br>
											<a href="setupreturpenjualan.php" class="teksmerahkecil">Retur Penjualan</a><br>
											<a href="setupdaftarreturpenjualan.php" class="teksmerahkecil">Dftr - Retur Penju</a> <br><br>
											<b><font color="#000080">Pelanggan</b></font><br>
											<a href="setupdaftaruser.php" class="teksmerahkecil">Daftar - Pelanggan</a> <br><BR>
											<b><font color="#000080">Buku Kas</b></font><br>
											<a href="setupkasmasuk.php" class="teksmerahkecil">Kas Masuk</a> <br>
											<a href="setupkaskeluar.php" class="teksmerahkecil">Kas Keluar</a> <br>
											<br> 
											<b><font color="#000080">Mobil</b></font><br>
											<a href="setupbuku.php" class="teksmerahkecil">Setup Mobil</a> <br>
											<a href="setupspesifikasi.php" class="teksmerahkecil">Setup Spesifikasi Mobil</a> <br>
											<a href="setupkategori.php" class="teksmerahkecil">Setup Kategori Mobil</a><br>
											<a href="setupbahasa.php" class="teksmerahkecil">Setup Bahasa</a><br>
											<a href="setupformat.php" class="teksmerahkecil">Setup Format</a><br>
					
											<a href="setuppengarang.php" class="teksmerahkecil">Setup Pengarang</a><br>
											
											<a href="setuppenerbit.php" class="teksmerahkecil">Setup Penerbit</a> <br>
											
											<br>
											<br>

									</td>
							</tr>
					</table>
				</td>

                <td valign="top" class="tekshitam">

                        <table align="left" width="100%" cellpadding="10">
								<!--
                                <tr>
                                        <td align="left" class="teksmerah">
												<br>
												<b>Menu Display Web :</b><br><br>
                                                <a href="setuptematis.php" class="teksmerahkecil">Setup Home</a> |
                                                <a href="setupcontact.php" class="teksmerahkecil">Setup Contact</a> | 
						<a href="setupabout.php" class="teksmerahkecil">Setup About</a> |
						<a href="setupbiodata.php" class="teksmerahkecil">Setup Biodata</a> |
						<a href="setupdokumenter.php" class="teksmerahkecil">Setup Dokumenter</a><br>
						<a href="setupaboutgallery.php" class="teksmerahkecil">Setup Gallery</a> |
						<a href="setupdistribusi.php" class="teksmerahkecil">Setup Distribusi :</a> |
						<a href="setupdistrijateng.php" class="teksmerahkecil">=> S.Distri. JATENG</a> |
                                                <a href="setupdistrijateng.php" class="teksmerahkecil">=> S.Distri. JABAR</a> |
						<a href="setupdistrijateng.php" class="teksmerahkecil">=> S.Distri. JATIM</a> |
						<a href="setupdistrijateng.php" class="teksmerahkecil">=> S.Distri. JAKARTA</a> |
						<a href="setupdistrijateng.php" class="teksmerahkecil">=> S.Distri. L.JAWA</a> |
			                        <a href="setupcontactuser.php" class="teksmerahkecil">Daftar Contact User</a> | 
                                                <a href="setupinformation.php" class="teksmerahkecil">Setup Information</a> |
						<?php
                                                if($_SESSION['kat']=="1"){
                                                ?>

                                                <a href="loginadmin.php" class="teksmerahkecil">Login Admin</a> |	

                                                <?php

                                                }

                                                ?>
												<!--
                                                <a href="setuptestimonial.php" class="teksmerahkecil">Setup Artikel</a> | 
                                                <a href="setupgroupdiscount.php" class="teksmerahkecil">Setup Group Discount</a> | 
												<br><br>
												<b>Menu Transaksi :</b><br><br>
                                                <a href="setuporder.php" class="teksmerahkecil">Daftar - Online Order</a> | 
                                                <a href="setuppenjualan.php" class="teksmerahkecil">Trs. Penjualan</a> | 
                                                <a href="setupdaftarpenjualan.php" class="teksmerahkecil">Daftar - Trs. Penjualan</a> | 
                                                <a href="setupreturpenjualan.php" class="teksmerahkecil">Retur Penjualan</a> | 
                                                <a href="setupdaftarreturpenjualan.php" class="teksmerahkecil">Daftar - Retur Penjualan</a> | 
                                                <a href="setupdaftaruser.php" class="teksmerahkecil">Daftar - Pelanggan</a> | <BR>
                                                <a href="setupkasmasuk.php" class="teksmerahkecil">Kas Masuk</a> | 
                                                <a href="setupkaskeluar.php" class="teksmerahkecil">Kas Keluar</a> | 
												<br><br>	 
                                                <a href="setupbuku.php" class="teksmerahkecil">Setup Mobil</a> |
                                                <a href="setupspesifikasi.php" class="teksmerahkecil">Setup Spesifikasi Mobil</a> |
                                                <a href="setuppengarang.php" class="teksmerahkecil">Setup Pengarang</a> |
                                                <a href="setupkategori.php" class="teksmerahkecil">Setup Kategori Mobil</a> | 
                                                <a href="setuppenerbit.php" class="teksmerahkecil">Setup Penerbit</a> |
                                                <a href="setupbahasa.php" class="teksmerahkecil">Setup Bahasa</a> |
                                                <a href="setupformat.php" class="teksmerahkecil">Setup Format</a> |

                                                <br>

                                                <br>
												<hr color="#CC3300" size="2">

                                        </td>
                                </tr>
								-->
<?php

}



function footer_view(){

?>

        <tr bgcolor="#FF9966">

                <td height="20" colspan="2">

                </td>

        </tr>

</table>

</body>

</html>

<?php

}

?>