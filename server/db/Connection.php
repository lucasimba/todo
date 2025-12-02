<!-- fará a conexão com o banco -->
<?php
require_once(__DIR__ . '/Config.php');
require_once(__DIR__ . '/Setup.php');


//mysql:host=127.0.0.1:3306;dbname=todo
define('BASE_DSN', 'mysql:host=' . HOST);
define('DSN', BASE_DSN . ';dbname=' . DB);
define('NO_DATABASE_ERROR', 1049);

class DatabaseConnection
{
    private static $pdo = null;

    public static function connect()
    {
        try {
            if (self::$pdo == null) {
                self::$pdo = new PDO(DSN, USER, PASS, CONFIG);

                Setup::create_table(self::$pdo);
            } 
            
            return self::$pdo;


        } catch (\PDOException $error) {
            if ($error->getCode() == NO_DATABASE_ERROR) {
                return self::setup_database();
            }

            throw new \PDOException($error->getMessage(), (int)$error->getCode());
        }
    }


    private static function setup_database()
    {
        // if (self::$pdo == null) {
            self::$pdo = new PDO(BASE_DSN, USER, PASS, CONFIG);
        // }

        try {
            Setup::create_database(self::$pdo);
            return Setup::create_table(self::$pdo);
        } catch (\PDOException $error) {
            throw new \PDOException($error->getMessage(), (int)$error->getCode());
        }
    }
}
