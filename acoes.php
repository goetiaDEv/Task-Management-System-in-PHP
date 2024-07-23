<?php
include 'index.php';

if (isset($_POST['nome']) && isset($_POST['descricao'])) {
    adicionarTarefa($_POST['nome'], $_POST['descricao']);
    header('Location: index.php');
    exit;
}

if (isset($_GET['acao']) && $_GET['acao'] == 'editar') {
    // Código para editar uma tarefa
}

if (isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
    excluirTarefa($_GET['id']);
    header('Location: index.php');
    exit;
}
