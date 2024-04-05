// Simulando um banco de dados de pacientes
let pacientes = [];

// Usuários autorizados
const usuarios = [
  { username: 'admin', password: '1234', role: 'funcionario' },
  { username: 'guest', password: 'guest', role: 'visitante' }
];

// Função para realizar login
function fazerLogin(event) {
  event.preventDefault();
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;
  const usuario = usuarios.find(user => user.username === username && user.password === password);
  if (usuario) {
    localStorage.setItem('usuario', JSON.stringify(usuario));
    exibirConteudo(usuario.role);
  } else {
    alert('Usuário ou senha incorretos');
  }
}

// Função para verificar o status de login
function verificarLogin() {
  const usuario = JSON.parse(localStorage.getItem('usuario'));
  if (usuario) {
    exibirConteudo(usuario.role);
  } else {
    exibirConteudo('visitante');
  }
}

// Função para exibir conteúdo com base no papel do usuário
function exibirConteudo(role) {
  document.getElementById('login').classList.add('hidden');
  document.getElementById('cadastro').classList.add('hidden');
  document.getElementById('consultas').classList.add('hidden');
  document.getElementById('logout').classList.add('hidden');
  if (role === 'funcionario') {
    document.getElementById('cadastro').classList.remove('hidden');
    document.getElementById('consultas').classList.remove('hidden');
    document.getElementById('logout').classList.remove('hidden');
  }
}

// Função para fazer logout
function fazerLogout() {
  localStorage.removeItem('usuario');
  window.location.reload();
}

// Event listeners
document.getElementById('loginForm').addEventListener('submit', fazerLogin);
document.getElementById('logout').addEventListener('click', fazerLogout);

// Verificar status de login ao carregar a página
window.addEventListener('load', verificarLogin);
