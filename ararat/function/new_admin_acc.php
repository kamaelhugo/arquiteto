<?php
	include 'connection.php';
	include 'anti_inject_text.php';

	@$xlogin = anti_inject_text($_POST['login']);
	@$xsenha = anti_inject_text($_POST['pass']);
	@$confirmar_senha = anti_inject_text($_POST['cpass']);

	$xlogin = trim($xlogin);
	$xlogin = str_replace(" ","",$xlogin);
	$xsenha = trim($xsenha);
	$confirmar_senha = trim($confirmar_senha);

	$xlogin = strtolower($xlogin);
	$xsenha = strtolower($xsenha);
	$confirmar_senha = strtolower($confirmar_senha);

	function encriptaSenha($xsenha) {
		return base64_encode(pack("H*", sha1(utf8_encode($xsenha))));
	}
	if (empty($xlogin) && empty($xsenha) && empty($confirmar_senha)) {
		json_encode("linhas em branco");
	}
	else
	{
		if (strcmp($xsenha, $confirmar_senha)) {
			$senha = encriptaSenha($xsenha);
			$sql = "SELECT * from acc_admin WHERE login = '$xlogin'";
			$r = mysqli_query($link,$sql);
			if (mysqli_num_rows($r) < 1) {
				$SQlCadastro = "INSERT INTO acc_admin(login, senha) VALUES ('$xlogin', '$senha')";
				$rs = mysqli_query($link,$SQlCadastro);
				if ($rs) {
					echo json_encode(array('resultado' => true, 'msg' => 'Sucesso ao salvar'));
				}
				else{
					echo json_encode("Error");
				}
				echo json_encode("Conta já existente, tente recuperar a conta");
			}
		}
		else{
			echo json_encode("Senhas não conferem");
		}
	}
	mysql_close($link);
?>