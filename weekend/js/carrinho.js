function atualizaValor(codEvento, unitario, quantidade) {
    // atualiza valor unitario
    var req = new XMLHttpRequest(); // novo objeto no browser
    req.open("POST", "alteraQuantidade.php", true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("idEvento=" + codEvento + "&quantidade=" + quantidade);

    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { // retorno OK
            // define o que acontece quando vier o retorno OK do servidor
            document.getElementById("total" + codEvento).innerHTML = (unitario.replace(",", ".") * quantidade).toFixed(2).replace(".", ",");
            document.getElementById("totalPedido").innerHTML = this.responseText;
        }
    };

    // atualiza valor total
    //atualizaTotal();
}

function atualizaTotal() {
    var total = 0;
    lista = document.getElementsByClassName("totalUni");
    for (i = 0; i < lista.length; i++) {
        total += parseFloat(lista[i].innerHTML.replace(",", "."));
    }
    //var preco = input.value + ",00";
    //document.getElementById('totalPedido').innerHTML = preco;

}

document.body.onload = function() { // atualizar valor no momento em que a página é carregada
    atualizaTotal();
};