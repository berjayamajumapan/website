<?php

include "../include/connection.php";

include "fungsi.php";



checkawal();



?>

<html>

<head>

<title>:: Login :: Administrator WANGSA TUNGGAL RENT CAR </title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="../style.css" rel="stylesheet" type="text/css">

</head>



<body>

<table width="100%" height="100%">

	<tr>

		<td valign="middle">

			<div align="center" class="judul">

				<font color="#FF0000"><?php echo $error?></font>

			</div>

			<br>

			<table align="center" bgcolor="#FF9966" cellspacing="1" cellpadding="2">

				<tr>

					<td class="judul" bgcolor="#FF9966" >

					<font color="#ED1C24">Login Administrator</font>

					</td>

				</tr>

				<tr>

					<td bgcolor="#ffffff">

						<table class="teksmerah" cellspacing="0">

							<form action="" method="post">

							<tr class="tekshitam">

								<td align="right">

									ID

								</td>

								<td class="rapet">

									<input type="text" name="id" class="tekshitam">

								</td>

							</tr>

							<tr class="tekshitam">

								<td align="right">

									Password

								</td>

								<td class="rapet">

									<input type="password" name="pass" class="tekshitam">

								</td>

							</tr>

							<tr class="tekshitam">

								<td>	

									Cathegory

								</td>

								<td class="rapet">	

									<select name="kat" class="tekshitam">

										<option value="1">Super Admin</option>

										<option value="0">Admin</option>

									</select>

								</td>

							</tr>

							<tr>

								<td>

								</td>

								<td>

									<input type="submit" name="login" value="Login" class="tekshitam">

								</td>

							</tr>

							</form>

						</table>

					</td>

				</tr>

			</table>

		</td>

	</tr>

</table>

</body>

</html>

