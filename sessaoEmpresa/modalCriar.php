<?php
    session_start();

    if (isset($_SESSION['displayModalCriar']) && $_SESSION['displayModalCriar']) {
        echo '<div id="myModal" class="modal" style="display: block;">';
        echo '<div class="modal-content">';
        echo '<svg width="215" height="215" viewBox="0 0 215 215" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="107.5" cy="107.5" r="107.5" fill="#F5468A" class="svg-elem-1"></circle>
        <path d="M136.8 79.6586L136.815 79.6436L136.83 79.6282L145.249 70.8434L162.849 88.077L154.034 96.8922L104.235 146.691L95.4349 155.491L87.0309 146.722L87.0162 146.706L87.0012 146.691L65.6586 125.349L56.8284 116.519L74.062 99.2851L82.8922 108.115L82.9055 108.129L82.9191 108.142L94.4441 119.24L95.8578 120.601L97.2456 119.213L136.8 79.6586Z" fill="white" stroke="#F5468A" stroke-width="4" class="svg-elem-2"></path>
        </svg>';
        echo '<h1>Serviço criado com sucesso!</h1>';
        echo '</div>';
        echo '</div>';
        
        unset($_SESSION['displayModal']);
        
        echo '<script>
                setTimeout(function() {
                    window.location.href = "perfilEmpresa.php";
                }, 4000); // Redireciona após 5 segundos (5000 milissegundos)
              </script>';
    } else {
        header('Location: perfilEmpresa.php');
    }
    ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div id="myModal" class="modal">
      <div class="modal-content">
        <!-- <span class="close">&times;</span> -->
        <svg width="215" height="215" viewBox="0 0 215 215" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="107.5" cy="107.5" r="107.5" fill="#F5468A" class="svg-elem-1"></circle>
          <path d="M136.8 79.6586L136.815 79.6436L136.83 79.6282L145.249 70.8434L162.849 88.077L154.034 96.8922L104.235 146.691L95.4349 155.491L87.0309 146.722L87.0162 146.706L87.0012 146.691L65.6586 125.349L56.8284 116.519L74.062 99.2851L82.8922 108.115L82.9055 108.129L82.9191 108.142L94.4441 119.24L95.8578 120.601L97.2456 119.213L136.8 79.6586Z" fill="white" stroke="#F5468A" stroke-width="4" class="svg-elem-2"></path>
        </svg>

        <h1>Serviço alterado com sucesso!</h1>
      </div>
    </div>
</body>
</html>



<style>

        @font-face {
            font-family: 'League Spartan';
            src: url('/font/LeagueSpartan.ttf');
        }
        .modal {
          display: none; /* Oculta o modal por padrão */
          position: fixed; /* Permanece posicionado no topo da página */
          z-index: 1; /* Define a ordem de empilhamento */
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto; /* Adiciona rolagem quando o conteúdo excede a altura da janela */
          background-color: rgba(0, 0, 0, 0.5); /* Define um fundo escuro com transparência */
        }

        .modal-content h1{
            font-family: 'League Spartan'
        }
        
        .modal-content {
          background-color: #fff;
          margin: 15% auto; /* Centraliza o modal verticalmente */
          padding: 20px;
          border: 1px solid #888;
          width: 80%;
          max-width: 600px;
          height: 80%;
          max-height: 400px;
          border-radius: 30px;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
        }

        .modal-content h2{
            font-size: 2em;
            font-weight: 600;
            width: 50%;
        }
        
        /* .close {
          color: #aaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
          cursor: pointer;
        } */
        
        /* .close:hover,
        .close:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
        } */
        
        svg .svg-elem-1 {
          stroke-dashoffset: 677.4424205218055px;
          stroke-dasharray: 677.4424205218055px;
          fill: transparent;
          animation: strokeDash1 1s cubic-bezier(0.47, 0, 0.745, 0.715) forwards, fill1 0.7s cubic-bezier(0.47, 0, 0.745, 0.715) 0.8s forwards;
        }
        
        svg.active .svg-elem-1 {
          stroke-dashoffset: 0;
          fill: #FF9061;
        }
        
        svg .svg-elem-2 {
          stroke-dashoffset: 301.8009033203125px;
          stroke-dasharray: 301.8009033203125px;
          fill: transparent;
          animation: strokeDash2 1s cubic-bezier(0.47, 0, 0.745, 0.715) 0.12s forwards, fill2 0.7s cubic-bezier(0.47, 0, 0.745, 0.715) 0.9s forwards;
        }
        
        svg.active .svg-elem-2 {
          stroke-dashoffset: 0;
          fill: rgb(255, 255, 255);
        }
        
        @keyframes strokeDash1 {
          to {
            stroke-dashoffset: 0;
          }
        }
        
        @keyframes fill1 {
          to {
            fill: #FF9061;
          }
        }
        
        @keyframes strokeDash2 {
          to {
            stroke-dashoffset: 0;
          }
        }
        
        @keyframes fill2 {
          to {
            fill: rgb(255, 255, 255);
          }
        }
    </style>

