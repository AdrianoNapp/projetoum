<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PagesController extends Controller
{
    public function about()
    {
        return view('about', ['title' => 'Sobre Nós']);
    }

    public function contact()
    {
        return view('contact', ['title' => 'Contato']);
    }

    public function submitContact()
    {
        $request = service('request');

        // Validação básica dos campos
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'message' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Obter dados do formulário
        $name = $request->getPost('name');
        $email = $request->getPost('email');
        $message = $request->getPost('message');

        // Configurar o e-mail
        $emailService = \Config\Services::email();
        $emailService->setTo('seuemail@dominio.com');
        $emailService->setFrom($email, $name);
        $emailService->setMessage($message);

        // Enviar o e-mail e verificar sucesso
        if ($emailService->send()) {
            return redirect()->back()->with('success', 'Mensagem enviada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Ocorreu um erro ao enviar sua mensagem. Tente novamente.');
        }
    }


}
