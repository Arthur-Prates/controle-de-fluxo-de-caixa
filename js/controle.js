function carregarConteudo(controle){
    fetch('controle.php', {
        method: 'POST', headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        }, body: 'controle=' + encodeURIComponent(controle),
    })
        .then(response => response.text())
        .then(data => {

            document.getElementById('show').innerHTML= data;
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
}

function mudarTema() {
    var tema = document.body.classList;

    var btnMudarTema = document.getElementById('btnMudarTema')


    if (tema == 'temaBranco') {
        document.body.setAttribute('data-bs-theme', 'dark');
        btnMudarTema.innerHTML = '<span class="mdi mdi-moon-waning-crescent"></span>'
        document.body.classList.add('temaPreto');
        document.body.classList.remove('temaBranco');
        // document.body.classList.add('bg-black');
        btnMudarTema.classList.remove('btn-outline-warning');
        btnMudarTema.classList.add('btn-outline-secondary');
        // div.innerHTML = `${tema}`;
    } else if (tema == 'temaPreto') {
        btnMudarTema.innerHTML = ' <span class="mdi mdi-weather-sunny"></span>'
        document.body.setAttribute('data-bs-theme', 'light')
        document.body.classList.add('temaBranco');
        document.body.classList.remove('temaPreto');
        btnMudarTema.classList.remove('btn-outline-secondary');
        btnMudarTema.classList.add('btn-outline-warning');


    }
}

$('.cpf').mask('000.000.000-00');


var options = {
    onKeyPress: function (tell, e, field, options) {
        var masks = ['(00) 0 0000-0000', '(00) 0000-0000'];
        var mask = (tell.length < 15) ? masks[1] : masks[0];
        $('.telefoneBR').mask(mask, options);
    }
};

$('.telefoneBR').mask('(00) 0 0000-0000', options);


function mostrarsenha() {
    var inputPass = document.getElementById('senha');
    var btnShowPass = document.getElementById('btn-senha');

    if (inputPass.type === 'password') {
        inputPass.setAttribute('type', 'text');
        btnShowPass.classList.replace('bi-eye-slash', 'bi-eye');
    }
    else {
        inputPass.setAttribute('type', 'password');
        btnShowPass.classList.replace('bi-eye', 'bi-eye-slash');
    }
}


function abrirModalJsProprietario(id, inID, nomeProp, inNomeProp, dataTime, nomeModal, abrirModal = 'A', botao, addEditDel, inFocus, inFocusValue, formulario) {
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


        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);
            if (inID !== 'nao') {
                formData.append('id', `${id}`)
            }
            if (dataTime !== 'nao') {
                formData.append('dataTime', `${dataTime}`)
            }
            formData.append('controle', `${addEditDel}`)

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        carregarConteudo("listarProprietarios");

                        switch (addEditDel) {
                            case 'addProprietario':
                                addOuEditSucesso('Você', 'success', 'adicionou')
                                break;
                            case 'editProprietario':
                                addOuEditSucesso('Você', 'info', 'editou')
                                botoes.disabled = false;
                                break;
                            case 'deleteProprietario':
                                addOuEditSucesso('Você', 'success', 'deletou')
                                botoes.disabled = false;
                                break;
                        }
                        ModalInstacia.hide();
                    } else {
                        addErro()
                        ModalInstacia.hide();
                        carregarConteudo("listarProprietarios");
                    }
                })
                .catch(error => {
                    botoes.disabled = false;
                    ModalInstacia.hide();
                    addErro()
                    carregarConteudo("listarProprietarios");
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        botoes.disabled = false;
        ModalInstacia.hide();
    }

}
