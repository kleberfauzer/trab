<div>
<?php
	include("stilo.html");
?>
	
	<form method="post" action="autenticacao.php">
	
		Login: <input type="text" name="email" />
		
		<br /><br />
		
		Senha: <input type="password" name="senha" />
		
		<br /><br />
		<input type="submit" value="login!" />
		<br /><br />
		Ainda não cadastrado? <a href="cad_cliente.php">Cadastre-o aqui!</a>
	</form>
</div>