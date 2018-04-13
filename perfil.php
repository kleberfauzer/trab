<div>
<?php	
	include("stilo.html");
	session_start();
?>
	<?php
	echo "<a href='dep.php'>Deposito</a> | <a href='saq.php'>Saque</a> | <a href='logout.php'>Sair</a>";
	
	echo "<br>";
	echo "<br>Nome cliente: ".$_SESSION["nome"]; 
	echo "<br>Email cliente:".$_SESSION["email"]; 
	echo "<br>Saldo atual: R$ ".$_SESSION["saldo"]; 
	?>
</div>
