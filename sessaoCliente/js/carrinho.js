function submitButton() {
    document.getElementById("botaoCarrinho").submit();
}

document.getElementById("iconeFiltro").addEventListener("click", function() {
    var menu = document.getElementById("menuSuspenso");
    if (menu.style.display === "block") {
      menu.style.display = "none";
    } else {
      menu.style.display = "block";
    }
  });

document.getElementById("iconeStatus").addEventListener("click", function() {
    var menu = document.getElementById("menuSuspenso2");
    if (menu.style.display === "block") {
      menu.style.display = "none";
    } else {
      menu.style.display = "block";
    }
  });