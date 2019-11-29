<?php
	include 'cabecalho.php';
	
	/* 
		Esta é uma página de exemplo, o código HTML
		deverá ser colocado depois do fechamento do PHP
	*/
?>

<h2>Página principal</h2>

<p>Bem vindo 
<?php
	echo "<span class='badge badge-{$_SESSION['corPerfil']}'>
			{$_SESSION['nmUsuario']}</span>";
?>
</p>
<?php 

if($_SESSION['tpPerfil'] == 1){
	/* administrador */
	echo "Administrador";
}
?>
<p>Esta é a página principal</p>

<?php
	include 'rodape.php';
?>