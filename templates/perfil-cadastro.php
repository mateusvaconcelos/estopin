<?php
	/* perfil-cadastro.php */
	include 'cabecalho.php';

	/* 
		restringir acesso somente para (1) Administrador 
	*/
	if($_SESSION['tpPerfil'] != 1) {
		header("Location: index.php");
	}
	
	if(isset($_POST) && isset($_POST['nome']) && isset($_POST['cor'])){
		/* cadastro de perfil */
		$banco->bind('nome',$_POST['nome']);
		$banco->bind('cor',$_POST['cor']);
		$consulta = 'insert into perfil_usuario 
					 (nm_perfil,ds_cor) values (:nome, :cor)';
		$resultado = $banco->query($consulta);
		
		/* if ternário */
		$_SESSION['inseriu'] = $resultado ? 'ok' : 'erro';
		
	}
?>
<h2>Cadastro de Perfil</h2>
<?php
	if(isset($_SESSION['inseriu'])){
		if($_SESSION['inseriu'] == 'ok'){
			echo '<div class="alert alert-success">Inserido com sucesso</div>';
		}else{
			echo '<div class="alert alert-danger">Erro ao inserir</div>';
		}
		unset($_SESSION['inseriu']);
	}
?>
<form method="post" action="" class="formValidacao">

	<label for="nome">Nome</label>
	<input name="nome" id="nome" type="text"
		class="form-control input-lg required" minlength="3" />
		
	<label for="cor">Cor do Perfil</label>
	<select name="cor" id="cor" class="required form-control input-lg">
		<option value="">Selecione uma cor </option>
		<option class="badge-danger" value="danger">Danger</option>
		<option class="badge-dark" value="dark">Dark</option>
		<option class="badge-info" value="info">Info</option>
		<option class="badge-primary" value="primary">Primary</option>
		<option class="badge-secondary" value="secondary">Secondary</option>
		<option class="badge-success" value="success">Success</option>
		<option class="badge-warning" value="warning">Warning</option>
	</select>
	
	<br/>
	
	<input type="submit" value="Cadastrar" class="btn btn-info"/>
	
</form>
<?php 
	include 'rodape.php'; 
?>