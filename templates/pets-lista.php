<?php
	include 'cabecalho.php';
?>
<h2>Tipos de pets</h2>

<table class="table">
	<tr>
		<th>Código</th>
		<th>Nome do Pet</th>
		<th>Dono do Pet</th>
		<th>Raça do Pet</th>
		<th>Tipo do Pet</th>
		<th>Tipo do Shampoo</th>
		<th>Dados adicionais</th>
	</tr>
<?php
	$wherePet = '';
	
	if ($_SESSION['tpPerfil'] == 2){/* (2) Perfil do tipo "Cliente" */
		$wherePet = ' where p.cd_usuario ='.$_SESSION['cdUsuario'];
	}
	$perfis = $banco->query('
		select 
			p.* , rp.nm_raca_pet, u.nm_usuario, ts.nm_tipo_shampoo,
			(select 
					nm_tipo_pet 
				from 
					tipo_pet tpp
					inner join raca_pet rpp
						on (rpp.cd_tipo_pet = tpp.cd_tipo_pet)
				where
					rpp.cd_raca_pet = rp.cd_raca_pet) as "nm_tipo_pet"
		from 
			pets p
			inner join raca_pet rp on 
				(p.cd_raca_pet = rp.cd_raca_pet)
			inner join usuario u on 
				(p.cd_usuario = u.cd_usuario)
			inner join tipo_shampoo_pet ts on 
				(p.cd_tipo_shampoo= ts.cd_tipo_shampoo)'.$wherePet
	);
	
	
	foreach($perfis as $p){
		echo "<tr>
				<td>{$p['cd_pet']}</td>
				<td>{$p['nm_pet']}</td>
				<td>{$p['nm_usuario']}</td>
				<td>{$p['nm_raca_pet']}</td>
				<td>{$p['cd_raca_pet']}</td>
				<td>{$p['nm_tipo_pet']}</td>
				<td>{$p['nm_tipo_shampoo']}</td>
				<td>{$p['ds_info']}</td>
			</tr>";
	}
?>


</table>

<?php
	include 'rodape.php';
?>