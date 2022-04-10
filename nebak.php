<?php 
session_start();
if (empty($_SESSION['bil'])) {
}
$_SESSION['bil'] = rand(1,100);

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Tebak Angka</h1>

	<?php
	if (isset($_POST['submit'])) {
		if ($_POST['tebakan'] < $_SESSION['bil']){
			echo "Tebakan terlalu rendah.";
		} else if ($_POST['tebakan'] > $_SESSION['bil']){
			echo "Tebakan terlalu tinggi.";
		} else {
			echo "Betul ges";
			session_destroy();
			echo "<a href='nebak.php'>Main Lagi</a>";
			exit();
		}
	}
	echo $_SESSION['bil'];
	?>

	<form method="post" action="nebak.php">
		Masukkan Sebuah angka 1-100 <input type="text" name="tebakan">
		<input type="submit"  name="submit" value="submit">
	</form>
</body>
</html>