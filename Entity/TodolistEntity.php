<?php 
    namespace Entity{

        class TodolistEntity{

            private string $todolist;

            public function __construct(string $todolist = "")
            {
                $this->todolist = $todolist;
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