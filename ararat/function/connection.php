<?php
	$ip = 'localhost';
	$user = 'root';
	$pwd = '';
	$db = 'db_server';

	@$link = mysqli_connect($ip, $user, $pwd, $db) or die ('Erro '. mysqli_connect_errno(). ': '.mysqli_connect_error());
	
?>