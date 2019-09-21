function verificaLogin() {

    user = document.getElementById("user").value;
    senha = document.getElementById("senha").value;

    if(user.length < 5) {
        alert("Insira um login valido.");
        return false;
    }
    else if(senha.length < 5) {
        alert("Insira uma senha valida.");
        return false;
    }
    else {
        return true;
    }
}

function verificaCadastro() {
    var Soma;
    var Resto;
    Soma = 0;
    user = document.getElementById("user").value;
    senha = document.getElementById("senha").value;
    nomeUser = document.getElementById("nomeUser").value;
    email = document.getElementById("email").value;
    dataNasc =  document.getElementById("dataNasc").value;
    cpf = document.getElementById("cpf").value;

    if(user.length < 5) {
        alert("Insira um login válido.");
        return false;
    }
    else if(senha.length < 5) {
        alert("Insira uma senha válida.");
        return false;
    }
    else if(nomeUser.length < 5) {
        alert("Insira um nome de usuário válido.")
        return false;
    }
    else if(email.length < 5) {
        alert("Insira um email válido.")
        return false;
    }
    else if(nomeUser.length < 5) {
        alert("Insira uma data de nascimento válida.")
        return false;
    }
    else if (cpf.length < 11) {alert("Insira um cpf válido."); return false;}
    else if (cpf == "00000000000") {alert("Insira um cpf válido."); return false;}
    else if (cpf == "11111111111") {alert("Insira um cpf válido."); return false;}
    else if (cpf == "22222222222") {alert("Insira um cpf válido."); return false;}
    else if (cpf == "33333333333") {alert("Insira um cpf válido."); return false;}
    else if (cpf == "44444444444") {alert("Insira um cpf válido."); return false;}
    else if (cpf == "55555555555") {alert("Insira um cpf válido."); return false;}
    else if (cpf == "66666666666") {alert("Insira um cpf válido."); return false;}
    else if (cpf == "77777777777") {alert("Insira um cpf válido."); return false;}
    else if (cpf == "88888888888") {alert("Insira um cpf válido."); return false;}
    else if (cpf == "99999999999") {alert("Insira um cpf válido."); return false;}
    else if (cpf == "12345678910") {alert("Insira um cpf válido."); return false;}
    else if (cpf == "10987654321") {alert("Insira um cpf válido."); return false;}
    for (i=1; i<=9; i++) Soma = Soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(cpf.substring(9, 10)) ) {alert("Insira um cpf válido."); return false;}
    Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(cpf.substring(10, 11) ) ) {alert("Insira um cpf válido."); return false;}

}