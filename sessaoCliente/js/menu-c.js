function menuOpen(){
    let menuMobile = document.querySelector('.menuPerfil');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open');
    }
    else {
        menuMobile.classList.add('open');
    }
}

//Botão Lupa
function submitForm() {
    document.getElementById("searchForm").submit();
}