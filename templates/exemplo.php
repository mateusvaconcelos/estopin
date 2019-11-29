<?php
	include 'cabecalho.php';
?>
<h1>Cadastro de Cliente</h1>

<h2>Dados pessoais</h2>

<div class="row">

	<div class="col-md-6">
		<label for="nome">Nome</label>
		<input type="text" name="nome" id="nome"	
			class="form-control" />
			
		<label for="nascimento">Data de Nascimento</label>
		<input type="date" name="nascimento" id="nascimento"	
			class="form-control" />
	</div>
	
	<div class="col-md-6">
		<label for="sexo">Sexo</label>
		<select name="sexo" id="sexo" class="form-control">
			<option value="F">Feminino</option>
			<option value="M">Masculino</option>
		</select>
		
		<label for="vip">Vip</label>
		<select name="vip" id="vip" class="form-control">
			<option value="N">Não</option>
			<option value="S">Sim</option>
		</select>
	</div>
	
</div> 
<br/>
<h2>Endereço</h2>
<br/>

•	Dados de endereço (Logradouro, número, complemente, CEP, bairro, cidade e estado).
•	Cliente Idoso e/ou portador de necessidades especiais.
•	Campo para outras informações adicionais do cliente.

<div class="row">
	<div class="col-md-6">
		<label for="logradouro">Logradouro (Rua, Avenida, Travessa etc)</label>
		<input type="text" name="logradouro" id="logradouro" class="form-control" />
			
		<label for="complemento">Complemento</label>
		<input type="text" name="complemento" id="complemento" class="form-control" />
		
	</div>
	<div class="col-md-6">
		<label for="numero">Número</label>
		<input type="text" name="numero" id="numero" class="form-control" />
	</div>
</div>
<div class="row">
	<div class="col-md-6"></div>
	<div class="col-md-6"></div>
</div>
<div class="row">
	<div class="col-md-6"></div>
	<div class="col-md-6"></div>
</div>
<div class="row">
	<div class="col-md-6"></div>
	<div class="col-md-6"></div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="float-right">
			<br/>
			<input type="submit" value="Enviar" class="btn btn-primary"/>
			<input type="reset" value="Limpar" class="btn btn-danger"/>
			<a href="index.php" class="btn btn-warning">Página principal</a>
		</div>
	</div>
</div>

<?php
	include 'rodape.php';
?>