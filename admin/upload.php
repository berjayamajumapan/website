<?php
$error = "";
if(isset($_POST['upload'])){
	if (is_uploaded_file($_FILES['gambar']['tmp_name'])){			
		if (move_uploaded_file($_FILES['gambar']['tmp_name'], "/home/wawan/publik/".$_FILES['gambar']['name']) ){													
			echo "<h1>Sukses upload gitu loh...</h1>";
		}			
	}
}
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
Upload pake ini aja .. hhmmm ... <input type="file" name="gambar" size="30" class="tekshitam">&nbsp;&nbsp;<input type="submit" name="upload" class="tekshitam" value="Upload">
</form>
</body>
</html>
