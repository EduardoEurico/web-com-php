<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


Ola <?php echo htmlspecialchars($_POST['name']); ?>
    voce tem <?php echo (int)$_POST['age']; ?> anos.
    e seu cpf é <?php echo (int)$_POST['cpf']; ?>.
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
    
   
</style>