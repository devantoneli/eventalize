var linkPerfil;

function lerImgPerfil() {
    const card = document.querySelector('.cardCarregarFoto');
    if (this.files && this.files[0]){
        var file = new FileReader();
        file.onload = function(e) {
            document.getElementById("preview-capa").src = e.target.result;
            linkPerfil = e.target.result;
            console.log(linkPerfil);
            document.getElementById("linkimgPerfil").value = linkPerfil;
        };
        file.readAsDataURL(this.files[0]);
    }
}
document.getElementById("img-inputFotoPerfil").addEventListener("change", lerImgPerfil, false);