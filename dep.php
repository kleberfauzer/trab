<div>
<?php
	include("stilo.html");
	session_start();
	echo "<a href='perfil.php'>Perfil</a> | <a href='dep.php'>Deposito</a> | <a href='saq.php'>Saque</a> | <a href='logout.php'>Sair</a>";

?>

<form method="post" action="dep.php">
		Quanto quer depositar?<input type="number" min="0" step="0.01" name="deposito" />
	
	<input type="submit" value="depositar"/>
	
</form>
<?php
	if(isset($_POST["deposito"])){	
		$arquivo = 'cliente.xml';			
		$xml= simplexml_load_file($arquivo);
		if(isset($_SESSION["email"])){
			foreach($xml->dados as $dados){
				if(str_replace(" ","",$dados->email)==(str_replace(" ","",$_SESSION["email"]))){
					$deposito = $dados->saldo + $_POST["deposito"];	
					$dados->saldo = $deposito;
					$_SESSION["saldo"] = $deposito;
					$xml->asXML($arquivo);
					echo "<h4>Deposito realizado com sucesso</h4>";
				}
			}
		}
		
	}	
?>
</div>	