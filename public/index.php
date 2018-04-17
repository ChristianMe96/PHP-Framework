<?php
session_start();
include('../bootstrap.php');
$app = new Check24Framework\Application(include('../src/Config/config.php'));
$app->init();