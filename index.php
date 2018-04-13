<?php
session_start();

if(!isset($_SESSION["autenticacao"])){
	header("location: login.php");
}
else if($_SESSION["autenticacao"]=="a"){
	header("location: ver_cadastro.php");
}
?>