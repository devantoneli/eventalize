function menuOpen(){
    let menuMobile = document.querySelector('.headerHome');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open');
    }
    else {
        menuMobile.classList.add('open');
    }
}

//MENU CLIENTE 

function menuCliente(){
    let menuMobile = document.querySelector('.menuPerfil');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open');
    }
    else {
        menuMobile.classList.add('open');
    }
}


window.ex = ScrollReveal({once: true});

ex.reveal('.clientCardDivision', {
    // slide: {x: 0, y: 80, z:0},
    duration: 1000,
    distance: '80px', // deslocamento da animação
    origin: 'bottom', // direção da animação
    easing: 'ease-out', // efeito de transição
    viewFactor: 0.5
});

ex.reveal('.companyCardDivision', {
    duration: 1000,
    distance: '80px', // deslocamento da animação
    origin: 'bottom', // direção da animação
    easing: 'ease-out', // efeito de transição
    viewFactor: 0.5
});

ex.reveal('.serviceCategories', {
    duration: 1000,
    distance: '80px', // deslocamento da animação
    origin: 'bottom', // direção da animação
    easing: 'ease-out', // efeito de transição
    viewFactor: 0.5
});

ex.reveal('.cellphoneScreen', {
    duration: 1000,
    distance: '80px', // deslocamento da animação
    origin: 'bottom', // direção da animação
    easing: 'ease-out', // efeito de transição
    viewFactor: 0.5
});

/* ANIMACAO CIRCULO */
function novaSection(tipo){
    var apagar = document.getElementsByClassName("desvanecerElementos");    
    
    document.getElementsByClassName("circleMain")[0].className += ' livrarCirc'

    document.getElementsByClassName("circleMain")[0].addEventListener('animationend', () => {
        document.getElementsByClassName("circlePositionMain")[0].className += " aumentarLim";
      });

      document.getElementsByClassName("circlePositionMain")[0].className = 'sessaoCirc';
      document.getElementsByClassName("circleMain")[0].className = 'Circulo';
      document.getElementById("imgCapa").className = "ajusImg";
  
      document.getElementById("imgCapa").className += " sairElementos";

    document.getElementsByClassName("sairElementos")[0].addEventListener('animationend', () => {
        document.getElementsByClassName("Circulo")[0].className += " sectionCircular";
        document.getElementById("imgCapa").remove();
        document.getElementsByClassName("gridMain")[0].remove();
        document.body.style.overflowY = "hidden";

        if (tipo == 1){
            document.getElementById("loginCirc").style.display = 'block'
        }else {
            document.getElementById("cadastCirc").style.display = 'block'   
        }
      });

    for (var i=0;i<apagar.length;i+=1){
        apagar[i].className += " sairElementos";
        apagar[i].innerHTML = '';

      }

    var outraParte = document.getElementsByClassName("desvanecerElementos")[0];
    outraParte.innerHTML = '';
    
    
}
