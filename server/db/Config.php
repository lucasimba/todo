<?php
// configurar o banco de dados, comportamento enquanto usa através do PHP DATA OBJECT

// variáveis de conexão
// constante (similar ao const do javascript. Não há como alterar este valor). 3307 é a porta do MySQL
define('HOST', '127.0.0.1:3306');
define('DB', 'todo');
define('USER', 'root');
define('PASS', '');

// array associativo.
define('CONFIG', [
    // biblioteca default para realizar a conexão com o banco de dados do php PHP DATA OBJECT
    // como vai lidar com erros ao consultar o banco de dados
    // :: -> atributos estáticos. Acessar de forma estatica para devolver os atributos que serão configurados
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // forma padrão de buscar dados em formato de array associativo
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
]);

