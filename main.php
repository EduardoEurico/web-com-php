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
        <form action="main.php" method="post" onsubmit="return validateForm()">
            <input type="text" name="nome" placeholder="Nome">
            <input type="text" name="cpf" placeholder="CPF:">

            <input type="submit" class="botao-enviar" name="enviar" value="submit">
        </form>
        <div class="alert"></div>
    </div>

    <dialog id="meuDialogo">
        Bem vindo ao sistema de ponto eletrônico!
        Por favor insira seu nome e CPF válidos para registrar a batida do ponto.
        <button id="botaoFechar">Fechar</button>
    </dialog>

    <script>
        var dialogo = document.getElementById('meuDialogo');
        var botaoFechar = document.getElementById('botaoFechar');

        dialogo.showModal();

        botaoFechar.onclick = function() {
            dialogo.close();
        };

        function validateForm() {
            var nomeInput = document.getElementsByName("nome")[0];
            var cpfInput = document.getElementsByName("cpf")[0];
            var alertDiv = document.getElementsByClassName("alert")[0];

            var nome = nomeInput.value.trim();
            var cpf = cpfInput.value.replace(/[^0-9]/g, '');

            if (!/^[a-zA-Z\s]+$/.test(nome)) {
                alertDiv.innerHTML = "Nome inválido. Deve conter apenas letras e espaços.";
                return false;
            }

            if (!/^\d{11}$/.test(cpf)) {
                alertDiv.innerHTML = "CPF inválido. Deve ter exatamente 11 dígitos.";
                return false;
            }

            alertDiv.innerHTML = "";
            return true;
        }
    </script>
    <alert>
    <?php
    date_default_timezone_set('America/Sao_Paulo');

    function createCSV($filename, $data)
    {
        if (file_exists($filename)) {
            $file = fopen($filename, 'a');
        } else {
            $file = fopen($filename, 'w');
            fputcsv($file, $data[0]); 
        }

        fputcsv($file, $data[1]);

        fclose($file);
    }

    function isValidCPF($cpf)
    {
        return preg_match('/^\d{11}$/', $cpf);
    }

    function isValidName($name)
    {
        return preg_match('/^[a-zA-Z\s]+$/', $name);
    }

    if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];

        $cpf = preg_replace('/[^0-9]/', '', $cpf); 
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        $nome = trim($nome); 
        $nome = ucwords(strtolower($nome)); 

        if (!isValidCPF($cpf)) {
            echo '<div class="alert">CPF inválido. Deve ter exatamente 11 dígitos.</div>';
        } elseif (!isValidName($nome)) {
            echo '<div class="alert">Nome inválido. Deve conter apenas letras e espaços.</div>';
        } else {
            echo '<div class="alert">Olá ' . $nome . ', segue abaixo seus dados após a batida do ponto.<br><br>Nome: ' . $nome . '<br>CPF: ' . $cpf . '<br>Horário: ' . date("H:i:s") . '</div>';

            $data = [
                ['Nome', 'CPF', 'Horário'],
                [$nome, $cpf, date("H:i:s")],
            ];

            createCSV('listaPonto.csv', $data);
        }
    }
    ?>
    </alert>
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
            height: 100px; /* Defina um valor adequado para limitar a altura */
            max-width: 400px; /* Defina um valor adequado para limitar a largura */
            margin: 0 auto; /* Centralize o elemento horizontalmente */
        }
        
        .alert {
            background-color: #f8f8f8;
            padding: 10px;
            margin-bottom: 10px;
            max-width: 400px; /* Defina um valor adequado para limitar a largura */
            margin: 0 auto; /* Centralize o elemento horizontalmente */
            border: 1px solid #333;
            color: black;
        }
    .botao-enviar{
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 12px;
        top: 20px;
    }
    </style>