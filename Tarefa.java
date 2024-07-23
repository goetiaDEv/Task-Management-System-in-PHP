public class Tarefa {

    private int id;
    private String nome;
    private String descricao;
    private Date dataCriacao;
    private Date dataConclusao;

    // Getters e setters
}
public interface TarefaDAO {

    List<Tarefa> buscarTodasTarefas();
    void salvarTarefa(Tarefa tarefa);
    void editarTarefa(Tarefa tarefa);
    void excluirTarefa(int id);
}
public class TarefaDAOImpl implements TarefaDAO {

    private Connection conexao;

    public TarefaDAOImpl(Connection conexao) {
        this.conexao = conexao;
    }

    @Override
    public List<Tarefa> buscarTodasTarefas() {
        // Implementar a lógica para buscar todas as tarefas do banco de dados
    }

    @Override
    public void salvarTarefa(Tarefa tarefa) {
        // Implementar a lógica para salvar uma nova tarefa no banco de dados
    }

    @Override
    public void editarTarefa(Tarefa tarefa) {
        // Implementar a lógica para editar uma tarefa existente no banco de dados
    }

    @Override
    public void excluirTarefa(int id) {
        // Implementar a lógica para excluir uma tarefa do banco de dados
    }
}
