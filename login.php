<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
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

.login-section {
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
  <h1>Login</h1>
  </header>
  <main>
    <section class="login-section">
      <h2>Fazer Login</h2>
      <form action="login.php" method="post">
        <label for="username">Nome de Usuário:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit" name="login">Entrar</button>
      </form>
      <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
    </section>
  </main>
  <footer>
    <p>&copy; 2024 Clínica Médica</p>
  </footer>
</body>
</html>


<?php
include("config.php");
// Verifica se o formulário de login foi submetido
if(isset($_POST['login'])) {
    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "", "clinica");

    // Recebe os dados do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta SQL para verificar as credenciais de login
    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";

    // Executa a consulta
    $result = $conn->query($sql);

    // Verifica se as credenciais estão corretas
    if ($result->num_rows > 0) {
        // Obtém os dados do usuário
        $row = $result->fetch_assoc();
        
        // Verifica se o usuário é um médico
        if ($row['tipo'] === 'medico') {
            // Redireciona para a página com opções de paciente e consultas
            header("Location: homeadmin.html");
            exit();
        } else {
            // Redireciona para a página inicial do sistema (ou outra página de acordo com o tipo de usuário)
            header("Location: homepc.html");
            exit();
        }
    } else {
        // Exibe uma mensagem de erro se as credenciais estiverem incorretas
        echo "Credenciais inválidas.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "clinica");

// Verifica se a conexão foi estabelecida corretamente
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Verifica se o formulário de login foi submetido
if(isset($_POST['login'])) {
    // Recebe os dados do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta SQL para verificar as credenciais de login
    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";

    // Executa a consulta
    $result = $conn->query($sql);

    // Verifica se houve erro na consulta
    if (!$result) {
        die("Erro na consulta: " . $conn->error);
    }

    // Verifica se as credenciais estão corretas
    if ($result->num_rows > 0) {
        // Obtém os dados do usuário
        $row = $result->fetch_assoc();
        
        // Verifica se o usuário é um médico
        if ($row['tipo'] === 'medico') {
            // Redireciona para a página com opções de paciente e consultas
            header("Location: homeadmin.html");
            exit();
        } else {
            // Redireciona para a página inicial do sistema (ou outra página de acordo com o tipo de usuário)
            header("Location: homepc.html");
            exit();
        }
    } else {
        // Exibe uma mensagem de erro se as credenciais estiverem incorretas
        echo "Credenciais inválidas.";
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
