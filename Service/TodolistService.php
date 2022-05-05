<?php

namespace Service {

    use Repository\TodolistRepository;
    use Entity\TodolistEntity;

    interface TodolistService
    {

        function showTodolist(): void;

        function addTodolist(string $todo): void;

        function removeTodolist(int $number): void;
    }

    class TodolistServiceImpl implements TodolistService
    {
        private TodolistRepository $todolistRepo;

        public function __construct(TodolistRepository $todolistRepo)
        {
            $this->todolistRepo = $todolistRepo;
        }
        function showTodolist(): void
        {
            $todo = $this->todolistRepo->findAll();
            echo "TODOLIST" . PHP_EOL;
            foreach ($todo as $num => $value) {
                echo $value->getId() ." . ". $value->getTodolist() . PHP_EOL;
            }
        }

        function addTodolist(string $todo): void
        {
            $todolist = new TodolistEntity($todo);
            $this->todolistRepo->save($todolist);
            echo "Berhasil tambah data". PHP_EOL;
        }

        function removeTodolist(int $number): void
        {
            if ($this->todolistRepo->remove($number)) {
                echo "Berhasil hapus data" . PHP_EOL;
            } else {
                echo "Gagal hapus data" . PHP_EOL;
            }
        }
    }
}
