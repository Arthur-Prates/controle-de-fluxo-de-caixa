$('.cpf').mask('000.000.000-00');
var options = {
    onKeyPress: function (tell, e, field, options) {
        var masks = ['(00) 0 0000-0000', '(00) 0000-0000'];
        var mask = (tell.length < 15) ? masks[1] : masks[0];
        $('.telefoneBR').mask(mask, options);
    }
};

$('.telefoneBR').mask('(00) 0 0000-0000', options);


function carregarConteudo(controle) {
    fetch('controle.php', {
        method: 'POST', headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        }, body: 'controle=' + encodeURIComponent(controle),
    })
        .then(response => response.text())
        .then(data => {

            document.getElementById('show').innerHTML = data;
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
}


function mostrarsenha() {
    var inputPass = document.getElementById('senha');
    var olhoFechado = document.getElementById('olhoFechado');
    var olhoAberto = document.getElementById('olhoAberto');

    if (inputPass.type === 'password') {
        inputPass.setAttribute('type', 'text');
        olhoAberto.style.display = 'block';
        olhoFechado.style.display = 'none';
    } else {
        inputPass.setAttribute('type', 'password');

        olhoFechado.style.display = 'block';
        olhoAberto.style.display = 'none';
    }
}

function redireciona(link) {
    window.location.href = link + '.php';

}

function fazerLogin() {
    var email = document.getElementById("email").value;
    var senha = document.getElementById("senha").value;
    var alertlog = document.getElementById("alertlog");

    if (email === "") {
        alertlog.style.display = "block";
        alertlog.innerHTML =
            "email não digitado.";
        return;
    } else if (senha === "") {
        alertlog.style.display = "block";
        alertlog.innerHTML =
            "Senha não digitada.";
        return;
    } else if (senha.length < 8) {
        alertlog.style.display = "block";
        alertlog.innerHTML = "Mínimo de 8 digitos.";
        return;
    } else {
        alertlog.style.display = "none";
    }
    fetch("login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body:
            "email=" +
            encodeURIComponent(email) +
            "&senha=" +
            encodeURIComponent(senha),
    })
        .then((response) => response.json())
        .then((data) => {

            if (data.success) {
                setTimeout(function () {
                    window.location.href = "dashboard.php";
                }, 2000);
                //alert(data.message);
                alertlog.classList.remove("erroBonito");
                alertlog.classList.add("acertoBonito");
                alertlog.innerHTML = data.message;
                alertlog.style.display = "block";
            } else {
                alertlog.style.display = "block";
                alertlog.innerHTML = data.message;
            }

        })
    // .catch((error) => {
    //     console.error("Erro na requisição", error);
    // });
}

function abrirModalJsPedido(id, inID, idCliente, inIdCliente, idAdm, inIdAdm, idServico, inIdServico, idValor, inIdValor, idDataInicio, inIdDataInicio, idDataFinal, inIdDataFinal, idtipoPag, inIdtipoPag, idNumParc, inIdNumParc, dataTime, nomeModal, abrirModal = 'A', botao, addEditDel, formulario) {

    const formDados = document.getElementById(`${formulario}`)
    var botoes = document.getElementById(`${botao}`);
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();

        const inputid = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            inputid.value = id;
        }


        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);
            if (dataTime !== 'nao') {
                formData.append('dataTime', `${dataTime}`)
            }
            formData.append('controle', `${addEditDel}`)

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        // carregarConteudo("listarPedido");

                        // switch (addEditDel) {
                        //     case 'addProprietario':
                        //         addOuEditSucesso('Você', 'success', 'adicionou')
                        //         break;
                        //     case 'editProprietario':
                        //         addOuEditSucesso('Você', 'info', 'editou')
                        //         botoes.disabled = false;
                        //         break;
                        //     case 'deleteProprietario':
                        //         addOuEditSucesso('Você', 'success', 'deletou')
                        //         botoes.disabled = false;
                        //         break;
                        // }
                        ModalInstacia.hide();
                    } else {
                        // addErro()
                        ModalInstacia.hide();
                        carregarConteudo("listarPedido");
                    }
                })
                .catch(error => {
                    botoes.disabled = false;
                    ModalInstacia.hide();
                    // addErro()
                    carregarConteudo("listarPedido");
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        botoes.disabled = false;
        ModalInstacia.hide();
    }

}
