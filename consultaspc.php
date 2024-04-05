<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Médico</title>
    <link rel="stylesheet" href="consultapc.css">
</head>
<body>
    <div class="container">
        <h2>Cadastro de Novo Médico</h2>
        <form action="cadastro_medico.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="especialidade">Especialidade:</label>
            <input type="text" id="especialidade" name="especialidade" required><br><br>

            <input type="submit" value="Cadastrar Médico">
        </form>
    </div>
</body>
</html>
<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "clinica");

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $especialidade = $_POST['especialidade'];

    // Query SQL para inserir os dados do médico na tabela medico
    $sql = "INSERT INTO medico (nome, especialidade) VALUES ('$nome', '$especialidade')";

    // Executa a consulta
    if ($conn->query($sql) === TRUE) {
        echo "Médico cadastrado com sucesso.";
    } else {
        echo "Erro ao cadastrar médico: " . $conn->error;
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
