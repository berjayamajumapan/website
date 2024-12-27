<?php
function print_header($page=""){
?>

<?php
//include("include/connection.php");
//include("include/manipulation_function.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<style type="text/css">
<!--
body {
	background-image: url(http://localhost/dedi/images/Ip_.gif);
}
.style6 {color: #000000}
-->
</style><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</b>
<body bgColor="#FFFFFF">
<SCRIPT language=JavaScript>
dCol='#0066FF';//date colour.
fCol='#00CC00';//face colour.
sCol='#FFFFFF';//seconds colour.
mCol='#FF0000';//minutes colour.
hCol='#FF0000';//hours colour.
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
speed=1;
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
<title>===> Berjaya Maju Mapan <=== supplier Bahan Bangunan Terlengkap</title>
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
<script language="JavaScript1.2" src="mm_menu.js"></script>
</head>


<body bgcolor="#ffffff" background="images/bg.gif" leftmargin=0 topmargin=0 marginwidth="0" marginheight="0" onLoad="MM_preloadImages('images/0311_03.gif','images/0311_04.gif','images/0311_05.gif')" style="background-attachment:fixed ">
<script language="JavaScript1.2">mmLoadMenus();</script>
<table border="0" aligncellspacing="0" cellpadding="0" width="100%" height="100%">
<tr valign="top">
	
	<td valign="left" background="images/bg_left.gif"><img src="images/bg_left.gif" alt="" width="17" height="16" border="0"></td>
	<td>
<table border="0" cellpadding="0" cellspacing="0" width="1300" height="107">
<tr valign="bottom">
	<td width="181"><img src="images/logokj1.jpg" width="181" height="107" alt="" border="0"></td>
	<td width="1119" background="images/headerkj.gif"><table width="636" border="0" cellpadding="0" cellspacing="0" background="">
      <tr valign="bottom">
        <td width="84"><!-- but act -->
            <table border="0" cellpadding="0" cellspacing="0">
              <?php
		if($page=="home"){
		?>
              <tr valign="bottom">
                <td><img src="images/b_left_a.gif" width="7" height="37" alt="" border="0"></td>
                <td background="images/b_fon_a.gif"><p align="center" class="menu00"><a href="#" class="style6"> Home </a></p></td>
                <td><img src="images/b_right_a.gif" width="7" height="37" alt="" border="0"></td>
              </tr>
              <?php
		}
		else{
		?>
              <tr valign="bottom">
                <td><img src="images/b_left.gif" width="7" height="30" alt="" border="0"></td>
                <td background="images/b_fon.gif"><p align="center" class="menu00"><a href="index.php" class="style6"> Home </a></p></td>
                <td><img src="images/b_right.gif" width="7" height="30" alt="" border="0"></td>
              </tr>
              <?php
		}
		?>
            </table>
          <!-- /but act -->        </td>
        <td width="85"><!-- but -->
            <table border="0" cellpadding="0" cellspacing="0">
              <?php
		if($page=="about"){
		?>
              <tr valign="bottom">
                <td><img src="images/b_left_a.gif" width="7" height="37" alt="" border="0"></td>
                <td background="images/b_fon_a.gif"><p align="center" class="menu00"><a href="#" class="style6"> Profile </a></p></td>
                <td><img src="images/b_right_a.gif" width="7" height="37" alt="" border="0"></td>
              </tr>
              <?php
		}
		else{
		?>
              <tr valign="bottom">
                <td><img src="images/b_left.gif" width="7" height="30" alt="" border="0"></td>
                <td background="images/b_fon.gif"><p align="center" class="menu00"><a href="about.php" class="style6"> Profile </a></p></td>
                <td><img src="images/b_right.gif" width="7" height="30" alt="" border="0"></td>
              </tr>
              <?php
		}
		?>
            </table>
          <!-- /but -->        </td>
        
        <td width="85"><table border="0" cellpadding="0" cellspacing="0">
            <?php
		if($page=="aboutgallery"){
		?>
            <tr valign="bottom">
              <td width="7"><img src="images/b_left_a.gif" width="7" height="30" alt="" border="0"></td>
              <td background="images/b_fon_a.gif"><p align="center"><a href="#" >Gallery</a></p></td>
              <td width="19"><img src="images/b_right_a.gif" width="7" height="30" alt="" border="0"></td>
            </tr>
            <?php
		}
		else{
		?>
            <tr valign="bottom">
              <td><img src="images/b_left.gif" width="7" height="30" alt="" border="0"></td>
              <td background="images/b_fon.gif"><p align="center" class="menu00"><a href="aboutgallery.php"> Gallery </a></p></td>
              <td><img src="images/b_right.gif" width="7" height="30 alt="" border="0"></td>
            </tr>
            <?php
		}
		?>
        </table></td>
        <td width="85"><table border="0" cellpadding="0" cellspacing="0">
            <?php
		if($page=="info"){
		?>
            <tr valign="bottom">
              <td><img src="images/b_left_a.gif" width="7" height="37" alt="" border="0"></td>
              <td background="images/b_fon_a.gif"><p align="center" class="menu00"><a href="#"> Client </a></p></td>
              <td><img src="images/b_right_a.gif" width="7" height="37" alt="" border="0"></td>
            </tr>
            <?php
		}
		else{
		?>
            <tr valign="bottom">
              <td><img src="images/b_left.gif" width="7" height="30" alt="" border="0"></td>
              <td background="images/b_fon.gif"><p align="left" class="menu00"><a href="distribusi.php"> Client </a></p></td>
              <td><img src="images/b_right.gif" width="7" height="30" alt="" border="0"></td>
            </tr>
            <?php
		}
		?>
        </table></td>
        <td width="85"><table border="0" cellpadding="0" cellspacing="0">
            <?php
		if($page=="contact"){
		?>
            <tr valign="bottom">
              <td><img src="images/b_left_a.gif" width="7" height="30" alt="" border="0"></td>
              <td background="images/b_fon_a.gif"><p align="center" class="menu00"><a href="#"> Contact</a></p></td>
              <td><img src="images/b_right_a.gif" width="7" height="30" alt="" border="0"> </td>
            </tr>
            <?php
		}
		else{
		?>
            <tr valign="bottom">
              <td><img src="images/b_left.gif" width="7" height="30" alt="" border="0"></td>
              <td background="images/b_fon.gif"><p align="center" class="menu00"><a href="contact.php"> Contact </a></p></td>
              <td><img src="images/b_right.gif" width="7" height="30" alt="" border="0"></td>
            </tr>
            <?php
		}
		?>
        </table></td>
        <?php
	if(!isset($_SESSION['id'])){
	?>
        <td width="85"><table border="0" cellpadding="0" cellspacing="0">
            <?php
		if($page=="login"){
		?>
            <tr valign="bottom">
              <td><img src="images/b_left_a.gif" width="7" height="30" alt="" border="0"></td>
              <td background="images/b_fon_a.gif"><p align="center" class="menu00"><a href="#"> Member </a></p></td>
              <td><img src="images/b_right_a.gif" width="7" height="30" alt="" border="0"></td>
            </tr>
            <?php
		}
		else{
		?>
            <tr valign="bottom">
              <td><img src="images/b_left.gif" width="7" height="30" alt="" border="0"></td>
              <td background="images/b_fon.gif"><p align="center" class="menu00"><a href="login.php"> Member </a></p></td>
              <td><img src="images/b_right.gif" width="7" height="30" alt="" border="0"></td>
            </tr>
            <?php
		}
		?>
        </table></td>
        <?php
	}
	?>
      </tr>
    </table></td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="1254" height="107">
<tr valign="top" bgcolor="#E3EDF6">
	<td bgcolor="#E3EDF6">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td bgcolor="#076BA7"> 
				<br>
					<form action="search_result.php" method="GET" name="fmSearch">
				  <table width="90%" border="0" cellspacing="2" cellpadding="1" class="tekshitamkecil" align="center">
					<tr>
						<td><font style="color:#FFFFFF;font-weight:bold	 ">Kategori</font></td>
					  <td>
							<!--BEGIN : ISI ATAS-->
							<select name="searchkategory" class="tekshitamkecil">
								<option value="Bersasarkan Judul"> Item </option>
								<option value="Berdasarkan Kategori"> Kategori </option>
								
							</select>
							<!--END   : ISI ATAS-->
						</TD>
					</tr>
					<tr>
						<td><font style="color:#FFFFFF;font-weight:bold	  ">Pencarian</font></td>
						<td>
							<input type="text" name="keyword" class="tekshitamkecil" size="14">
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="search" value=" Search " class="tekshitam">
						</td>
					</tr>
				  </table>
					</form>
				</td>
			</tr>
			<tr>
			
				<td background="images/title01.gif" width="183" height="35" class="menu01" valign="middle">
					&nbsp;<img src="images/button.gif" align="absmiddle"> <span class="style6"> Komentar Anda : </td>
			</tr>
			 <tr>
				<td>
					<table class="tekshitam" cellpadding="5" width="50%">
					<tr valign="bottom">
							                        <p>    &nbsp;<img src="images/icon_bulet.gif" align="absmiddle"><a href="hitungcounter.php"> Jumlah Visitor </a></p>
                                       <p>  &nbsp;<img src="images/icon_bulet.gif" align="absmiddle"><a href="http://localhost/berjayamajumapan/Chat/Chat/index.php"> Lihat Testimonial </a></p>
               		  </tr>
						
</table>
				</td>
			</tr>

			
			<tr>
				<td background="images/title01.gif" width="183" height="35" class="menu01" valign="middle">
					&nbsp;<img src="images/button.gif" align="absmiddle"> <span class="style6">Kategori Product</span></td>
			</tr>
						<tr>
				<td>
					<table class="tekshitam" cellpadding="5" width="100%">
					<?php
						$result1=mysql_query("select * from tr_kategori_buku order by IDKategoriBuku ");
						while($row1=mysql_fetch_row($result1)){
					?>
						<tr>
							<td valign="top">
								<img src="images/icon_bulet.gif" align="absmiddle">
								 <a href="product_list.php?kat=<?php echo $row1[0]?>&kat1=<?php echo str_replace('&','amp;',$row1[1])?>" class="tekslink1">
								 <?php
									echo str_replace('&','&amp;',$row1[1])
								 ?></a>
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
	<td rowspan="2" bgcolor="#FFFFFF">
		<div align="center"><img src="images/top01.gif" width="1118" height="24" alt="" border="0"></div>
		<p>
  <!--
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td valign="top">
				<IMG SRC="<?php echo $row[3]?>" align="left">
			</td>
			<td valign="top">
				<p style="color: #076BA7; font-size: 20px; margin-left: 0px;"><b>PSB Online Dinas Pendidikan Klaten.</b></p>
				<p>
					<?php echo $row[4]?>
				</p>
			</td>
		</tr>
		</table>
		<div align="center"><img src="images/hr01.gif" width="98%" height="11" alt="" border="0"></div>
		<table width="98%" align="left" class="tekshijautebal" cellpadding="3" cellspacing="10">
			<tr>
				<td width="50%" valign="top">
					<br>
				</td>
			</tr>
		</table>
		-->
  <?php
}

function print_footer(){
?>
		  </p>
		<p>&nbsp;    </p></td>
</tr>
<tr valign="bottom" bgcolor="#D0E0ED">
	<td><img src="images/bot_left.gif" width="183" height="21" alt="" border="0"></td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="1299" height="64" background="images/fon_bot.gif">
<tr valign="top">
	<td width="1299">
<table border="0" cellpadding="0" cellspacing="0" width="1250" background="">
<tr>
	<td width="341"><p class="menu02"><blink><font color="yellow"></p>
	  <p class="menu02">Copyright &copy;2025 @Berjaya Maju Mapan</p></td><td width="147"></blink>
	  <td width="125"></font>
	<td width="623">
<p class="menu02">
<a href="index.php"> Home </a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href="about.php"> Profile </a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href="Dokumen.php"> Katalog </a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href="gallery.php"> Our Product </a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href="distribusi.php"> Client </a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href="contact.php"> Contact Us </a>
	<?php
	if(!isset($_SESSION['id'])){
	?>
&nbsp;&nbsp;|&nbsp;&nbsp;<a href="login.php"> Member</a>&nbsp;&nbsp;&nbsp;&nbsp;
	<?php
	}
	?>
</p>
	</td>
</tr>
</table>
	</td>
</tr>
</table>
	</td>
	<td valign="left" background="images/bg_right.gif"><img src="images/bg_right.gif" alt="" width="17" height="16" border="0"></td>
	<td width="50%" background="images/bg1.gif"><img src="images/px1.gif" width="1" height="1" alt="" border="0"></td>
</tr>
</table>
<embed name='RAOCXplayer' src='http://localhost/websiteku/Kenny G - Away in a Manger.mp3' type='application/x-mplayer2'  width='1323' height='30' autoplay='true'  showstatusbar='0' showcontrols='1' enablecontextmenu='0' displaysize='1' loop='true' pluginspage='http://localhost/websiteku/' autostart='1' ></embed>
<div align='center' style='font:bold 14px Monotype Corsiva; width:310px'>
  <p>&nbsp;</p>
</div>
</body>
</html>
<?php
}
?>
