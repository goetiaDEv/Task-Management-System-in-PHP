<?php

require_once 'TarefaDAO.php';

class TarefasController {

    private $tarefaDAO;

    public function __construct(TarefaDAO $tarefaDAO) {
        $this->tarefaDAO = $tarefaDAO;
    }

    public function buscarTodasTarefas() {
        $tarefas = $this->tarefaDAO->buscarTodasTarefas();
        echo json_encode($tarefas);
    }

    public function salvarTarefa($nome, $descricao) {
        $tarefa = new Tarefa();
        $tarefa->setNome($nome);
        $tarefa->setDescricao($descricao);

        $this->tarefaDAO->salvarTarefa($tarefa);
        echo json_encode(['mensagem' => 'Tarefa salva com sucesso']);
    }

    // Implementar métodos para editar e excluir tarefas
}
