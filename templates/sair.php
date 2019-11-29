<?php
	/* sair.php */
	session_start();
	
	/* destruir sessão*/
	session_destroy();
	
	/* redireciona para login.php */
	header("Location: login.php");
	
?>