<?php
	/* pets-cad.php */
	include 'cabecalho.php';
	
	/* recebeu informações do formulário, cadastro */
	
	if(isset($_POST['nome']) && isset($_POST['raca'])){
	
		/* preparar os parametros */
		$banco->bind('nmPet',$_POST['nome']);
		$banco->bind('tpRaca',$_POST['raca']);
		$banco->bind('tpShampoo',$_POST['shampoo']);
		$banco->bind('dsInfo',$_POST['info']);
		$banco->bind('usuario',$_SESSION['cdUsuario']);
		
		$novoPet = 'INSERT INTO pets 
					(cd_usuario,nm_pet,cd_raca_pet,
					 cd_tipo_shampoo,ds_info) 
					VALUES 
					(:usuario,:nmPet,:tpRaca,
					 :tpShampoo,:dsInfo)';
		
		/* inserir no banco */
		$inserir = $banco->query($novoPet);
		
		/* mensagem para o usuário */
		$_SESSION['msgCadastro'] = $inserir ?
			'ok' : 'erro';
	}
?>
<h2>Cadastro de Pet</h2>
<?php
	/* mensagem para o usuário sobre o cadastro */
	if(isset($_SESSION['msgCadastro'])){
		if($_SESSION['msgCadastro'] == 'ok'){
			echo '<div class="alert alert-success">
					Cadastrado com sucesso</div>';
		}else{
			echo '<div class="alert alert-warning">
				   Não foi possível cadastrar</div>';
		}
		unset($_SESSION['msgCadastro']);
	}	
?>
<form method="post" action="">

	<label for="nome">Nome</label>
	<input name="nome" id="nome" type="text"
		class="form-control input-lg" required />
		
	<label for="tipo">Tipo de pet</label>
	<select name="tipo" id="tipo" 
		class="form-control input-lg" required>
		<option value="">Selecione o tipo do seu pet</option>
		<?php
			$tpPet = 'select * from tipo_pet order by nm_tipo_pet';
			$listaTipoPets = $banco->query($tpPet);
			foreach($listaTipoPets as $ltp){
				echo "<option value='{$ltp['cd_tipo_pet']}'>
						{$ltp['nm_tipo_pet']}
					  </option>";
			}
		?>
	</select>		
	<label for="raca">Raça</label>
	<select name="raca" id="raca" required
		class="form-control input-lg">
		<option value="">Selecione a raça do seu pet</option>
		<?php
			$racas = 'select * from raca_pet order by nm_raca_pet';
			$listaRacas = $banco->query($racas);
			foreach($listaRacas as $lr){
				echo "<option value='{$lr['cd_raca_pet']}'>
						{$lr['nm_raca_pet']}
					  </option>";
			}
		?>
	</select>
	
	<label for="shampoo">Tipo de shampoo</label>
	<select name="shampoo" id="shampoo" required 
		class="form-control input-lg">
		<option value="">Selecione a shampoo do seu pet</option>
		<?php
			$tpShampoo = 'select * from tipo_shampoo_pet order 
							by nm_tipo_shampoo';
			$listaShampoo = $banco->query($tpShampoo);
			foreach($listaShampoo as $ls){
				echo "<option value='{$ls['cd_tipo_shampoo']}'>
						{$ls['nm_tipo_shampoo']}
					  </option>";
			}
		?>
	</select>
	
	<label for="info">Informações adicionais</label>
	<textarea name="info" class="form-control" required></textarea>
	
	<br/>
	
	<input type="submit" value="Cadastrar" class="btn btn-info"/>
	
</form>
<?php 
	include 'rodape.php'; 
?>