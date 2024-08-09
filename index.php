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

<?php

require_once 'TarefasController.php';

// Criar instância do TarefaDAO e do TarefasController
$tarefaDAO = new TarefaDAOImpl($conexao);
$tarefasController = new TarefasController($tarefaDAO);

// Definir rotas para as ações da API
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($_GET['acao'] === 'buscarTodasTarefas') {
        $tarefasController->buscarTodasTarefas();
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['acao'] === 'salvarTarefa') {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];

        
// app/Models/Evento.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['titulo', 'descricao', 'data_inicio', 'data_fim'];
}

    // routes/api.php
<?php

use App\Http\Controllers\EventoController;
use Illuminate\Http\Request;

Route::get('/eventos', [EventoController::class, 'index']);
Route::post('/eventos', [EventoController::class, 'store']);
Route::get('/eventos/{id}', [EventoController::class, 'show']);
Route::put('/eventos/{id}', [EventoController::class, 'update']);
Route::delete('/eventos/{id}', [EventoController::class, 'destroy']);

    // app/Http/Controllers/EventoController.php
<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        return Evento::all();
    }

    public function store(Request $request)
    {
        $evento = Evento::create($request->all());
        return response()->json($evento, 201);
    }

    public function show(Evento $evento)
    {
        return $evento;
    }

    public function update(Request $request, Evento $evento)
    {
        $evento->update($request->all());
        return response()->json($evento, 200);
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();
        return response()->json(null, 204);
    }
}
