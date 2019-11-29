<?php
	/* validaLogin.php */
	session_start();
	
	/* arquivo de configuação */
	require 'config.php';
	
	/* classe para manipular MySQL */
	require 'classes/Db.class.php';
	
	/* criar um objeto da class Db */
	$banco = new DB();
	
	$banco->bind('emailF',$_POST['emailF']);
	$banco->bind('senhaF',sha1($_POST['senhaF']));
	
	$consulta = 'select 
					u.* ,
					pu.ds_cor
				from 
					usuario u
					inner join perfil_usuario pu
						on (u.cd_perfil = pu.cd_perfil)
				where 
					u.ds_email = :emailF 
					and u.ds_senha = :senhaF
					and u.fg_ativo = 1';
		
	$usuario = $banco->row($consulta);
	
	if($usuario){
		/* dados corretos */
		$_SESSION['autorizado'] = 1;
		$_SESSION['nmUsuario'] = $usuario['nm_usuario'];
		$_SESSION['cdUsuario'] = $usuario['cd_usuario'];
		$_SESSION['tpPerfil'] = $usuario['cd_perfil'];
		$_SESSION['corPerfil'] = $usuario['ds_cor'];
		header("Location: index.php");	
	}else{
		/* dados inválidos */
		header("Location: login.php");
	}
		
	
?>