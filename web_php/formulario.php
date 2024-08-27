<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function validarFormulario() {
            var nome = document.getElementById('name').value;
            var idade = document.getElementById('age').value;
            var cpf = document.getElementById('cpf').value;

            if (nome == "" || idade == "" || cpf == "") {
                alert("Por favor, preencha todos os campos.");
                return false;
            }
        }
    </script>
</head>

<body>
<h1 class="titulo" >Formulário WEB</h1>
<div class="card">
    <form action="envio.php" method="post" onsubmit="return validarFormulario();">
        <label for="name">Nome:</label>
        <input name="name" id="name" type="text">

        

        <label for="cpf">CPF:</label>
        <input name="cpf" id="cpf" type="number">

        
        <input type="submit" value="Enviar">
        
    </form>
</div>









</body>
</html>
<style>
    body {
        background-image: url("cafejpg.jpg");
        background-size: cover;
        font-family: Arial, sans-serif;
        align-items: center;
        color: black; /* Change the color of the text to white */
        padding: 0;
    }
    
    .titulo {
        text-align: center;
        color: white;
    }
    
    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 15%;
        padding: 10px;
        margin: auto;
        background-color: #f8f8f8;
        height: 175px;
        border-radius: 15px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    

    
    

    form {
        display: flex;
        flex-direction: column;
        height: 100vh;
    }

    input {
        margin-bottom: 10px;
    }

    button[type="submit"] {
        margin: 0 auto;
    }

    

    body {
        animation: changeColor 5s infinite;
    }
</style>