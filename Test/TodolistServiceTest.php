<?php

require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Entity/TodolistEntity.php";
require_once __DIR__ . "/../Config/Database.php";

use Config\Database;
use \Repository\TodolistRepositoryImpl;
use \Service\TodolistServiceImpl;

function testShowTodolist(): void
{
    $connection = Database::getConnection();
    $todolistRepo = new TodolistRepositoryImpl($connection);

    $todolistService = new TodolistServiceImpl($todolistRepo);

    $todolistService->showTodolist();
}
function testAddTodolist(): void
{
    $connection = Database::getConnection();
    $todolistRepo = new TodolistRepositoryImpl($connection);

    $todolistService = new TodolistServiceImpl($todolistRepo);
    $todolistService->addTodolist("Belajar PHP Dasar");
    $todolistService->addTodolist("Belajar PHP OOP");
    $todolistService->addTodolist("Belajar PHP Databases");

//    $todolistService->showTodolist();
}
function testRemoveTodolist(): void
{
    $connection = Database::getConnection();
    $todolistRepo = new TodolistRepositoryImpl($connection);

    $todolistService = new TodolistServiceImpl($todolistRepo);


    echo $todolistService->removeTodolist(5).PHP_EOL;
    echo $todolistService->removeTodolist(4).PHP_EOL;
    echo $todolistService->removeTodolist(2).PHP_EOL;
    echo $todolistService->removeTodolist(1).PHP_EOL;


//    $todolistService->showTodolist();
}

testShowTodolist();