<?php
	
	include("stilo.html");
	
	session_start(); 
	
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	
	if(file_exists("cliente.xml")){
		$arquivo = 'cliente.xml';
		$xml = simplexml_load_file($arquivo);
		
		for($i=0; $i<count($xml->dados); $i++) {
			$senha = (string)$xml->dados[$i]->senha;
			$nome = (string)$xml->dados[$i]->nome;
			$email = (string)$xml->dados[$i]->email;
			$saldo = (string)$xml->dados[$i]->saldo;
			if($_POST["email"]==$email && $_POST["senha"]==$senha){
				$_SESSION["senha"] = $senha; 
				$_SESSION["nome"] = $nome; 
				$_SESSION["email"] = $email; 
				$_SESSION["saldo"] = $saldo; 
				header("location:perfil.php");
				
			}
			else{
				echo "email ou/e senha errados";
			}
		}
	}
	?>