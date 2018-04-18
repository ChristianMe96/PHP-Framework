<?php
session_start();
include('../bootstrap.php');
$app = new Check24Framework\Application();
$app->init(include('../src/Config/config.php'));