<?php
session_start();

// unset($_SESSION['lista_de_tarefas']); //// Descomente esta linha para limpar a lista de tarefas

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['nome'], $_POST['tipo'], $_POST['dias'])
) {
    $tarefa = array(
        'nome' => $_POST['nome'],
        'tipo' => $_POST['tipo'],
        'dias' => $_POST['dias'],
    );

    if (!isset($_SESSION['lista_de_tarefas']) || !is_array($_SESSION['lista_de_tarefas'])) {
        $_SESSION['lista_de_tarefas'] = array();
    }

    $_SESSION['lista_de_tarefas'][] = $tarefa;

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$lista_de_tarefas = isset($_SESSION['lista_de_tarefas']) ? $_SESSION['lista_de_tarefas'] : [];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>

<h1>Gerenciador de Tarefas</h1>

<form method="post">
    <fieldset>
        <legend>Nova tarefa</legend>

        <label>
            Tarefa:
            <input type="text" name="nome" required>
        </label>

        <label>
            Tipo:
            <select name="tipo" required>
                <option value="">Selecione</option>
                <option value="Trabalho">Trabalho</option>
                <option value="Estudo">Estudo</option>
                <option value="Pessoal">Pessoal</option>
                <option value="Outro">Outro</option>
            </select>
        </label>

        <label>
            Dias para concluir:
            <input type="number" name="dias" min="1" required>
        </label>

        <input type="submit" value="Cadastrar">
    </fieldset>
</form>

<?php if (!empty($lista_de_tarefas)) : ?>
    <table>
        <tr>
            <th>Tarefa</th>
            <th>Tipo</th>
            <th>Dias para concluir</th>
        </tr>
        <?php foreach($lista_de_tarefas as $tarefa) : ?>
            <tr>
                <td><?php echo htmlspecialchars($tarefa['nome']); ?></td>
                <td><?php echo htmlspecialchars($tarefa['tipo']); ?></td>
                <td><?php echo htmlspecialchars($tarefa['dias']); ?> dia(s)</td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else : ?>
    <p>Nenhuma tarefa cadastrada.</p>
<?php endif; ?>

</body>
</html>