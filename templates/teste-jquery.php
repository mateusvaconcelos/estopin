<?php
	/* teste-jquery.php */
	include 'cabecalho.php';
?>
<h1>Testes jQuery</h1>

<div id="divisor1">
	
</div>

<button type="button" id="botao1">Botão1</button>
<button type="button" class="botoes">Botão 2</button>
<button type="button" id="botao3" class="botoes">Botão 3</button>

<?php 
	include 'rodape.php';
?>
<script>
	$(document).ready(function(){
		/* elemento de id "botao1" com plano 
			de fundo na cor verde e texto branco */
		$("#botao1").css("background-color","green")
					.css("color","white");
					
		/* botões com classe "botoes" texto negrito rosa e 
			plano de fundo amarelo */
		$(".botoes").css("background-color","yellow")
					.css("color","pink")
					.css("font-weight","bold");
					
		/* manipulação de eventos */
		$("#botao3").click(function(){
			alert("clicou no botão3");
		});
		
		/* quando clicar no botão 1, mudar o divisor 1:
			- largura: 300px 
			- altura: 300px
			- plano de fundo azul
			- ocultar em 3000
			- mostrar em 3000
		*/
		$("#botao1").click(function(){
			$("#divisor1").css("width","300px")
						.css("height","300px")
						.css("background-color","blue")
						.hide(3000)
						.show(3000);
		});
		
		/* botão 2 */
		$(".botoes").click(function(){
			$("#divisor1").hide(500).show(500)
							.css("background-color","green")
							.hide(500).show(500)
							.css("background-color","red")
							.hide(500).show(500)
							.css("background-color","yellow")
							.hide(500).show(500)
							.css("background-color","green")
							.hide(500).show(500)
							.css("background-color","red")
							.hide(500).show(500)
							.css("background-color","yellow")
							.hide(500).show(500)
							.css("background-color","green")
							.hide(500).show(500)
							.css("background-color","red")
							.hide(500).show(500)
							.css("background-color","yellow")
							.hide(500).show(500)
							.css("background-color","green")
							.hide(500).show(500)
							.css("background-color","red")
							.hide(500).show(500)
							.css("background-color","yellow")
							.hide(500).show(500)
							.css("background-color","green")
							.hide(500).show(500)
							.css("background-color","red")
							.hide(500).show(500)
							.css("background-color","yellow")
							.hide(500).show(500)
							.css("background-color","green")
							.hide(500).show(500)
							.css("background-color","red")
							.hide(500).show(500)
							.css("background-color","yellow")
							.hide(500).show(500)
							.css("background-color","green")
							.hide(500).show(500)
							.css("background-color","red")
							.hide(500).show(500)
							.css("background-color","yellow")
							.hide(500).show(500).css("background-color","green")
							.hide(500).show(500)
							.css("background-color","red")
							.hide(500).show(500)
							.css("background-color","yellow")
							.hide(500).show(500);
		});	
		
	});
</script>