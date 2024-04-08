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

function mostrarProcessando() {
    var divFundoEscuro = document.createElement('div');
    divFundoEscuro.id = 'fundoEscuro';
    divFundoEscuro.style.position = 'fixed';
    divFundoEscuro.style.top = '0';
    divFundoEscuro.style.left = '0';
    divFundoEscuro.style.width = '100%';
    divFundoEscuro.style.height = '100%';
    divFundoEscuro.style.backgroundColor = 'rgba(0,0,0,0.7)';
    document.body.appendChild(divFundoEscuro);

    var divProcessando = document.createElement('div');
    divProcessando.id = 'processandoDiv';
    divProcessando.style.position = 'fixed';
    divProcessando.style.top = '40%';
    divProcessando.style.left = '50%';
    divProcessando.style.transform = 'translate(-50%, -50%)';
    divProcessando.innerHTML = '<lottie-player autoplay loop mode="normal" src="./img/loading/logado.json" style="width: 140px;"></lottie-player>'
    document.body.appendChild(divProcessando);
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
                mostrarProcessando();
                setTimeout(function () {
                    window.location.href = "dashboard.php";
                }, 4200);
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

                const verMaisPag = document.getElementById('verMaisTipoPag');
                // const verEntrada = document.getElementById('verMaisentrada').value();
                // const EntradaValue = document.getElementById(`${idEntrada}`).value();

                if (idEntrada === '' || idEntrada === 0 || idEntrada === null) {
                    verMaisPag.value = 'À Vista';
                } else {
                    verMaisPag.value = 'A Prazo';
                }

                const inEntrada = document.getElementById(`${inIdEntrada}`);
                if (inIdEntrada !== 'nao') {
                    inEntrada.value = idEntrada;
                }

                const inIdClient = document.getElementById(`${inIdCliente}`);
                if (inIdCliente !== 'nao') {
                    inIdClient.value = idCliente;
                }
                const inAdm = document.getElementById(`${inIdAdm}`);
                if (inIdAdm !== 'nao') {
                    inAdm.value = idAdm;
                }
                const inIdNumParcel = document.getElementById(`${inIdNumParc}`);
                if (inIdNumParc !== 'nao') {
                    inIdNumParcel.value = idNumParc + ' Parcela(s)';
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

        if (idEntrada !== '') {
            const tipoEditPrazo = document.getElementById('tipoEditPrazo');
            const editParc = document.getElementById('editParcela');
            const editEntra = document.getElementById('editEntrada');
            const nomeEditEntra = document.getElementById('nomeEditEntrada');
            editParc.style.display = 'block';
            nomeEditEntra.style.display = 'block';
            editEntra.style.display = 'block';
            tipoEditPrazo.checked = true;


        }else{
            const editParc = document.getElementById('editParcela');
            const editEntra = document.getElementById('editEntrada');
            const nomeEditEntra = document.getElementById('nomeEditEntrada');
            const tipoEditVista = document.getElementById('tipoEditVista');
            editParc.style.display = 'none';
            nomeEditEntra.style.display = 'none';
            editEntra.style.display = 'none';
            tipoEditVista.checked = true;
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

                    if (data.success) {
                        carregarConteudo("listarPedido");

                            if (addEditDel==='addPedido'){
                                alertSuccess(data.message,'Add')
                            }else if(addEditDel==='editPedido'){
                                alertSuccess(data.message,'Editar')
                            }else{
                                alertSuccess(data.message,'Deletar')
                            }

                        ModalInstacia.hide();
                    } else {
                        alertError(data.message);
                        ModalInstacia.hide();
                        carregarConteudo("listarPedido");
                    }
                })
                .catch(error => {
                    botoes.disabled = false;
                    ModalInstacia.hide();
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

            formData.append('controle', `${addEditDel}`)
            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {

                    if (data.success) {

                        carregarConteudo("listarCliente");

                        if (addEditDel=='addCliente'){
                            alertSuccess(data.message,'Add')
                        }else if(addEditDel=='editPedido'){
                            alertSuccess(data.message,'Editar')
                        }else{
                            alertSuccess(data.message,'Deletar')
                        }


                        ModalInstacia.hide();
                    } else {

                        alertError(data.message)
                        ModalInstacia.hide();
                        carregarConteudo("listarCliente");
                    }
                })
                .catch(error => {
                    botoes.disabled = false;
                    ModalInstacia.hide();
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

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);

            formData.append('controle', `${addEditDel}`)
            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {

                    if (data.success) {

                        carregarConteudo("listarServico");

                        if (addEditDel=='addServico'){
                            alertSuccess(data.message,'Add')
                        }else if(addEditDel=='editServico'){
                            alertSuccess(data.message,'Editar')
                        }else{
                            alertSuccess(data.message,'Deletar')
                        }


                        ModalInstacia.hide();
                    } else {
                        // addErro()
                        alertError(data.message)
                        ModalInstacia.hide();
                        carregarConteudo("listarServico");
                    }
                })
                .catch(error => {
                    botoes.disabled = false;
                    ModalInstacia.hide();
                    carregarConteudo("listarServico");
                    console.error('Erro na requisição:', error);
                });
        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        botoes.disabled = false;
        ModalInstacia.hide();
    }

}

function abrirModalJsAtendente(id, inID, nomeAtendente, inNomeAtendente, emailAtendente, inEmailAtendente, senhaAtendente, inSenhaAtendente, dataTime, nomeModal, abrirModal = 'A', botao, addEditDel, inFocus, inFocusValue, formulario) {
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
        const inputNome = document.getElementById(`${inNomeAtendente}`);
        if (inNomeAtendente !== 'nao') {
            inputNome.value = nomeAtendente;
        }
        const inputEmail = document.getElementById(`${inEmailAtendente}`);
        if (inEmailAtendente !== 'nao') {
            inputEmail.value = emailAtendente;
        }
        const inputSenha = document.getElementById(`${inSenhaAtendente}`);
        if (inSenhaAtendente !== 'nao') {
            inputSenha.value = senhaAtendente;
        }


        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);

            formData.append('controle', `${addEditDel}`)
            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {

                    if (data.success) {
                        carregarConteudo("listarAtendente");


                        if (addEditDel=='addAtendente'){
                            alertSuccess(data.message,'Add')
                        }else if(addEditDel=='editAtendente'){
                            alertSuccess(data.message,'Editar')
                        }else{
                            alertSuccess(data.message,'Deletar')
                        }


                        ModalInstacia.hide();
                    } else {
                        // addErro()
                        alertError(data.message);
                        ModalInstacia.hide();
                        carregarConteudo("listarAtendente");
                    }
                })
                .catch(error => {
                    botoes.disabled = false;
                    ModalInstacia.hide();
                    // addErro()
                    carregarConteudo("listarServico");
                    console.error('Erro na requisição:', error);
                });
        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        botoes.disabled = false;
        ModalInstacia.hide();
    }

}

function alertSuccess(message, AddEditarDeletar) {
    if (AddEditarDeletar === 'Add') {
        AddEditarDeletar = "#006A0C";
    } else if (AddEditarDeletar === 'Editar') {
        AddEditarDeletar = "#0DCAF0";
    }else{
        AddEditarDeletar = "#dc3545";
    }


    Toastify({
        text: `${message}`,
        duration: 3000,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: AddEditarDeletar,
        },
    }).showToast();
}

function alertError(message) {
    Toastify({
        text: `${message}`,
        duration: 3000,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "#910000",
        },
    }).showToast();
}