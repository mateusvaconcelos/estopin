<?php
	include 'cabecalho.php';
?>

<h2>Tipo de Perfil Cadastrado</h2>

<Table class="table">
	<tr>
		<th>Código</th>
		<th>Nome</th>
		<th>Cor</th>
		<th>Imagem</th>
	</tr>

<?php
	$perfis = $banco->query('select * from perfil_usuario');
	
	foreach($perfis as $p){
		echo "<tr>
			<td>{$p['cd_perfil']}</td>
			<td>{$p['nm_perfil']}</td>
			<td>{$p['ds_cor']}</td>
			<td>{$p['ds_imagem']}</td>
		   </tr>";
	}
?>
</table>
<?php
	include 'rodape.php';
?>