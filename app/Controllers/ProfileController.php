<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class ProfileController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $userId = session()->get('userId');
        $user = $this->userModel->find($userId); // Usando o método para ocultar campos sensíveis
        return view('profile/index', ['user' => $user]);
    }

    // Atualiza informações do perfil (nome e email, por exemplo)
    public function updateProfile()
    {
       
    }

    // Atualiza a senha
    public function updatePassword()
    {
       
    }

    public function uploadPicture()
    {
       
    }
}

