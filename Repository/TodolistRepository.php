<?php

namespace Repository {

    use Entity\TodolistEntity;

    interface TodolistRepository
    {

        function save(TodolistEntity $todolistEntity): void;

        function remove(int $number): bool;

        function findAll(): array;
    }

    class TodolistRepositoryImpl implements TodolistRepository
    {

        private array $todolistEntity = array();

        function save(TodolistEntity $todo): void
        {
            $num  = sizeof($this->todolistEntity) + 1;

            $this->todolistEntity[$num] = $todo;
        }

        function remove(int $number): bool
        {

            if ($number > sizeof($this->todolistEntity)) {
                return false;
            }
            for ($i = $number; $i < sizeof($this->todolistEntity); $i++) {
                $this->todolistEntity[$i] = $this->todolistEntity[$i + 1];
            }
            unset($this->todolistEntity[sizeof($this->todolistEntity)]);
            return true;
        }

        function findAll(): array
        {
            return $this->todolistEntity;
        }
    }
}
