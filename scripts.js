function funcaoCpf(campo){
    tam = campo.value.length;
    if (tam == 3){
        campo.value = campo.value + ".";
    } else if (tam == 7){
        campo.value = campo.value + ".";
    } else if (tam == 11){
        campo.value = campo.value + "-";
    }
}
function validarCpf( s ){

    var i;

    s = s.replace(".", "");
    s = s.replace(".", "");
    s = s.replace("-", "");

    var c = s.substr(0,9);
    var dv = s.substr(9,2);
    var d1 = 0;
    for (i = 0; i < 9; i++)
    {
        d1 += c.charAt(i)*(10-i);
    }

    if (d1 == 0){
        return false;
    }

    d1 = 11 - (d1 % 11);

    if (d1 > 9) d1 = 0;

    if (dv.charAt(0) != d1)
    {
        return false;
    }


    d1 *= 2;

    for (i = 0; i < 9; i++)

    {

            d1 += c.charAt(i)*(11-i);

        }

    d1 = 11 - (d1 % 11);

    if (d1 > 9) d1 = 0;

    if (dv.charAt(1) != d1)
    {
        return false;
    }
    return true;
}

function funcaoTel(campo){
    tam = campo.value.length;
    if (tam == 0){
        campo.value = campo.value + "(";
    } else if (tam == 3){
        campo.value = campo.value + ")";
    } else if (tam == 8){
        campo.value = campo.value + "-";
    }
}

function funcaoCep(campo){
    tam = campo.value.length;
    if (tam == 5){
        campo.value = campo.value + "-";
    }
}
function funcaoMarca(valor){
    if (valor != ""){
        window.open(valor)
    }
}
function funcaoData(campo){
    tam = campo.value.length;
    if (tam == 2){
        campo.value = campo.value + "/";
    } else if (tam == 5){
        campo.value = campo.value + "/";
    }
}
function funcaoHora(campo){
    tam = campo.value.length;
    if (tam == 2){
        campo.value = campo.value + ":";
    }
}

function funcaoPlaca(campo){
    tam = campo.value.length;
    if (tam == 3){
        campo.value = campo.value + "-";
    }
    for (tam = 0; tam <= 8; tam++){
        campo.value = campo.value.toString().toUpperCase();
    }

}

function funcaoPreco(campo){
    tam = campo.value.length;
    if (tam == 0){
        campo.value = campo.value + "R$";

    }
}

function msgExcluir(){
    alert("Cliente EXCLUÍDO com SUCESSO!")
}

function fecharBuscaCliente ( codC, nome) {
    opener.document.forms[0].txtIdCliente.value = codC;
    opener.document.forms[0].txtNome.value = nome;
    close();

}

function fecharBuscaVeiculo ( codV, marca, modelo) {
    opener.document.forms[0].txtIdVeiculo.value = codV;
    opener.document.forms[0].txtVeiculo.value = marca + " " + modelo;
    close();

}