<?php
// serve a aplicação. A ponte entre o código, o server e o banco. É a regra do negócio

require_once (__DIR__ . '/../services/Task.php');
require_once (__DIR__ . '/../services/Errors.php');
require_once (__DIR__ . '/../services/TaskPDO.php');

class TaskService 
{
        private TaskPDO $pdo;
        public function __construct() {
            // pdo é a camada de conexão com os comandos do sql
            $this->pdo = new TaskPDO($this->pdo);            
        }

        public function create_task(string $description) {
            if (empty($description)) {
                set_error(Errors::Empty);
                return;
            }

            $task = new Task($description, 0);

            if($this->is_duplicated($task)) {
                set_error(Errors::Duplicated);
                return;
            }

            $this->pdo->create($task);            
        }

        public function get_tasks() {

        }

        public function get_task(int $id) {

        }

        public function check () {

        }

        public function remove_task () {

        }

        private function is_duplicated (Task $task, array $tasks) 
        {
            // array_unique();
            // $fn = fn($t) => $t['description'];
            $tasks = array_map(
                $fn($t) => $t['description'], 
                $this->pdo->get_all();
            );

            $tasks[] = $task->description;
            $tasks_set = array_unique($tasks, SORT_REGULAR);

            return count($tasks) !== count($tasks_set);
        }
}