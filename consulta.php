<?php
include 'config.php';

// Verifica se o formulário foi enviado
if(isset($_POST['cadastrar'])) {
    // Recebe os dados do formulário
    $paciente = $_POST['paciente'];
    $medico = $_POST['medico'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];

    // Insere os dados na tabela de consultas
    $sql = "INSERT INTO consultas (paciente, medico, data, hora) VALUES ('$paciente', '$medico', '$data', '$hora')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Consulta cadastrada com sucesso');</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar consulta');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Consulta</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>Cadastro de Consulta</h1>
  </header>
  <main>
    <section class="cadastro-consulta-section">
      <h2>Cadastrar Nova Consulta</h2>
      <form action="cadastro_consulta.php" method="post">
        <label for="paciente">Paciente:</label>
        <input type="text" id="paciente" name="paciente" required>
        <label for="medico">Médico:</label>
        <input type="text" id="medico" name="medico" required>
        <label for="data">Data:</label>
        <input type="date" id="data" name="data" required>
        <label for="hora">Hora:</label>
        <input type="time" id="hora" name="hora" required>
        <button type="submit" name="cadastrar">Cadastrar</button>
      </form>
    </section>
  </main>
  <footer>
    <p>&copy; 2024 Clínica Médica</p>
  </footer>
</body>
</html>
