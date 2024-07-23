<?php

// Conectar ao banco de dados
$db = new mysqli('localhost', 'usuario', 'senha', 'tarefas');

// Verificar se há conexão com o banco de dados
if ($db->connect_error) {
    die('Erro de conexão com o banco de dados: ' . $db->connect_error);
}

// Função para buscar todas as tarefas
function buscarTarefas() {
    global $db;

    $sql = "SELECT * FROM tarefas";
    $resultado = $db->query($sql);

    $tarefas = array();
    while ($linha = $resultado->fetch_assoc()) {
        $tarefas[] = $linha;
    }

    return $tarefas;
}

// Função para adicionar uma nova tarefa
function adicionarTarefa($nome, $descricao) {
    global $db;

    $sql = "INSERT INTO tarefas (nome, descricao) VALUES (?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss', $nome, $descricao);
    $stmt->execute();

    if ($db->affected_rows > 0) {
        return true;
    } else {
        return false;
    }
}

// Função para editar uma tarefa
function editarTarefa($id, $nome, $descricao) {
    global $db;

    $sql = "UPDATE tarefas SET nome = ?, descricao = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ssi', $nome, $descricao, $id);
    $stmt->execute();

    if ($db->affected_rows > 0) {
        return true;
    } else {
        return false;
    }
}

// Função para excluir uma tarefa
function excluirTarefa($id) {
    global $db;

    $sql = "DELETE FROM tarefas WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    if ($db->affected_rows > 0) {
        return true;
    } else {
        return false;
    }
}

// Buscar todas as tarefas
$tarefas = buscarTarefas();

?>
