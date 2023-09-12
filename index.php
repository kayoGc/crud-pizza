<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaria seu zé</title>
    <style>
        * {
            font-size: 25px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: start;
        }
    </style>
</head>

<body>
    <form action="php_action/inserirDados.php" method="post">
        <!-- pega o nome da pizza -->
        <label for="txtSaborPizza">Sabor da pizza: </label>
        <input type="text" placeholder="Nome da pizza" name="txtSaborPizza" id="txtSaborPizza">

        <!-- pega o tipo da pizza -->
        <label for="slcTipoPizza">Tipo da pizza: </label>
        <select name="slcTipoPizza" id="slcTipoPizza">
            <option value="Salgada">Salgada</option>
            <option value="Doce">Doce</option>
            <option value="Mista">Mista</option>
        </select>

        <!-- pega o preço da pizza -->
        <label for="numPrecoPizza">Preço da pizza: </label>
        <input type="number" step=".10" placeholder="Preço da pizza" name="numPrecoPizza" id="numPrecoPizza">

        <!-- envia valores -->
        <input type="submit" value="Criar pizza" name="btnCriarPizza" id="btnCriarPizza">
    </form>
</body>

</html>