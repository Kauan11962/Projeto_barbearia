<?php
//verifica se a sessão foi iniciada. Remove ou destroi a sessao 
	if(!isset($_SESSION))
	{
		session_start();
		session_unset(); 
		session_destroy(); 
	}
	unset($_SESSION["id"]);
	unset($_SESSION["nome"]);
	unset($_SESSION["sobrenome"]);
	header("location:../views/index.php");
	die();
?>