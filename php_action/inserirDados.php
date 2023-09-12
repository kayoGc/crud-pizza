<?php 
    // $_POST['txtSaborPizza'] - sabor
    // $_POST['slcTipoPizza'] - tipo
    // $_POST['numPrecoPizza'] - preço

    require_once dirname(__FILE__, 2) . "/includes/DbOperacao.php";

    if (isset($_POST['btnCriarPizza'])) {
        $pizza = new DbOperacao;
        if ($pizza->criarPizza($_POST['txtSaborPizza'], $_POST['slcTipoPizza'], $_POST['numPrecoPizza'])) {
            echo "sucesso";
        }  else {
            echo "FRACASSO";
        }
    }
?>