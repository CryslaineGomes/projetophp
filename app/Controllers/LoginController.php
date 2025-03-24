<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class LoginController extends Controller
{
    public function index()
    {
        return view('login'); 
    }

    public function authenticate()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $model->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set('logged_in', true);
                $session->set('user_id', $user['id']);
                return redirect()->to('/dashboard'); 
            } else {
                $session->setFlashdata('error', 'Senha incorreta.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Usuário não encontrado.');
            return redirect()->to('/login');
        }
    }
}
