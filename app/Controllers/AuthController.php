<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate()
    {
        $session = session();
        $model = new UserModel(); // ✅ Certifique-se de instanciar o modelo corretamente

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first(); // ✅ Correção aqui

        if ($user) {
            // Verifica a senha (supondo que seja armazenada como hash)
            if (password_verify($password, $user['password'])) {
                $session->set(['user' => $user]);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/login')->with('error', 'Senha incorreta.');
            }
        } else {
            return redirect()->to('/login')->with('error', 'Usuário não encontrado.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
