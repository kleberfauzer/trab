<div>
<?php
include("stilo.html");
?>
<!DOCTYPE html>

<html>
	<body>
		
		<a href="login.php">voltar</a> |
		<fieldset>
			<legend>Cadastrar Conta</legend>
		<?php 
			
			if(isset($_POST["email"])){
				
				$verifica_email = "setanto";
				
				if(!file_exists("cliente.xml")){
					
					$fp = fopen("cliente.xml","w");
					
					$cont = '<?xml version="1.0"?><dados></dados>';
					
					fwrite($fp,$cont);
					fclose($fp);
					
					
				}
				if((file_exists("cliente.xml"))){
				
					$arquivo = 'cliente.xml';
								
					$xml= simplexml_load_file($arquivo);
								
						
					foreach($xml -> dados as $dados){
						if(str_replace(" ","",$_POST["email"]) == str_replace(" ","",$dados->email)){
							die('Usuario existente. Utilize outro email.');
						}
					}	
					$posicao = sizeof($xml -> dados);
				
				
		
					$xml->dados[$posicao ]->nome = "".$_POST["nome_cnt"];
					$xml->dados[$posicao ]->email = "".$_POST["email"];
					$xml->dados[$posicao ]->senha = "".$_POST["senha"];
					$xml->dados[$posicao ]->saldo = 0;
					
					$xml -> asXML($arquivo);
					echo "Cadastro realizado";
		
				
					
						
					
				}
			}
			else{
			?>
			
			
					<form method="post" action="cad_cliente.php">
						<label>Nome: </label>
						<input type="text" name="nome_cnt" required="required"> <br>
						<label>email: </label>
						<input type="email" name="email" min="1" step="1" required="required"> <br>
						<label>senha: </label>
						<input type="password" name="senha" min="1" step="1" required="required"> <br>
						
						<input type = "submit" value = "enviar" />
					</form>
			</fieldset>
			
			
			<?php
		}
		?>
</div>