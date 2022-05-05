<?php

namespace Repository {

    use Entity\TodolistEntity;
    use PDO;

    interface TodolistRepository
    {

        function save(TodolistEntity $todolistEntity): void;

        function remove(int $number): bool;

        function findAll(): array;
    }

    class TodolistRepositoryImpl implements TodolistRepository
    {

        public array $todolistEntity = array();

        private PDO $connection;

        public function __construct(PDO $connection)
        {
            $this->connection = $connection;
        }


        function save(TodolistEntity $todo): void
        {
//            $num  = sizeof($this->todolistEntity) + 1;
//
//            $this->todolistEntity[$num] = $todo;

            $sql = "INSERT INTO todolist(todo) VALUES (?)";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$todo->getTodolist()]);
        }

        function remove(int $number): bool
        {

//            if ($number > sizeof($this->todolistEntity)) {
//                return false;
//            }
//            for ($i = $number; $i < sizeof($this->todolistEntity); $i++) {
//                $this->todolistEntity[$i] = $this->todolistEntity[$i + 1];
//            }
//            unset($this->todolistEntity[sizeof($this->todolistEntity)]);
//            return true;

            $sql = "SELECT id FROM todolist where id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$number]);

            if ($statement->fetch()){
                $sql = "DELETE FROM todolist where id = ?";
                $statement = $this->connection->prepare($sql);
                $statement->execute([$number]);
                return true;
            }else{
                return false;
            }


        }

        function findAll(): array
        {
//            return $this->todolistEntity;
            $sql = "SELECT id,todo FROM todolist";
            $statement = $this->connection->prepare($sql);
            $statement->execute();

            $result = [];

            foreach ($statement as $row){

                $todo = new TodolistEntity();
                $todo->setId($row['id']);
                $todo->setTodolist($row['todo']);
                $result[] = $todo;
            }

            return $result;
        }
    }
}
