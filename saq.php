<div>
<?php
	include("stilo.html");
	
	session_start();
	echo "<a href='perfil.php'>Perfil</a> | <a href='dep.php'>Deposito</a> | <a href='saq.php'>Saque</a> | <a href='logout.php'>Sair</a>";

?>
<form method="post" action="saq.php">



		Quanto quer sacar?<input type="number" min="0" step="0.01" name="saque" />
	
	<input type="submit" value="retirar"/>
	
</form>
<?php
	if(isset($_POST["saque"])){
		$arquivo = 'cliente.xml';
		$xml = simplexml_load_file($arquivo);
		if(isset($_SESSION["email"])){
			foreach($xml->dados as $dados){
				if(str_replace(" ","",$dados->email) == str_replace(" ","",$_SESSION["email"])){    
					if($dados->saldo < $_POST["saque"]){
						die("Sem dinheiro na conta sufisciente");
					}
					
					$saque = $dados->saldo - $_POST["saque"];	
					$dados->saldo = $saque;	
					$_SESSION["saldo"] = $saque;
					$xml->asXML($arquivo);
					
					
					$xml->asXML($arquivo);
					echo "<h4>Saque efetuado com sucesso!</h4>";
				}
			}
		}
	}		
?>	
</div>