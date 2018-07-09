<?php
	//inicializa a sessão.
	session_start();
	include_once("conexaobd.php");
	//FILTER_INPUT PEGA OS DADOS VINDOS DE UMA VARIAVEL EXTERNA, 
	// NO CASO, A btnlogin E ESTÁ FILTRANDO APENAS STRINGS E ATRIBUINDO
	// À VARIÁVEL $btnlogin.
	$btnlogin = filter_input(INPUT_POST, 'btnlogin', FILTER_SANITIZE_STRING);

	if($btnlogin){
		$usuario = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
		$senha = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

		//verifica se os campos de login e senha estão vazios.
		if (!empty($usuario) and (!empty($senha))) {
			//gera senha criptografada.
			//echo password_hash($senha, PASSWORD_DEFAULT);

			//verificar no bd se existe o usuário.
			$pesquisa_user = "SELECT id, nome, email, senha FROM usuario WHERE usuario=".$usuario;
			$resultado_pesquisa = mysqli_query($conexao, $pesquisa_user);
			if(isset($resultado_pesquisa)){
				//lê o resultado vindo do banco de dados e coloca em uma variavel
				$row_usuario = mysqli_fetch_assoc($resultado_pesquisa);
				if (password_verify($senha, $row_usuario['senha'])) {
					echo 'senha correta';
				}else{
					$_SESSION['msg'] = "Usuário e/ou senha incorretos";
					header("Location: login.php");
				}
			}

		}else{
			$_SESSION['msg'] = "Usuário e/ou senha incorretos";
			header("Location: login.php");
		}
	}else{
		/*caso não tenha nenhum valor no botão de login, abre uma sessão para a página não encontrada e utiliza a função header para redirecionar a página para a página de login novamente.	
		*/
		$_SESSION['msg'] = "Página não encontrada";
		header("Location: login.php");
	}

?>