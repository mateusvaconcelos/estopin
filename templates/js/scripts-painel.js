/* scripts-painel.js */

/* ativar o jQuery */
$(document).ready(function(){

	/* script jQuery */
	 /*alert("jquery funcionando");*/
	/* manipular evento de clique do botão sair */
	$("#btnSair").click(function(){
		
		return confirm("Deseja sair");
		
		/*});
		
			/* manipular evento de mouse sobre o elemento sair 
		$("#btnSair").mouseover(function(){
			/*palavra this se refere ao elemento ja selecionado acima*
			$(this).css("color","green");
		
		});
			/* manipular evento de mouse saindo do elemento sair 
		$("#btnSair").mouseout(function(){
		
			$(this).css("color","");
	
		});*/
		
		/*animar quadros*/
		/*$("#quadroTeste").hide(5000).show(5000).delay(2000)
						 .slideUp(3000).slideDown(2000);
		$("#quadroTeste2").hide(8000).show(8000);*/
		
		/* ativar a validação em todos os elementos que tiverem essa classe*/
	
		$(".formValidacao").validate();
});