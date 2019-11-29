<?php
	/* 
		ativando o recurso de sessão nesta página
		array $_SESSION
	*/
	session_start();
	/* cadastro do usuário */

	 		/* arquivo de configuação */
			require 'config.php';
			
			/* classe para manipular MySQL */
			require 'classes/Db.class.php';
			
			/* criar um objeto da class Db */
			$banco = new DB();

 	/* usuario-cad.php */
 	if(	isset($_POST['nome']) && isset($_POST['email']) &&
 		isset($_POST['senha']) && isset($_POST['confSenha'])
 	){

 		if(	!empty($_POST['nome']) && !empty($_POST['email']) &&
 			!empty($_POST['senha']) && !empty($_POST['confSenha'])
 		){

	 		

			/* preparar as informações */
			$banco->bind('nmUsuario',$_POST['nome']);
			$banco->bind('dsEmail',$_POST['email']);
			$banco->bind('dsSenha',sha1($_POST['senha']));
			$banco->bind('fgSexo',$_POST['sexo']);
			$banco->bind('dsEspecial',$_POST['descEspecial']);
			
			$idoso = isset($_POST['idoso']) ? 1 : 0;
			$banco->bind('idoso',$idoso);
			
			$vip = isset($_POST['vip']) ? 1 : 0;
			$banco->bind('vip',$vip);
			
			$especial = isset($_POST['especial']) ? 1 : 0;
			$banco->bind('especial',$especial);
			
			$inserir = "insert into usuario 
						(nm_usuario, cd_perfil, ds_email, 
						 ds_senha, fg_ativo, tp_sexo,
						 fg_idoso, fg_vip, fg_nec_especial,
						 ds_nec_especial, dt_cadastro) 
						values 
						(:nmUsuario, 2, :dsEmail, 
						:dsSenha, 1, :fgSexo,
						:idoso, :vip, :especial, 
						:dsEspecial, now())";

			$_SESSION['resultado'] = $banco->query($inserir) ?
				'ok' : 'erro';

			
		}

 	}	
	
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>:: Pet Shop - Cadastro ::</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

   </head>

  <body>

  	<main role="main" class="container">

  		<h2>Cadastro de usuário</h2>

  		<?php
  			if(isset($_SESSION['resultado'])){

  				if($_SESSION['resultado'] == 'ok'){
  					echo "<div class='alert alert-success'>
  							Cadastro efetuado com sucesso
  						  </div>";
  				}else{
  					echo "<div class='alert alert-warning'>
  							Não foi possível efetuar o cadastro
  						  </div>";
  				}
  				unset($_SESSION['resultado']);
  			}
  		?>

  		<form method="post" action="" class="formCadastro">
  			
  			<label for="nome">Informe seu nome</label>
  			<input type="text" name="nome" id="nome" 
				class="form-control required" minlenght="3"/>

  			<label for="email">Informe seu e-mail</label>
  			<input type="text" name="email" id="email" 
  				class="form-control required"/>
			
			<label for="sexo">Sexo</label>
			<select name="sexo" id="sexo" class="required form-control required">
				<option value="">Selecione seu sexo</option>
				<option value="F">Feminino</option>
				<option value="M">Masculino</option>
				<option value="I">Indefinido</option>
			</select>
			
			<label for="nasc">Data de Nascimento</label>
			<input type="date" name="nasc" id="nasc" class="required form-control"/>

			<label for="estado">Estado</label>
			<select name="estado" id="estado" class="form-control required" >
			<option value =""> Selecione o estado</option>
			<?php			
				$sqlEstados = "select nm_estado, cd_estado from estado";		
				
				$estados = $banco>query ($sqlEstados);
				
				foreach ($estados as $est){
					echo "<option  value='{$est['cd_estado']}'>
							{$est['nm_estado']}</option>";
				}
			?>
			</select>
			<div id="cidadesLista">
				<label for="estado">Cidade</label>
				<select disabled name="cidade" id="cidade" class="form-control required" >
				<option value =""> Selecione primeiro o estado</option>
			</div>
			</select>
			<label for="idoso" class="input-md">Idoso</label>
			<input type="checkbox" name="idoso" id="idoso" />Sim<br/>
			
			<label for="vip" class="input-md">Vip</label>
			<input type="checkbox" name="vip" id="vip" />Sim<br/>
			
			<label for="especial" class="input-md">Necessidades especiais</label>
			<input type="checkbox" name="especial" id="especial" />Sim<br/>
			
			<label for="descEspecial" class="input-md">Descrição da necessidade especial</label>
			<textarea name="descEspecial" id="descEspecial" class="form-control"></textarea>
			
			<label for="senha">Informe sua senha</label>
  			<input type="password" name="senha" id="senha" 
  				class="form-control required" minlenght="9"/>

  			<label for="confSenha">Confirme sua senha</label>
  			<input type="password" name="confSenha" id="confSenha" 
  				class="form-control required" 
				equalTo="#senha"	minleght="9"/>

			<br/>

  			<input type="submit" value="Cadastrar" class="btn btn-primary" />

  		</form>
  	
  	</main>
	
	<script src="js/jquery-3.4.0.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script>
			$(document).read(function(){
			
				$(".formCadastro").validate();
				
				$("#estado").change(function(){
				
					var estado = $(this).val();
				$.ajax({ 
					url: 'ajax-cidades.php', 
					type: 'GET', 
					data: 'estado='+estado, 
					success: function (response) { 
						$('#cidadesLista').html(response); 
					}, 
					error: function(response) { 
						$('#cidadesLista').html('Erro na consulta'); 
					} 
				});
				});
			
			});
			
			</script>
  </body>
  
</html>
<?php
/* fechando a conexão com o MySQL */
			$banco->CloseConnection();
?>