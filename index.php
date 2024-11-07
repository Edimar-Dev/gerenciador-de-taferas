<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    
<h1>Gerenciador de Tarefas</h1>
    
    <form>
        <fieldset>
            <legend>Nova tarefa</legend>
            <label>
                Tarefa:
                <input type="text" name="nome">
            </label>
            <input type="submit" value="Cadastrar">
        </fieldset>
    </form>

    <?php
        if (isset($_GET['nome'])) {
            $_SESSION['lista_de_tarefas'][] = $_GET['nome'];
    }
        $lista_de_tarefas = array();

        if (isset($_SESSION['lista_de_tarefas'])) {
            $lista_de_tarefas = $_SESSION['lista_de_tarefas'];
    }
    ?>
    
    <table>
        <tr>
            <th>Tarefas</th>
        </tr>
        <?php foreach($lista_de_tarefas as $tarefa) : ?>
            <tr>
                <td><?php echo $tarefa; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>