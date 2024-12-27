<?php

/*

fungsi ambilnomor()

*/

function ambilnomor($field,$table,$formatheader,$formatcounter){

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



if (!isset($_GET['hal']))

	$hal=1;

else $hal=$_GET['hal'];



function init_print_nav($_max="10") {

	global $hal, $limit;

	define ("_MAX", "$_max");

	$dr=($hal-1)*_MAX; //untuk query item file induk

	$limit=" LIMIT $dr, "._MAX;

}



function print_nav($thispage, $table, $id_name, $where="", $order=""){

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

		echo "<b><A HREF=\"".$thispage."hal=$backnext\" class=teksjudullink1>Prev</a> <A HREF=\"".$thispage."hal=$backnext\" class=link><img src=\"images/icon_panah_kiri.gif\" align=\"absmiddle\" border=0></a></b>";

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

			echo "&nbsp; <A HREF=\"".$thispage."hal=$i\" class=teksjudullink1>$i</a>\n";

		}

	}

	

	if ($hal!=$jml_hal && $jml_hal!=0){

	$backnext=$hal+1;

		echo "&nbsp;<b><A HREF=\"".$thispage."hal=$backnext\"><img src=\"images/icon_panah_kanan.gif\" align=\"absmiddle\" border=0></a> <A HREF=\"".$thispage."hal=$backnext\" class=teksjudullink1>Next</a></b>\n";

	}

}



function print_nav_nonum($thispage, $table, $id_name, $where="", $order="", $addurl=""){

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

		 echo "&laquo; <A HREF='".$thispage."hal=$backnext". $addurl ."' class='teksjudullink'>Previous</a>\n";

	}

	echo "&nbsp;&nbsp;|&nbsp;&nbsp;";

	if ($hal!=$jml_hal && $jml_hal!=0){

		 $backnext=$hal+1;

		 echo " <A HREF='".$thispage."hal=$backnext". $addurl ."' class='teksjudullink'>Next</A> &raquo;\n";

	}

}



function month_convert($month=''){

	if($month='01'){

		return 'January';

	}

	elseif($month='02'){

		return 'Fabruary';

	}

	elseif($month='03'){

		return 'March';

	}

	elseif($month='04'){

		return 'April';

	}

}

?>