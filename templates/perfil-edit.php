<?php
	/* perfil-edit.php */
	include 'cabecalho.php';

	/* 
		restringir acesso somente para (1) Administrador 
	*/
	if($_SESSION['tpPerfil'] != 1) {
		header("Location: index.php");
	}
	
	if(isset($_POST) && isset($_POST['codigo'])){
		/* atualização das informações */
				
		/* preparação de parametros */
		$banco->bind('nome',$_POST['nome']);
		$banco->bind('cor',$_POST['cor']);
		$banco->bind('codigo',$_POST['codigo']);
		
		$update = 'update perfil_usuario set
						 nm_perfil = :nome,
						 ds_cor = :cor
					where
						cd_perfil = :codigo';
						
		$_SESSION['updCadastro'] = $banco->query($update) ? 'ok': 'erro';

		header("Location: perfil-edit.php?cod=".$_POST['codigo']);
		
	}elseif(isset($_GET['cod'])){
		
		/* buscar as informações no BD */ 
		$banco->bind('id',$_GET['cod']);
		$consulta = 'select * from 
						perfil_usuario
					where
						cd_perfil = :id';
		$perfil = $banco->row($consulta);
		
		if(!$perfil){
			header("Location: index.php");
		}else{

			/* montar o form de alteração */
?>
			<h2>Edição de perfil</h2>
<?php 
			/* mensagem de alerta sobre alteração cadastral */

			if(isset($_SESSION['updCadastro'])) {
				if($_SESSION['updCadastro'] == 'ok'){
					echo "<div class='alert alert-success'>
							Dados alterados com sucesso</div>";
				}else{
					echo "<div class='alert alert-warning'>
							Alerta: Informações não alteradas</div>";
				}
				unset($_SESSION['updCadastro']);
			}
?>
			
			<form method="post" action="">

				<label for="nome">Nome</label>
				<input name="nome" id="nome" type="text"
					class="form-control input-lg" 
					value="<?=$perfil['nm_perfil'];?>" />
					
				<label for="cor">Cor do Perfil</label>
				<select name="cor" id="cor" class="form-control input-lg">
					<option <?=($perfil['ds_cor'] == 'danger') ? 'selected' : ''; ?> class="badge-danger" value="danger">Danger</option>
					<option <?=($perfil['ds_cor'] == 'dark') ? 'selected' : ''; ?> class="badge-dark" value="dark">Dark</option>
					<option <?=($perfil['ds_cor'] == 'info') ? 'selected' : ''; ?> class="badge-info" value="info">Info</option>
					<option <?=($perfil['ds_cor'] == 'primary') ? 'selected' : ''; ?> class="badge-primary" value="primary">Primary</option>
					<option <?=($perfil['ds_cor'] == 'secondary') ? 'selected' : ''; ?> class="badge-secondary" value="secondary">Secondary</option>
					<option <?=($perfil['ds_cor'] == 'success') ? 'selected' : ''; ?> class="badge-success" value="success">Success</option>
					<option <?=($perfil['ds_cor'] == 'warning') ? 'selected' : ''; ?> class="badge-warning" value="warning">Warning</option>
				</select>
				<input type="hidden" name="codigo" 
					value="<?=$perfil['cd_perfil'];?>" />
				<br/>			
				<input type="submit" value="Atualizar" class="btn btn-info"/>
				
			</form>
<?php	
		}
	}

	include 'rodape.php';
?>