<?php
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

function checkawal(){
	global $error;
	if(isset($_POST['login'])||isset($_POST['id'])||isset($_POST['pass'])){
		$result = mysql_query("select 1 from tr_anggota where ID='".$_POST['id']."' and Password='".$_POST['pass']."'") or die(mysql_error());
		$row = mysql_fetch_row($result);
		if($row[0]=='1'){
			session_start();
			$_SESSION['id']=$_POST['id'];
			$_SESSION['pass']=$_POST['pass'];
			$_SESSION['kat']="0";
			$error = "Login Sukses! Silahkan Lanjutkan Transaksi anda!";
			//header("Location:index.php");
		}
		else{
			$error = "Accses denied!";
		}
	}
}

function checklanjut(){
	if(isset($_SESSION['id'])&&isset($_SESSION['pass'])){
		$result = mysql_query("select 1 from tr_anggota where ID='".$_SESSION['id']."' and Password='".$_SESSION['pass']."'");
		$row = mysql_fetch_row($result);
		if($row[0]!='1'){		
			header("Location:index.php");
		}
	}
	else{
		header("Location:login.php");
	}
}
?>