<?php 
    namespace Entity{

        class TodolistEntity{

            private int $id;
            private string $todolist;

            public function __construct(string $todolist = "")
            {
                $this->todolist = $todolist;
            }

            public function getId(): int
            {
                return $this->id;
            }

            public function setId(int $id): void
            {
                $this->id = $id;
            }

            public function getTodolist(): string
            {
                return $this->todolist;
            }

            public function setTodolist(string $todolist):void
            {
                $this->todolist=$todolist;
            }
        }
    }
?>