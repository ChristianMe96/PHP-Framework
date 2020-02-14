<?php

use Framework\Application;

session_start();
include('../bootstrap.php');
$app = new Application();
$app->init(include('../src/Config/config.php'));