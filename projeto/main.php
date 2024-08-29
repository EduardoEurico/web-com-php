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
        date_default_timezone_set('America/Sao_Paulo');

            if(isset($_POST['submit'])){
                $nome = $_POST['nome'];
                $cpf = $_POST['cpf'];
                echo "Olá $nome segue abaixo seus dados apos a batida do ponto.<br><br>"."Nome: $nome <br> CPF: $cpf  <br> Horario: " . date("H:i:s");

                function createCSV($filename, $data) {
                    $file = fopen($filename, 'w');

                    foreach ($data as $row) {
                        fputcsv($file, $row);
                    }

                    fclose($file);
                }

                $data = [
                    ['Nome', 'CPF', 'Horario'],
                    [$nome, $cpf, date("H:i:s")],
                
                ];

                createCSV('data.csv', $data);
            }
        ?>
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
        }
    </style>