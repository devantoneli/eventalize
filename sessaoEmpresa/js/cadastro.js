function limparColagem(event) {
    event.preventDefault();
    var clipboardData = event.clipboardData || window.clipboardData;
    var text = clipboardData.getData('text/plain');
    document.getElementById('senha').value = '';
  }

  var cidadesPorEstado = {
    sp: ["São Paulo", "Campinas", "Guarulhos"],
    rj: ["Rio de Janeiro", "Niterói", "Duque de Caxias"]
  };
  
function atualizarCidades() {
var estado = document.getElementById("estado").value;
var cidadeSelect = document.getElementById("cidade");

// Limpa as opções existentes
cidadeSelect.innerHTML = "";

// Verifica se um estado foi selecionado
if (estado !== "") {
    var cidades = cidadesPorEstado[estado];

    // Adiciona as novas opções de cidades
    cidades.forEach(function (cidade) {
    var option = document.createElement("option");
    option.value = cidade;
    option.text = cidade;
    cidadeSelect.appendChild(option);
    });
} else {
    // Caso nenhum estado seja selecionado
    var option = document.createElement("option");
    option.value = "";
    option.text = "Selecione um estado primeiro";
    cidadeSelect.appendChild(option);
}
}

  
  