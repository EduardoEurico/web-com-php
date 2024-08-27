<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
</head>
<body>

    <div class="card-hora">
    <?php
    $data = date('d/m/y');
    echo $data;
    ?>
    <div id="hora-atual"></div>
<script>
   

    function atualizarHora() {
        var data = new Date();
        var hora = data.getHours();
        var minutos = data.getMinutes();
        var segundos = data.getSeconds();

        hora = hora < 10 ? "0" + hora : hora;
        minutos = minutos < 10 ? "0" + minutos : minutos;
        segundos = segundos < 10 ? "0" + segundos : segundos;

        var horaAtual = hora + ":" + minutos + ":" + segundos;
        document.getElementById("hora-atual").innerHTML = horaAtual;

        setTimeout(atualizarHora, 1000); // Atualiza a cada segundo
    }

    atualizarHora();

    function registrarBatida() {
        var nome = "<?php echo htmlspecialchars($_POST['name']); ?>";
        var cpf = "<?php echo (int)$_POST['cpf']; ?>";
        var horaAtual = document.getElementById("hora-atual").innerHTML;
        var timezone = document.getElementById("timezone").value;

        var data = new Date();
        var hora = data.toLocaleTimeString('pt-BR', { timeZone: timezone });

        alert("Nome: " + nome + "\nCPF: " + cpf + "\nHorário: " + hora + "\nTimezone: " + timezone);
    }
        

        
</script>

</div>

Ola <?php echo htmlspecialchars($_POST['name']); ?>
    e seu cpf é <?php echo (int)$_POST['cpf']; ?>.

    <select id="timezone">
        <option value="America/Sao_Paulo">America/Sao_Paulo</option>
        <option value="America/New_York">America/New_York</option>
        <option value="Europe/London">Europe/London</option>
        <option value="Europe/Moscow">Russia/Moscou</option>

    </select>
    
    <input type="submit" value="Registrar Batida de Ponto" onclick="registrarBatida()">

</body>
</html>
<style>
    body {
       
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
    
   
</style>