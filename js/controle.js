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

if (document.getElementById('tipoEditVista')) {
    const tipoEditVista = document.getElementById('tipoEditVista');
    const tipoEditPrazo = document.getElementById('tipoEditPrazo');
    const editParc = document.getElementById('editParcela');
    const editEntra = document.getElementById('editEntrada');
    const nomeEditEntra = document.getElementById('nomeEditEntrada');
    tipoEditPrazo.addEventListener('click', function () {
        editParc.style.display = 'block';
        nomeEditEntra.style.display = 'block';
        editEntra.style.display = 'block';
        editEntra.value = editEntraValue;
    })
    tipoEditVista.addEventListener('click', function () {
        editParc.style.display = 'none';
        nomeEditEntra.style.display = 'none';
        editEntra.style.display = 'none';
        editEntra.value = '';

    })
}


function abrirModalJsPedido(id, inID, idCliente, inIdCliente, idAdm, inIdAdm, idServico, inIdServico, idValor, inIdValor, idDataInicio, inIdDataInicio, idDataFinal, inIdDataFinal, idEntrada, inIdEntrada, idNumParc, inIdNumParc, nomeModal, abrirModal = 'A', botao, addEditDel, formulario) {

    const formDados = document.getElementById(`${formulario}`)
    var botoes = document.getElementById(`${botao}`);
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show()

        const inputid = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            inputid.value = id;
        }

        const inValor = document.getElementById(`${inIdValor}`);
        if (inIdValor !== 'nao') {
            inValor.value = idValor;
            if (document.getElementById('verMaisCliente')) {

                const inIdClient = document.getElementById(`${inIdCliente}`);
                if (inIdCliente !== 'nao') {
                    inIdClient.value = idCliente;
                }
                const inIdNumParcel = document.getElementById(`${inIdNumParc}`);
                if (inIdNumParc !== 'nao') {
                    inIdNumParcel.value = idNumParc+ ' Parcela(s)';
                }

                const inIdServ = document.getElementById(`${inIdServico}`);
                if (inIdServico !== 'nao') {
                    inIdServ.value = idServico;
                }
            }
        }

        const inDataIN = document.getElementById(`${inIdDataInicio}`);
        if (inIdDataInicio !== 'nao') {
            inDataIN.value = idDataInicio;
        }
        const inDataEND = document.getElementById(`${inIdDataFinal}`);
        if (inIdDataFinal !== 'nao') {
            inDataEND.value = idDataFinal;
        }
        const Entrada = document.getElementById(`${inIdEntrada}`);
        if (inIdEntrada !== 'nao' && inIdEntrada !== 0 && inIdEntrada !== '') {
            Entrada.value = idEntrada;
            const tipoEditPrazo = document.getElementById('tipoEditPrazo');
            const editParc = document.getElementById('editParcela');
            const editEntra = document.getElementById('editEntrada');
            const nomeEditEntra = document.getElementById('nomeEditEntrada');
            editParc.style.display = 'block';
            nomeEditEntra.style.display = 'block';
            editEntra.style.display = 'block';
            tipoEditPrazo.checked = true;


        }
        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);
            formData.append('controle', `${addEditDel}`)
            formData.append('id', `${id}`)

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        carregarConteudo("listarPedido");

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


function abrirModalJsCliente(id, inID, nomeCliente, inNomeCliente, contatoCliente, inContatoCliente, emailCliente, inEmailCliente, dataTime, nomeModal, abrirModal = 'A', botao, addEditDel, inFocus, inFocusValue, formulario) {
    const formDados = document.getElementById(`${formulario}`)

    var botoes = document.getElementById(`${botao}`);
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();

        const inputFocar = document.getElementById(`${inFocus}`);
        if (inFocusValue !== 'nao') {
            inputFocar.value = inFocusValue;
            setTimeout(function () {
                inputFocar.focus();
            }, 500);
        }
        const inputid = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            inputid.value = id;
        }
        const inputNome = document.getElementById(`${inNomeCliente}`);
        if (inNomeCliente !== 'nao') {
            inputNome.value = nomeCliente;
        }
        const inputContato = document.getElementById(`${inContatoCliente}`);
        if (inContatoCliente !== 'nao') {
            inputContato.value = contatoCliente;
        }
        const inputEmail = document.getElementById(`${inEmailCliente}`);
        if (inEmailCliente !== 'nao') {
            inputEmail.value = emailCliente;
        }


        const submitHandler = function (event) {
            event.preventDefault();
            // alert('AQUIIIII')
            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);
            // if (dataTime !== 'nao') {
            //     formData.append('dataTime', `${dataTime}`)
            // }
            formData.append('controle', `${addEditDel}`)
            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        carregarConteudo("listarCliente");
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
                        carregarConteudo("listarCliente");
                    }
                })
                .catch(error => {
                    botoes.disabled = false;
                    ModalInstacia.hide();
                    // addErro()
                    carregarConteudo("listarCliente");
                    console.error('Erro na requisição:', error);
                });
        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        botoes.disabled = false;
        ModalInstacia.hide();
    }

}


function abrirModalJsServico(id, inID, nomeServico, inNomeServico, dataTime, nomeModal, abrirModal = 'A', botao, addEditDel, inFocus, inFocusValue, formulario) {
    const formDados = document.getElementById(`${formulario}`)

    var botoes = document.getElementById(`${botao}`);
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();

        const inputFocar = document.getElementById(`${inFocus}`);
        if (inFocusValue !== 'nao') {
            inputFocar.value = inFocusValue;
            setTimeout(function () {
                inputFocar.focus();
            }, 500);
        }
        const inputid = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            inputid.value = id;
        }
        const inputNome = document.getElementById(`${inNomeServico}`);
        if (inNomeServico !== 'nao') {
            inputNome.value = nomeServico;
        }


        const submitHandler = function (event) {
            event.preventDefault();
            // alert('AQUIIIII')
            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);
            // if (dataTime !== 'nao') {
            //     formData.append('dataTime', `${dataTime}`)
            // }
            formData.append('controle', `${addEditDel}`)
            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        carregarConteudo("listarServico");
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
                        carregarConteudo("listarServico");
                    }
                })
                // .catch(error => {
                //     botoes.disabled = false;
                //     ModalInstacia.hide();
                //     // addErro()
                //     carregarConteudo("listarServico");
                //     console.error('Erro na requisição:', error);
                // });
        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        botoes.disabled = false;
        ModalInstacia.hide();
    }

}