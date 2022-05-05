<?php
require_once __DIR__ . "/Entity/TodolistEntity.php";
require_once __DIR__ . "/Helper/InputHelper.php";
require_once __DIR__ . "/Repository/TodolistRepository.php";
require_once __DIR__ . "/Service/TodolistService.php";
require_once __DIR__ . "/View/TodolistView.php";
require_once __DIR__ . "/Config/Database.php";

use Config\Database;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;
$connection = Database::getConnection();

$todolistRepo = new TodolistRepositoryImpl($connection);
$todolistService = new TodolistServiceImpl($todolistRepo);
$todolistView = new TodolistView($todolistService);

$todolistView->showTodolist();
