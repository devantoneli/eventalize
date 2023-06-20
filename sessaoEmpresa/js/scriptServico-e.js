
//INCIO SCRIPT DE criacaoServico-e.html
//FUNCAO PARA PRE-VISUALIZACAO DA IMAGEM CARREGADA NO INPUT

var linkCapa;
var link2;
var link3;
function lerImgCapa() {
    const card = document.querySelector('.cardCarregarG');
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function(e) {
            document.getElementById("preview-capa").src = e.target.result;
            linkCapa = e.target.result;
            console.log(linkCapa);
            document.getElementById("linkimgCapa").value = linkCapa;

            var input = document.getElementById('img-inputCapa');
            input.hidden = true;
        };       
        file.readAsDataURL(this.files[0]);
        // Retira o icone de upload do card quando carrega uma imagem nele
        card.style.backgroundImage = 'none';
        document.getElementById("preview-capa").style.opacity = '1';
    }
  }
  document.getElementById("img-inputCapa").addEventListener("change", lerImgCapa, false);
  
  function lerImg2() {
    const card = document.querySelector('.img2');
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function(e) {
            document.getElementById("preview-2").src = e.target.result;
            link2 = e.target.result;
            console.log(link2);
            document.getElementById("linkimg2").value = link2;
        };       
        file.readAsDataURL(this.files[0]);
        card.style.backgroundImage = 'none';
        document.getElementById("preview-2").style.opacity = '1';
    }
  }
  document.getElementById("img-input2").addEventListener("change", lerImg2, false);
  
  function lerImg3() {
    const card = document.querySelector('.img3');
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function(e) {
            document.getElementById("preview-3").src = e.target.result;
            link3 = e.target.result;
            console.log(link3);
            document.getElementById("linkimg3").value = link3;
        };       
        file.readAsDataURL(this.files[0]);
        card.style.backgroundImage = 'none';
        document.getElementById("preview-3").style.opacity = '1';
    }
  }
  document.getElementById("img-input3").addEventListener("change", lerImg3, false);

//FIM SCRIPT DE criacaoServico-e.html

//MODAL SERVIÇO EDITADO



const h3 = document.querySelector('#animacao');

function mostrarAnimacao() {
  h3.classList.toggle('hidden');
  h3.classList.toggle('active');
}
  function exibirModal() {
  const svg = document.querySelector('svg');
  
  const botao = document.querySelector('#mostrarAnimacao');
    svg.classList.toggle('active');
    svg.style.fill = "blue";



  mostrarAnimacao();
  botao.addEventListener('click', mostrarAnimacao);
    // exibe a modal
    document.getElementById("modal").style.display = "block";
    document.getElementById("escurecer").style.display = "block";
    var elemento = document.getElementById("topo");
    var posicao = elemento.getBoundingClientRect().top + window.pageYOffset;
    window.scrollTo({top: posicao, behavior: "smooth"});
  
    // esconde a modal após 3 segundos
    // setTimeout(function() {
    //   document.getElementById("modal").style.display = "none";
    // }, 3000);

  }
  // console.log("youg");