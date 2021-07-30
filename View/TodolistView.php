<?php

namespace View {

    use Helper\InputHelper;
    use Service\TodolistService;

    class TodolistView
    {

        private TodolistService $todolistService;

        public function __construct(TodolistService $todolistService)
        {
            $this->todolistService = $todolistService;
        }

        function showTodolist(): void
        {
            while (true) {

                $this->todolistService->showTodolist();

                echo "Menu" . PHP_EOL;
                echo "1.Tambah Todo" . PHP_EOL;
                echo "2.Hapus Todo" . PHP_EOL;
                echo "3.Keluar" . PHP_EOL;

                $pilihan = InputHelper::input("pilih");

                if ($pilihan == "1") {
                    $this->addTodolist();
                } else if ($pilihan == "2") {
                    $this->removeTodolist();
                } else if ($pilihan == "3") {
                    break;
                } else {
                    echo "Inputan Salah" . PHP_EOL;
                }
            }

            echo "BYE" . PHP_EOL;
        }

        function addTodolist(): void
        {
            echo "MENAMBAH TODOLIST" . PHP_EOL;

            $todo = InputHelper::input("Todo ");

            if (($todo == "x") || ($todo == "X")) {
                echo "dibatalkan" . PHP_EOL;
            } else {
                $this->todolistService->AddTodoList($todo);
            }
        }

        function removeTodolist(): void
        {
            echo "MENGHAPUS TODOLIST" . PHP_EOL;

            $pilihan = InputHelper::input("Nomor");

            $this->todolistService->RemoveTodoList($pilihan);
        }
    }
}
