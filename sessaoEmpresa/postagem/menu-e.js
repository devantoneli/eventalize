// MENU SUSPENSO geral

const iconSeta = document.getElementById('iconSeta');
const menu = document.getElementById('menu');

let menuAberto = false;

function abrirMenu() {
  if (!menuAberto) {
    menu.style.display = 'grid';
  }
}

function fecharMenu() {
  if (!menuAberto) {
    menu.style.display = 'none';
  }
}

function togglemenu() {
  menuAberto = !menuAberto;
  menu.style.display = menuAberto ? 'grid' : 'none';
}

function esconderMenu(event) {
  const isClickInside = iconSeta.contains(event.target) || menu.contains(event.target);
  if (!isClickInside) {
    menuAberto = false;
    menu.style.display = 'none';
    document.removeEventListener('click', esconderMenu);
  }
}

iconSeta.addEventListener('mouseover', abrirMenu);
menu.addEventListener('mouseover', abrirMenu);
iconSeta.addEventListener('mouseout', fecharMenu);
menu.addEventListener('mouseout', fecharMenu);

iconSeta.addEventListener('click', (event) => {
  togglemenu();
  if (menuAberto) {
    document.addEventListener('click', esconderMenu);
  } else {
    document.removeEventListener('click', esconderMenu);
  }
});

//MENU SUSPENSO perfil

const inserirPerfil = document.getElementById('inserirPerfil');
const menuPerfil = document.getElementById('menuPerfil');

let mPerfilAberto = false;

function abrirMPerfil() {
  if (!mPerfilAberto) {
    menuPerfil.style.display = 'grid';
  }
}

function fecharMPerfil() {
  if (!mPerfilAberto) {
    menuPerfil.style.display = 'none';
  }
}

function toggleMPerfil() {
  mPerfilAberto = !mPerfilAberto;
  menuPerfil.style.display = mPerfilAberto ? 'grid' : 'none';
}

function esconderMPerfil(evento) {
  const isClickIn = inserirPerfil.contains(evento.target) || menuPerfil.contains(evento.target);
  if (!isClickIn) {
    mPerfilAberto = false;
    menuPerfil.style.display = 'none';
    document.removeEventListener('click', esconderMPerfil);
  }
}

inserirPerfil.addEventListener('mouseover', abrirMPerfil);
menuPerfil.addEventListener('mouseover', abrirMPerfil);
inserirPerfil.addEventListener('mouseout', fecharMPerfil);
menuPerfil.addEventListener('mouseout', fecharMPerfil);

inserirPerfil.addEventListener('click', (evento) => {
  toggleMPerfil();
  if (mPerfilAberto) {
    document.addEventListener('click', esconderMPerfil);
  } else {
    document.removeEventListener('click', esconderMPerfil);
  }
});