var divMensagens = document.getElementById("div-mensagens");
var inputMensagem = document.getElementById('mensagem');
var chat = document.getElementsByClassName("chat")[0];
var codigoEmpresa = 0;

//Fotos e nomes aparecer no meio
var fotosLaterais = document.getElementsByClassName('imgEmpresa');
var fotoMeio = document.getElementById('fotoMeio');
var nomeMeio = document.getElementById('nomeMeio');

var chats = '';
var cd_chat = '';

function pegarCod(){
    cd_chat = fotoMeio.getAttribute("value");
    
}


// Adicione um ouvinte de eventos para cada foto lateral
ate = fotosLaterais.length - 1;
for (var i = 0; i < ate; i++) {
    fotosLaterais[i].addEventListener('click', function() {
        codigoEmpresa = this.getAttribute('value'); // Obtenha o código da empresa da foto clicada
        console.log(codigoEmpresa);
        pegarCod();
        // Faça uma requisição AJAX para obter as informações da foto e nome da empresa correspondente ao código da empresa
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Sucesso na requisição
                    var empresa = JSON.parse(xhr.responseText);

                    // Atualize a foto e o nome no meio da página com as informações da empresa
                    fotoMeio.src = empresa.foto;
                    nomeMeio.innerText = empresa.nome;
                    codigoEmpresa = empresa.codigo;
                    chats = empresa.chats;
                    cd_chat = empresa.cd_chat;
                    fotoMeio.setAttribute("value", cd_chat);
                    fotoMeio.setAttribute("empresa", codigoEmpresa);
                    pegarCod();
                } else {
                    // Erro na requisição
                    console.error('Erro na requisição AJAX');
                }
            }
        };

        xhr.open('GET', 'js/obter_empresa.php?cd_empresa=' + codigoEmpresa);
        xhr.send();
    });
}

// Faz a requisição AJAX para obter os números do banco de dados
function carregarMensagens() {
        var mensagens = chats;
        chat.innerHTML = '';
        for (var i = 0; i < mensagens.length; i++) {
            var mensagem = mensagens[i];
            var classe = (mensagem.tp_destinatario === '1') ? 'recebido' : 'enviado';
            chat.innerHTML += '<div class="' + classe + '"><p>' + mensagem.ds_mensagem + '</p></div>';
        }
      
}

function rolarFinal(){
    var divChat = $('.chat');
    // Rola a div para o final
    divChat.scrollTop(divChat[0].scrollHeight);
}

carregarMensagens();

setInterval(function() {
    pegarCod()
    codigoEmpresa = fotoMeio.getAttribute("empresa"); // Obtenha o código da empresa da foto clicada
    console.log(codigoEmpresa);
    // Faça uma requisição AJAX para obter as informações da foto e nome da empresa correspondente ao código da empresa
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Sucesso na requisição
                var empresa = JSON.parse(xhr.responseText);

                // Atualize a foto e o nome no meio da página com as informações da empresa
                fotoMeio.src = empresa.foto;
                nomeMeio.innerText = empresa.nome;
                codigoEmpresa = empresa.codigo;
                chats = empresa.chats;
                cd_chat = empresa.cd_chat;
                fotoMeio.setAttribute("value", cd_chat);
                fotoMeio.setAttribute("empresa", codigoEmpresa);
                pegarCod();
            } else {
                // Erro na requisição
                console.error('Erro na requisição AJAX');
            }
        }
    };

    xhr.open('GET', 'js/obter_empresa.php?cd_empresa=' + codigoEmpresa);
    xhr.send();
    carregarMensagens();
  }, 500);


//ENVIAR MENSAGEM
function enviar(){
        var mensagem = inputMensagem.value;
      if (inputMensagem.value === ''){

      }else {
        // Realizar a requisição AJAX para enviar a mensagem
        $.ajax({
          url: 'js/enviar_mensagem.php',
          method: 'POST',
          dataType: 'json',
          data: {
            mensagem: mensagem,
            tpRemetente: 1,
            tpDestinatario: 2,
            cdChat: cd_chat
          },
          success: function(response) {
            if (response.status === 'success') {
              // A mensagem foi enviada com sucesso, faça o que for necessário
              console.log('Mensagem enviada:', mensagem);

              codigoEmpresa = fotoMeio.getAttribute("empresa"); // Obtenha o código da empresa da foto clicada
            console.log(codigoEmpresa);
            // Faça uma requisição AJAX para obter as informações da foto e nome da empresa correspondente ao código da empresa
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Sucesso na requisição
                        var empresa = JSON.parse(xhr.responseText);
    
                        // Atualize a foto e o nome no meio da página com as informações da empresa
                        fotoMeio.src = empresa.foto;
                        nomeMeio.innerText = empresa.nome;
                        codigoEmpresa = empresa.codigo;
                        chats = empresa.chats;
                        cd_chat = empresa.cd_chat;
                        fotoMeio.setAttribute("value", cd_chat);
                        fotoMeio.setAttribute("empresa", codigoEmpresa);
                        pegarCod();
                    } else {
                        // Erro na requisição
                        console.error('Erro na requisição AJAX');
                    }
                }
            };
    
            xhr.open('GET', 'js/obter_empresa.php?cd_empresa=' + codigoEmpresa);
            xhr.send();

              carregarMensagens();
              rolarFinal();
              
           
            } else {
              console.log('Erro ao enviar a mensagem:', response.message);
            }
          },
          error: function(xhr, status, error) {
            console.log('Erro na requisição AJAX:', error);
          }
        });
      
        // Limpar o campo de entrada após o envio
        inputMensagem.value = '';

        
            
    }       
}

inputMensagem.addEventListener('keydown', function(event) {
    if (event.key === "Enter") {
      enviar();
    }
  });




