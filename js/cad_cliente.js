document.getElementById("form-cadastro").onsubmit = validaCadastro;

var contErros = 0;

function mostraErro(idErro, mensagem) {
    idErro.style.display = "block";
    idErro.innerHTML = mensagem;
    contErros++;
}

function ocultaErro(idErro) {
    idErro.style.display = "none";
}

function validaCadastro() {

    contErros = 0;

    // validação do campo nome
    campo = document.getElementById("nome");
    erro = document.getElementById("msg-nome")
    if ((campo.value == "") || (campo.value.indexOf(" ") == -1))
        mostraErro(erro, "Por favor digite o Nome completo");
    else
        ocultaErro(erro);

    // validação do campo email
    campo = document.getElementById("email");
    erro = document.getElementById("msg-email");
    if ((campo.value == "") || (campo.value.indexOf("@") == -1))
        mostraErro(erro, "Por favor digite o E-mail");
    else
        ocultaErro(erro);

    // validação do campo endereco
    campo = document.getElementById("endereco");
    erro = document.getElementById("msg-endereco");
    if (campo.value == "")
        mostraErro(erro, "Por favor digite o Endereço completo");
    else
        ocultaErro(erro);

    // validação do campo bairro
    campo = document.getElementById("bairro");
    erro = document.getElementById("msg-bairro");
    if (campo.value == "")
        mostraErro(erro, "Por favor selecione o Bairro");
    else
        ocultaErro(erro);

    // validação do campo perfil
    var perfilP = document.getElementById("perfilP");
    var perfilC = document.getElementById("perfilC");
    erro = document.getElementById("msg-perfil");
    if (!perfilP.checked & !perfilC.checked)
        mostraErro(erro, "Por favor selecione o Perfil");
    else
        ocultaErro(erro);

    // validação do campo login
    campo = document.getElementById("login2");
    erro = document.getElementById("msg-login");
    if (campo.value == "")
        mostraErro(erro, "Por favor digite o login");
    else if (campo.value.length < 6)
        mostraErro(erro, "O Login deve possuir pelo menos 6 caracteres");
    else
        ocultaErro(erro);

    // validação do campo senha
    campo = document.getElementById("senha");
    erro = document.getElementById("msg-senha");
    if (campo.value == "")
        mostraErro(erro, "Por favor digite a Senha");
    else if (senha.value.length < 6)
        mostraErro(erro, "A Senha deve possuir pelo menos 6 caracteres");
    else
        ocultaErro(erro);

    // validação da repetição da senha
    var campo2 = document.getElementById("senha2");
    erro = document.getElementById("msg-senha2");
    if ((campo2.value == "") || (campo.value != campo2.value))
        mostraErro(erro, "A senha não confere");
    else
        ocultaErro(erro);

    // validação do checkbox
    campo = document.getElementById("concordo");
    erro = document.getElementById("msg-concordo");
    if (!campo.checked)
        mostraErro(erro, "Você precisa concordar com os termos de uso do site");
    else
        ocultaErro(erro);


    if (contErros > 0)
        return false;
    else
        alert("Cadastro realizado com sucesso"); // será removido futuramente
}