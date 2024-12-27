<?php
function checkawal(){
	global $error;
	if(isset($_POST['login'])||isset($_POST['id'])||isset($_POST['pass'])){
		$result = mysql_query("select 1 from tw_admin where ID='".$_POST['id']."' and Password='".$_POST['pass']."' and  Category='".$_POST['kat']."'") or die(mysql_error());
		$row = mysql_fetch_row($result);
		if($row[0]=='1'){
			session_start();
			$_SESSION['id']=$_POST['id'];
			$_SESSION['pass']=$_POST['pass'];
			$_SESSION['kat']=$_POST['kat'];
			header("Location:setuporder.php");
		}
		else{
			$error = "Accses denied!";
		}
	}
}

function checklanjut(){
	if(isset($_SESSION['id'])&&isset($_SESSION['pass'])){
		$result = mysql_query("select 1 from tw_admin where ID='".$_SESSION['id']."' and Password='".$_SESSION['pass']."'");
		$row = mysql_fetch_row($result);
		if($row[0]!='1'){		
			header("Location:index.php");
		}
	}
	else{
		header("Location:index.php");
	}
}

/*

fungsi ambilnomor()

*/

function ambilnomor1($field,$table,$formatheader,$formatcounter){

    $result = mysql_query("SELECT MAX(RIGHT(".$field.",3)) FROM ".$table."") or die(mysql_error());

	$row=mysql_fetch_row($result);

	$no=$row[0]+1;

	for ($i=1;$i<=(strlen($formatcounter)-strlen($row[0]+1));$i++) {

		$no='0'.$no;

	}

	$no=$formatheader.$no;



	//mysql_query("UPDATE ".$table." SET ".$field."='".($row[0] + 1)."'");

	return $no;

}

function ambilnomor($field,$table,$formatheader,$formatcounter){
    $result = mysql_query("SELECT MAX(".$field.") FROM ".$table."") or die(mysql_error());
	$row=mysql_fetch_row($result);
	$no=$row[0]+1;
	for ($i=1;$i<=(strlen($formatcounter)-strlen($row[0]+1));$i++) {
		$no="0".$no;
	}
	$no=$formatheader.$no;

	//mysql_query("UPDATE ".$table." SET ".$field."='".($row[0] + 1)."'");
	return $no;
}

function init_print_nav($_max="10") {
	global $hal, $limit;
	define ("_MAX", "$_max");
	$dr=($hal-1)*_MAX; //untuk query item file induk
	$limit=" LIMIT $dr, "._MAX;
}

if (!isset($_GET['hal']))
	$hal=1;
else $hal=$_GET['hal'];

function print_nav($thispage, $table, $id_name, $where=""){
	global $hal;
	if ($where!=""){
		$where="WHERE $where";
	}
	$result = mysql_query("SELECT count($id_name) FROM $table $where") or die(mysql_error());
	
	$total=mysql_fetch_row($result);
	$jml_hal=ceil($total[0] / _MAX); 
	$enter=0;
	
	if (!eregi("\?", $thispage) )
		$thispage.="?";
	else $thispage.="&";		
	
	if ($hal!=1) {
		$backnext=$hal-1;
		echo "&laquo; <A HREF=\"".$thispage."hal=$backnext\" class=link>Prev</a>\n";
	}
	
	for ($i=1;$i<=$jml_hal;$i++) {
		$enter++;
		if ($enter==30) {
			echo "<BR>\n";
			$enter=0;
		}
		if ($hal==$i)  
			echo "&nbsp;$i";
		else {
			echo "&nbsp; <A HREF=\"".$thispage."hal=$i\" class=link>$i</a>\n";
		}
	}
	
	if ($hal!=$jml_hal && $jml_hal!=0){
	$backnext=$hal+1;
		echo " <A HREF=\"".$thispage."hal=$backnext\" class=link>Next</a> &raquo;\n";
	}
}

function print_nav_nonum($thispage, $table, $id_name, $where=""){
	global $hal;
	if ($where!=""){
		$where="WHERE $where";
	}
	$result = mysql_query("SELECT count($id_name) FROM $table $where");
	$total=mysql_fetch_row($result);
	$total[0];
	$jml_hal=ceil($total[0] / _MAX); 
	$enter=0;
	
	if (!eregi("\?", $thispage) )
		$thispage.="?";
	else $thispage.="&";		
	
	if ($hal!=1) {
		 $backnext=$hal-1;
		 echo "&laquo; <A HREF=".$thispage."hal=$backnext>Previous</a>\n";
	}
	
	if ($hal!=$jml_hal && $jml_hal!=0){
		 $backnext=$hal+1;
		 echo " <A HREF=".$thispage."hal=$backnext>Next</A> &raquo;\n";
	}
}
/*
fungsi generate_query()
digunakan untuk melakukan query untuk manupulasi table database.
cara menggunakan :
$action berisi operasi yang akan dilakukan : insert, update, delete
$values berisi field-field dan value-values yang akan dioperasikan (kecuali
delete, tidak perlu field dan values)
contoh :
field[1][1]="fs_no"
field[1][2]="'1'"
field[2][1]="fs_nama"
field[2][2]="'wawan'"
field[3][1]="fs_alanat"
field[3][2]="'Jakal'"
generate_query("update",$field,"t_parameter","where fs_no='1'","");
*/
function generate_query($action,$values,$table,$kondisi,$header){
	$values1="";
	$values2="";
	if($action=="insert"){
		for($i=1;$i<=100;$i++){
			if($values[$i][1]!=""){
				if($values[$i+1][1]=="")
					$values1.=$values[$i][1];
				else
					$values1.=$values[$i][1].",";
			}
			else
				break;
		}
		for($i=1;$i<=100;$i++){
			if($values[$i][2]!=""){
				if($values[$i+1][2]=="")
					$values2.=$values[$i][2];
				else
					$values2.=$values[$i][2].",";
			}
			else
				break;
		}
		$str = "insert into ".$table." (".$values1.") values(".$values2.") ".$kondisi." ".$header;
	}
	elseif($action=="update"){
		for($i=1;$i<=100;$i++){
			if($values[$i][1]!=""){
				if($values[$i+1][1]=="")
					$values1.=$values[$i][1]."=".$values[$i][2];
				else
					$values1.=$values[$i][1]."=".$values[$i][2].",";
			}
			else
				break;
		}
		$str = "update ".$table." set ".$values1." ".$kondisi." ".$header;
	}
	elseif($action=="delete"){
		$str = "delete from ".$table." ".$kondisi." ".$header;
	}
	mysql_query($str) or die(mysql_error());
}
?>