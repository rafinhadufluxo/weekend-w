function compraRapida(idEvento, nomeEvento, valorFinal){
	var req = new XMLHttpRequest(); // novo objeto no browser
	req.open("POST", "adiciona.php", true);
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.send("id="+idEvento+"&nome="+nomeEvento+"&quantidade=1&valorFinal="+
		valorFinal+"&origem=rapida");

	req.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){ // retorno OK
			// define o que acontece quando vier o retorno OK do servidor
			document.getElementById(idEvento).classList.add("noCarrinho");
			document.getElementById(idEvento).innerHTML = "no carrinho!";
			document.getElementById("numItensCarrinho").innerHTML = 
								"("+this.responseText+")";
		}
	};
}