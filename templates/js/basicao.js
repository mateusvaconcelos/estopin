/* basicao.js */

/* declaração de variável */
var nome = 'Felipe'; 

/* janela pop-up de alerta */
//alert(nome);

//alert("Nome do coleguinha"+nome);

/* solicitar informação ao usuário */

var nmVisitante = prompt("Informe seu nome");

alert("Bem vindo "+nmVisitante);

var idade = confirm("Você tem mais que 18?");
/* ok -> true / cancel -> false */

if(idade){
	alert("Pode ir na Rivage sem a mãe");
}else{
	alert("Só entra junto com a mãe");
}