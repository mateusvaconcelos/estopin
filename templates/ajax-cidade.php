<?php
	/* arquivo de configuaração */
			require 'config.php';
			
			/* classe para manipular MySQL */
			require 'classes/Db.class.php';
			
			/* criar um objeto da class Db */
			$banco = new DB();
?>


<label for="estado">Cidade</label>
			<select name="cidade" id="cidade" class="form-control required" >
			<option value =""> Selecione =a cidade</option>
			<?php			
				$banco->bind{'estado',$_GET['estado']);
				$sqlCidades = "select nm_cidade, cd_cidade from cidade where nm_cidade = :estado order by nm_cidade";		
								
				
				$cidades = $banco->query ($sqlCidades);
				
				foreach ($cidade as $cid){
					echo "<option  value='{$cid['cd_cidade']}'>
							{$est['nm_cidade']}</option>";
				}
			?>
			</select>