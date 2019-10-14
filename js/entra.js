$(document).ready(function() {
    $(".iniciar").click(function() {

        var user = "rafis";
        var password = "12345";


        var usuario = $(".usuario").val();
        var password = $(".usuario").val();


        if (user == usuario || password == password) {
            alert("Bem vindo gado");
            window.location.replace("teste.html");
        } else {
            alert("Tente novamente!");
        }

    })
})