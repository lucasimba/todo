<!-- Utilitário. Terá uma função que prepare o banco de dados quando executado pela primeira vez. -->
 <?php
//  importar arquivos, trata-los como módulos. Requer que tenha o arquivo antes de executa-lo - _once carrega apenas uma vez.

// __DIR__ retorna a pasta em que se localiza o arquivo. É usado para evitar de escrever o path errado.
require_once(__DIR__ . '/Config.php');


// PDO: conexão com o banco. 
class Setup 
{
    // tipo do argumento. Deve vir da classe PDO
    public static function create_database(PDO $pdo)
    {
        // $this -> pdo = $pdo;
        // throw new \Exception('Not implemented');

        $sql = "CREATE DATABASE IF NOT EXISTS" . DB;
        $pdo->exec($sql);
    }
    public static function create_table(PDO $pdo)
    {
        $sql = "CREATE TABLE IF NOT EXISTS tasks (
        id INT AUTO_INCREMENT PRIMARY KEY,
        description VARCHAR(500) NOT NULL,
        done BOOLEAN NOT NULL DEFAULT 0
        )";
        $pdo->exec($sql);
    }
}
