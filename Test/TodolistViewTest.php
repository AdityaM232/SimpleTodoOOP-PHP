<?php
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../Helper/InputHelper.php";
require_once __DIR__ . "/../View/TodolistView.php";
require_once __DIR__ . "/../Entity/TodolistEntity.php";


use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;

function testViewTodolist(): void
{
    $todolistRepo = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepo);
    $todolistView = new TodolistView($todolistService);

    $todolistService->addTodolist("test");
    $todolistService->addTodolist("test1");
    $todolistService->addTodolist("test2");
    $todolistView->showTodolist();
}
function testAddTodolist(): void
{
    $todolistRepo = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepo);
    $todolistView = new TodolistView($todolistService);

    $todolistService->addTodolist("test");
    $todolistService->addTodolist("test1");
    $todolistService->addTodolist("test2");
    $todolistView->showTodolist();
    $todolistService->addTodolist("test3");
    $todolistView->showTodolist();
}
function testRemoveTodolist(): void
{
    $todolistRepo = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepo);
    $todolistView = new TodolistView($todolistService);

    $todolistService->addTodolist("test");
    $todolistService->addTodolist("test1");
    $todolistService->addTodolist("test2");
    $todolistView->showTodolist();
    $todolistService->removeTodolist(2);
    $todolistView->showTodolist();
    $todolistService->removeTodolist(3);
    $todolistView->showTodolist();
}

testAddTodolist();
