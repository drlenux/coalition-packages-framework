<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use core\WebApp;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env');

WebApp::create($dotenv);
