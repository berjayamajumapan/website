<?php
include "viewer.php";
include "include/connection.php";

print_header("index.php");

?>
<table width="486" border="0" align="center" bgcolor="#F6F6F6" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center">
			<script type="text/javascript"><!--
			google_ad_client = "pub-7011139584502650";
			google_ad_width = 468;
			google_ad_height = 60;
			google_ad_format = "468x60_as";
			google_ad_type = "text_image";
			google_ad_channel ="";
			google_color_border = "F6F6F6";
			google_color_bg = "DFF2FD";
			google_color_link = "0000CC";
			google_color_url = "008000";
			google_color_text = "000000";
			//--></script>
			<script type="text/javascript"
			  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>		
		</td>
	</tr>
</table>
<?php
if(isset($_GET['id'])){
?>
<table width="486" border="0" align="center" bgcolor="#F6F6F6" cellpadding="0" cellspacing="0">
<?php
	$result=mysql_query("select * from t_artikel where ID='".$_GET['id']."' and Publish='1'");
	while($row=mysql_fetch_row($result)){
?>
	<tr>
		<td align="left" valign="top" width="20">
			<img src="<?php echo $row[5]?>">
		</td>
		<td  class="judulartikel">
			&nbsp;<?php echo $row[1]?>
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td   class="atikel">
			<i><?php echo $row[2]?></i>
			<br>
			<br>
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td   class="atikel">
			<?php
			if($row[4]!=""){
			?>
				<img src="<?php echo $row[4]?>" align="left">
			<?php
			}
			?>
			<?php echo $row[3]?>
		</td>
	</tr>
<?php
	}
?>
</table>
<br>
<table width="486" height="1" cellpadding="0" cellspacing="0" align="center">
		<td background="images/g_putus.gif" width="185" height="1">
		</td>
</table>

<br>
<?php
}

$result = mysql_query("select * from t_artikel") or die(mysql_error());
while($row=mysql_fetch_row($result)){
?>
<table width="486" border="0" align="center" bgcolor="#F6F6F6" cellpadding="0" cellspacing="0">
	<tr>
		<td align="left" valign="top" width="20">
			<img src="<?php echo $row[5]?>">
		</td>
		<td>
			&nbsp;<a href="articles.php?id=<?php echo $row[0]?>" class="judulartikel"><?php echo $row[1]?></a>
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td  class="atikel">
			<?php echo $row[2]?>
		</td>
	</tr>
</table>
<br>

<?php


}
?>
<?php

print_footer();
?>
