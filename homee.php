<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clínica Médica</title>
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
    
    .button-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }
    
    .button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      margin: 0 10px;
      text-decoration: none;
    }
    
    .button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <header>
    <h1>Clínica Médica</h1>
  </header>
    <div class="button-container">
      <a href="login.php" class="button">Login</a>
      <a href="cadastro.php" class="button">Cadastro</a>
    </div>
</body>
</html>
