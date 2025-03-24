<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['email', 'password']; 

    protected $validationRules = [
        'email'    => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[8]',
    ];

    protected $validationMessages = [
        'email' => [
            'required'   => 'O campo email é obrigatório.',
            'valid_email'=> 'O email fornecido é inválido.',
            'is_unique'  => 'Este email já está em uso.',
        ],
        'password' => [
            'required'     => 'A senha é obrigatória.',
            'min_length'   => 'A senha precisa ter pelo menos 8 caracteres.',
        ],
    ];

    public function saveUser($data)
    {
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        return $this->save($data);
    }
}
