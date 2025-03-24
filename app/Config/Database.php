<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to use if no other is specified.
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     *
     * @var array<string, mixed>
     */
    public array $default = [
        'DSN'          => '',  // Não é necessário, mas pode ser usado para configurar parâmetros extras do PostgreSQL.
        'hostname'     => 'localhost',  // Endereço do servidor (localhost para servidores locais).
        'username'     => 'postgres',  // Usuário do PostgreSQL.
        'password'     => '123456',  // Senha do PostgreSQL (atualizado para '123456').
        'database'     => 'loginvirtual',  // Nome do banco de dados PostgreSQL.
        'DBDriver'     => 'PostgreSQL',  // Alterado para PostgreSQL.
        'DBPrefix'     => '',  // Prefixo para tabelas (se necessário).
        'pConnect'     => false,  // Conexão persistente (geralmente, false é o ideal).
        'DBDebug'      => true,  // Exibir erros de banco de dados durante o desenvolvimento.
        'charset'      => 'utf8',  // Charset do banco de dados.
        'DBCollat'     => 'utf8_general_ci',  // Collation (geralmente 'utf8_general_ci' funciona bem).
        'swapPre'      => '',  // Prefixo de tabela de cache (não necessário).
        'encrypt'      => false,  // Criptografia (não necessária para a maioria dos casos).
        'compress'     => false,  // Compressão de dados (não necessária para a maioria dos casos).
        'strictOn'     => false,  // Modo estrito (geralmente, false é o ideal).
        'failover'     => [],  // Configuração de failover (não necessária).
        'port'         => 5432,  // Porta padrão do PostgreSQL.
        'dateFormat'   => [
            'date'     => 'Y-m-d',  // Formato de data.
            'datetime' => 'Y-m-d H:i:s',  // Formato de data e hora.
            'time'     => 'H:i:s',  // Formato de hora.
        ],
    ];

    /**
     * This database connection is used when running PHPUnit database tests.
     *
     * @var array<string, mixed>
     */
    public array $tests = [
        'DSN'         => '',
        'hostname'    => '127.0.0.1',
        'username'    => '',
        'password'    => '',
        'database'    => 'loginvirtual',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'db_',  // Prefixo para tabelas (se necessário).
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => '',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 3307,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
        'dateFormat'  => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    public function __construct()
    {
        parent::__construct();

        // Ensure that we always set the database group to 'tests' if
        // we are currently running an automated test suite, so that
        // we don't overwrite live data on accident.
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}
