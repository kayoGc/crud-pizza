<?php

require_once dirname(__FILE__, 2) . '/includes/DbOperacao.php';

$deletar = new DbOperacao;
if(isset($_POST['btnDeletar'])) {
    $deletar->deletePizza($_POST['btnDeletar']);
}

header('Location: ../index.php');