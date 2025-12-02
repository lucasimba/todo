<?php
// serve a aplicação. A ponte entre o código, o server e o banco. É a regra do negócio

require_once (__DIR__ . '/../services/TaskPDO.php');

class TaskService 
{
        private PDO $pdo;
        public function __construct() {
            $this->pdo = DatabaseConnection::connect();            
        }
}