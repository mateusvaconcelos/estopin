/* basicao.js */

/* declara��o de vari�vel */
var nome = 'Felipe'; 

/* janela pop-up de alerta */
//alert(nome);

//alert("Nome do coleguinha"+nome);

/* solicitar informa��o ao usu�rio */

var nmVisitante = prompt("Informe seu nome");

alert("Bem vindo "+nmVisitante);

var idade = confirm("Voc� tem mais que 18?");
/* ok -> true / cancel -> false */

if(idade){
	alert("Pode ir na Rivage sem a m�e");
}else{
	alert("S� entra junto com a m�e");
}