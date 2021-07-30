<?php

require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Entity/TodolistEntity.php";

use \Repository\TodolistRepositoryImpl;
use \Service\TodolistServiceImpl;
use Entity\TodolistEntity;

function testShowTodolist(): void
{

    $todolistRepo = new TodolistRepositoryImpl();
    $todolistRepo->todolistEntity[1] = new TodolistEntity("Belajar PHP Dasar");
    $todolistRepo->todolistEntity[2] = new TodolistEntity("Belajar PHP OOP");
    $todolistRepo->todolistEntity[3] = new TodolistEntity("Belajar PHP Database");

    $todolistService = new TodolistServiceImpl($todolistRepo);

    $todolistService->showTodolist();
}
function testAddTodolist(): void
{

    $todolistRepo = new TodolistRepositoryImpl();

    $todolistService = new TodolistServiceImpl($todolistRepo);
    $todolistService->addTodolist("Belajar PHP Dasar");
    $todolistService->addTodolist("Belajar PHP OOP");
    $todolistService->addTodolist("Belajar PHP Databases");

    $todolistService->showTodolist();
}
function testRemoveTodolist(): void
{

    $todolistRepo = new TodolistRepositoryImpl();

    $todolistService = new TodolistServiceImpl($todolistRepo);
    $todolistService->addTodolist("Belajar PHP Dasar");
    $todolistService->addTodolist("Belajar PHP OOP");
    $todolistService->addTodolist("Belajar PHP Databases");

    $todolistService->showTodolist();
    $todolistService->removeTodolist(1);

    $todolistService->showTodolist();
    $todolistService->removeTodolist(2);

    $todolistService->showTodolist();
    $todolistService->removeTodolist(1);

    $todolistService->showTodolist();
}

testRemoveTodolist();
