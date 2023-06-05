
//INCIO SCRIPT DE criacaoServico-e.html
//FUNCAO PARA PRE-VISUALIZACAO DA IMAGEM CARREGADA NO INPUT

var linkCapa;
var link2;
var link3;
function lerImgCapa() {
    const card = document.querySelector('.uploadImgPedido');
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function(e) {
            document.getElementById("preview-capa").src = e.target.result;
            linkCapa = e.target.result;
            console.log(linkCapa);
            document.getElementById("linkimgCapa").value = linkCapa;
        };       
        file.readAsDataURL(this.files[0]);
        // Retira o icone de upload do card quando carrega uma imagem nele
        card.style.backgroundImage = 'none';
        document.getElementById("preview-capa").style.opacity = '1';
    }
  }
  document.getElementById("img-inputCapa").addEventListener("change", lerImgCapa, false);
  
  function lerImg2() {
    const card = document.querySelector('.uploadImg');
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
    const card = document.querySelector('.uploadImg2');
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
  
  
  