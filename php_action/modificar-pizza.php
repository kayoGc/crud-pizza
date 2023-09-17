<?php

require_once dirname(__FILE__, 2) . '/includes/DbOperacao.php';

$modificar = new DbOperacao;
if (isset($_POST['btnModificar'])) {
    $pizza = $modificar->getPizza($_POST['btnModificar']);
?>

    <form method="post">
        <!-- pega o nome da pizza -->
        <label for="txtSaborPizza">Sabor da pizza: </label>
        <input type="text" placeholder="Nome da pizza" name="txtSaborPizza" id="txtSaborPizza" value="<?php echo htmlentities($pizza['sabor']) ?>">

        <!-- pega o tipo da pizza -->
        <label for="slcTipoPizza">Tipo da pizza: </label>
        <select name="slcTipoPizza" id="slcTipoPizza">
            <!-- php usado para selecionar o valor padrão -->
            <option value="Salgada" <?php
                                    if ("Salgada" == $pizza['tipo']) echo 'selected'
                                    ?>>Salgada</option>
            <option value="Doce" <?php
                                    if ("Doce" == $pizza['tipo']) echo 'selected'
                                    ?>>Doce</option>
            <option value="Mista" <?php
                                    if ("Mista" == $pizza['tipo']) echo 'selected'
                                    ?>>Mista</option>
        </select>

        <!-- pega o preço da pizza -->
        <label for="numPrecoPizza">Preço da pizza: </label>
        <input type="number" step=".10" placeholder="Preço da pizza" name="numPrecoPizza" id="numPrecoPizza" value="<?php echo htmlspecialchars($pizza['preco']) ?>">

        <!-- envia valores -->
        <button type="submit" value="<?php echo $_POST['btnModificar'] ?>" name="btnModificarPizza" id="btnModificarPizza">Modificar</button>
    </form>

    <a href="../index.php">cancelar</a>

<?php
}
if (isset($_POST['btnModificarPizza'])) {
    $modificar->modifyPizza($_POST['txtSaborPizza'], $_POST['slcTipoPizza'], $_POST['numPrecoPizza'], $_POST['btnModificarPizza']);
    header('Location: ../index.php');
}

?>