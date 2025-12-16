<!-- // responsável por chamar o banco diretamente.  -->
<?php

require_once(__DIR__ . '/../db/Connection.php');
require_once(__DIR__ . '/../objects/Task.php');

class TaskPDO
{
    private PDO $pdo;

    // receber a conexão com o banco, passa na service, na pdo e a pdo trabalha com ela
    public function __construct()
    {
        $this->pdo = DatabaseConnection::connect();
    }

    // Create Read Update Delete
    public function create(Task $object): void 
    {
        $query = "INSERT INTO tasks (description, done) VALUES (:description, :done)";
        $sql = $this->pdo->prepare($query);

        $sql->execute([
            'description' => $object->description,
            'done' => $object->done
        ]);
    }

    public function get_all(): array
    {
        $query = 'SELECT id, description, done FROM tasks';
        $sql = $this->pdo->query($query);

        return $sql-> fetchAll();
    }

    public function get_by_id (int $id)
    {
        $query = 'SELECT id, description, done FROM tasks WHERE id = :id';
        $sql = $this->pdo->prepare($query);

        $sql->execute([
            'id' => $id
        ]);
        $task = $sql->fetch();

        // o ternário é igual ao do JavaScript!

        // if($task !== null) {
        //     return new Task($task['description'], $task['done'], $task['id']);
        // }

        return $task ? new Task($task['description'], $task['done'], $task['id']) : null ;
    }

    public function update(Task $object): void
    {
        $query = "UPDATE tasks SET description = :description, done = :done WHERE id = :id";
        $sql = $this->pdo->prepare($query);

        $sql->execute([
            'description' => $object->description,
            'done' => $object->done,
            'id' => $object->id
        ]);
    }
    public function delete(int $id) 
    {
        $query = "DELETE FROM tasks WHERE id = :id";
        $sql = $this->pdo->prepare($query);

        $sql->execute([
            'id' => $id
        ]);
    }

    public function delete_all()
    {
        $query = "TRUNCATE TABLE tasks";
        $sql = $this->pdo->prepare($query);
        
        $sql->execute();
    }
}
