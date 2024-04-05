
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
   
  <style>
    /* Reset de estilos */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  /* Estilos gerais */
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
  }
  
  header {
    background-color: #007bff;
    color: #fff;
    text-align: center;
    padding: 1rem 0;
  }
  
  main {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
  }
  
  .register-section {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    margin: 0 auto;
  }
  
  h2 {
    margin-bottom: 20px;
  }
  
  label {
    margin-bottom: 5px;
    display: block;
  }
  
  input[type="text"],
  input[type="email"],
  input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
  }
  
  button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    width: 100%;
  }
  
  button:hover {
    background-color: #0056b3;
  }
  
  p {
    margin-top: 10px;
  }
  
  footer {
    text-align: center;
    margin-top: 20px;
  }
  
  </style>
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

<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "clinica");

// Verifica se o formulário de cadastro foi submetido
if(isset($_POST['cadastrar'])) {
    // Recebe os dados do formulário e realiza a validação (adicione validações adicionais conforme necessário)
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nome = $_POST['nome'];
    $especialidade = $_POST['especialidade'];
    $crm = $_POST['crm'];

    // Prevenção contra Injeção SQL: Use prepared statements
    $stmt = $conn->prepare("INSERT INTO usuarios (username, password, tipo, nome, especialidade, crm) VALUES (?, ?, 'medico', ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $password, $nome, $especialidade, $crm);

    // Executa a consulta preparada
    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso.";
    } else {
        // Tratamento de Erros: Exibe uma mensagem de erro em caso de falha
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    // Fecha a consulta e a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}
?>
