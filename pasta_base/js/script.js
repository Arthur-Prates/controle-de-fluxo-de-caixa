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

