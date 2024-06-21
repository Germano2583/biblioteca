<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Session\Session;

class Login extends Controller
{
    public function __construct(){
    $this->session = \Config\Services::session();
    }
    
    public function index()
    {
        echo view('_partials/header');
        echo view('_partials/navbarlogin');
        echo view('_partials/footer');
        // Verificar se o usuário já está logado
        if ($this->session->has('logged_in')) {
            return redirect()->to(base_url('Home/index'));
        }

        // Carregar a view de login
        return view('loguin/index.php');
    }

    public function authenticate()
    {
        // Obter os dados do formulário
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        // Verificar se os dados estão vazios
        if (empty($email) || empty($senha)) {
            return redirect()->back()->withInput()->with('error', 'Preencha todos os campos!');
        }

        // Conectar ao banco de dados
        $db = \Config\Database::connect();

        // Selecionar o usuário com o email e senha informados
        $query = $db->table('usuario')->where('email', $email)->where('senha', $senha)->get();

        // Verificar se o usuário existe
        if ($query->getNumRows() > 0) {
            // Criar sessão
            $this->session->set('logged_in', true);
            $this->session->set('email', $email);

            // Redirecionar para a página de dashboard
            return redirect()->to(base_url('Home/index'));
        } else {
            // Mostrar mensagem de erro
            return redirect()->back()->withInput()->with('error', 'Email ou senha incorretos!');
        }
    }

    public function logout()
    {
        // Destruir sessão
        $this->session->destroy();

        // Redirecionar para a página de login
        return redirect()->to(base_url('login'));
    }
}