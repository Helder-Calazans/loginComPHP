<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<meta name="Author" content="Helder Calazans - Desenvolvedor Web" />
		<title>Login - Sistema</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
	</head>
	<body>
		<h1>Sistema de login - Iniciando com PHP</h1>
		<hr/>
		<div class="login-box">
			<?php
			//verifica se existe algum valor na variável
				if(isset($_SESSION['msg'])){
					//tendo algum valor, ele printa essa variável e após isso, destrói a sessão.
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
			<form method="POST" action="validador.php">
				<input type="text" name="user" class="input-login-form" placeholder="Digite seu login: "/><br/><br/>
				<input type="password" name="password" class="input-login-form" placeholder="Digite sua senha"/><br/><br/>
				Mantenha-me conectado <input type="checkbox" class="direita" name="still-connected"/><br/>
				<input type="submit" name="btnlogin" class="btn-login" value="Entrar">
			</form>
			<a href="#" class="link-cadastro">Ainda não sou cadastrado!</a>
		</div>
	</body>
</html>