<?php
require_once __DIR__ . "/Entity/TodolistEntity.php";
require_once __DIR__ . "/Helper/InputHelper.php";
require_once __DIR__ . "/Repository/TodolistRepository.php";
require_once __DIR__ . "/Service/TodolistService.php";
require_once __DIR__ . "/View/TodolistView.php";

use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;

$todolistRepo = new TodolistRepositoryImpl();
$todolistService = new TodolistServiceImpl($todolistRepo);
$todolistView = new TodolistView($todolistService);

$todolistView->showTodolist();
