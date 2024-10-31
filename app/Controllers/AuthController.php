<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Exibe o formulário de registro
    public function register()
    {
        return view('auth/register');
    }

    // Processa o registro de um novo usuário
    public function storeUser()
    {
        $validation = \Config\Services::validation();

        // Regras de validação
        $validation->setRules([
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ]);

        // Validar os dados
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Dados do usuário
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'user', // Definindo o role padrão como 'user'
        ];

        // Salvar no banco de dados
        $this->userModel->insert($data);

        return redirect()->to('/login')->with('success', 'Cadastro realizado com sucesso!');
    }



    // Exibe o formulário de login
    public function login()
    {
        return view('auth/login');
    }

    // Processa o login do usuário
    public function authenticate()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Buscar o usuário pelo e-mail
        $user = $this->userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password_hash'])) {
            // Definir sessão do usuário com o role
            session()->set([
                'isLoggedIn' => true,
                'userId' => $user['id'],
                'username' => $user['username']
            ]);

            return redirect()->to('/produtos');
        } else {
            return redirect()->back()->with('error', 'Credenciais inválidas. Verifique e tente novamente.');
        }
    }


    // Desloga o usuário
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Você saiu da sua conta.');
    }

    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    public function sendResetLink()
    {

        $email = $this->request->getPost('email');

        $user = $this->userModel->where('email', $email)->first();

        if ($user) {

            $token = bin2hex(random_bytes(50));
            $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

            $this->userModel->update($user['id'], [
                'reset_token' => $token,
                'reset_token_expires' => $expires
            ]);

            // Enviar o e-mail de redefinição (aqui apenas um exemplo simples)
            
            $resetLink = base_url("reset-password/$token");

            return redirect()->to('/login')->with('success', 'Link de redefinição enviado ao seu e-mail.');
        }

        return redirect()->back()->with('error', 'E-mail não encontrado.');
    }

    public function resetPassword($token)
    {
        $user = $this->userModel->where('reset_token', $token)
            ->where('reset_token_expires >=', date('Y-m-d H:i:s'))
            ->first();

        if ($user) {
            return view('auth/reset_password', ['token' => $token]);
        }

        return redirect()->to('/login')->with('error', 'Token inválido ou expirado.');
    }

    public function updatePassword($token) {}
}
