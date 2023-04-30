// const carrossel = document.querySelector('.carrossel');
// const setaDireita = document.querySelector('.seta-direita');

// setaDireita.addEventListener('click', () => {
//   carrossel.scrollBy({
//     left: carrossel.offsetWidth, // rolar para a direita pelo tamanho do carrossel
//     behavior: 'smooth' // rolagem suave
//   });
// });

const carrossel = document.querySelector('.carrossel');
const setasNavegacao = document.querySelectorAll('.seta-esquerda, .seta-direita');

for (let seta of setasNavegacao) {
  seta.addEventListener('click', () => {
    if (seta.classList.contains('seta-direita')) {
      carrossel.scrollBy({
        left: carrossel.offsetWidth, // rolar para a direita pelo tamanho do carrossel
        behavior: 'smooth' // rolagem suave
      });
    } else if (seta.classList.contains('seta-esquerda')) {
      carrossel.scrollBy({
        left: -carrossel.offsetWidth, // rolar para a esquerda pelo tamanho do carrossel
        behavior: 'smooth' // rolagem suave
      });
    }
  });
}

//Menu empresa

function menuOpenPerfil(){
  let menuMobile = document.querySelector('.menuPerfil');
  if (menuMobile.classList.contains('open')) {
      menuMobile.classList.remove('open');
  }
  else {
      menuMobile.classList.add('open');
  }
};

function menuOpenCliente(){
  let menuMobile = document.querySelector('.headerMenuCliente');
  if (menuMobile.classList.contains('open')) {
      menuMobile.classList.remove('open');
  }
  else {
      menuMobile.classList.add('open');
  }
};


