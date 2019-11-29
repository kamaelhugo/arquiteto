<?php
	include 'connection.php';
	include 'anti_inject_text.php';

	//@$user = anti_inject_text($_POST['login']);
	//@$senha = anti_inject_text($_POST['login']);
	$user = "admin";
	$senha ="admin";
	$sql = "SELECT * FROM acc_admin WHERE login = '$user' AND senha = '$senha'";
	$r = mysqli_query($link,$sql);
	if (mysqli_num_rows($r) > 0) {
		$_SESSION['login'] = $user;
		$_SESSION['senha'] = $senha;
		echo $_SESSION['senha'];
		echo "logou";
	}else{
		echo "nao encontrou";
	}

?>