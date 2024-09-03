<?php
        date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="card-hora">
    <span id="clock"><?php echo date("H:i:s"); ?></span>
    <script>
        setInterval(function() {
            var clock = document.getElementById("clock");
            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();
            clock.innerHTML = hours + ":" + minutes + ":" + seconds;
        }, 1000);
    </script>
    </div>
    <div class="card-info">
    <form action="main.php" method="post">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="cpf" placeholder="CPF:">

        <input type="submit" name="submit" value="submit">
    </form>
    <alert>
        <?php

        if (isset($_POST['submit'])) {
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];

            // Tratamento de dados de CPF
            $cpf = preg_replace('/[^0-9]/', '', $cpf); 
            $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

            // Tratamento de dados de nome
            $nome = trim($nome); 
            $nome = ucwords(strtolower($nome)); 

            // Verifica se o nome contém números
            if (preg_match('/\d/', $nome)) {
                echo "O nome não pode conter números. Por favor, insira um nome válido.";
                return; // Interrompe o processo de batida de ponto
            }

            // Verifica se o CPF contém letras
            if (preg_match('/[a-zA-Z]/', $cpf)) {
                echo "O CPF não pode conter letras. Por favor, insira um CPF válido.";
                return; // Interrompe o processo de batida de ponto
            }

            echo "Olá $nome, segue abaixo seus dados após a batida do ponto.<br><br>" . "Nome: $nome <br> CPF: $cpf  <br> Horário: " . date("H:i:s");

            $data = [
                ['Nome', 'CPF', 'Horário'],
                [$nome, $cpf, date("H:i:s")],
            ];

            function createCSV($filename, $data)
            {
                if (file_exists($filename)) {
                    $file = fopen($filename, 'a');
                } else {
                    $file = fopen($filename, 'w');
                    fputcsv($file, $data[0]); // Escreve o cabeçalho apenas na primeira vez
                }

                fputcsv($file, $data[1]);

                fclose($file);
            }

            createCSV('listaPonto.csv', $data);
        }
        ?>
        <dialog id="meuDialogo">
            Bem vindo ao sistema de ponto eletrônico!
            Porfavor insira seu nome e CPF validos, para registrar a batida do ponto.
            <button id="botaoFechar">Fechar</button>
            </dialog>

            <script>
            var dialogo = document.getElementById('meuDialogo');
            var botaoFechar = document.getElementById('botaoFechar');

            // Para abrir a caixa de diálogo
            dialogo.showModal();

            // Para fechar a caixa de diálogo
            botaoFechar.onclick = function() {
                dialogo.close();
            };
            </script>
    </alert>
    </div>
    
</body>
</html>

<style>
     body {
        background-image: url("cafejpg.jpg");
        background-size: cover;
       font-family: Arial, sans-serif;
       align-items: center;
       text-align: center;
       color: black; /* Change the color of the text to white */
       padding: 0;
      
   }
        .card-hora {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 20%;
        padding: 10px;
        margin: auto;

        background-color: #f8f8f8;
        height: 200px;
        border-radius: 150px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: monospace;
        font-size: 24px;
        color: #333;
    }
    .card-hora::before {
        content: "";
        display: block;
        width: 100%;
        height: 2px;
        background-color: #333;
        margin-bottom: 10px;
    }

        .card-info {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            
            max-width: 400px; /* Defina um valor adequado para limitar a largura */
            margin: 0 auto; /* Centralize o elemento horizontalmente */
        }
    </style>