<?php

use Symfony\Component\Console\Application;

require 'vendor/autoload.php';
require_once 'src/config.php';


$app = new Application('Task App', '1.0');


try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $exception) {
    echo $exception->getMessage();
    exit(1);
}
$DBConnection = new Acme\DBConnection($pdo);

/**
 * Registering Create table command
 */

$app->add(new Acme\CreateTable($DBConnection));
/**
 * Registering command to set employee's web history details
 */

$app->add(new Acme\SetEmpDataCommand($DBConnection));

/**
 * Registering command to set employee's web history details
 */
$app->add(new Acme\SetEmpWebHistoryCommand($DBConnection));

/**
 * Registering command to get employee's details
 */
$app->add(new Acme\GetEmpDataCommand($DBConnection));

/**
 * Registering command to get employee's web history details
 */
$app->add(new Acme\GetEmpWebHistoryCommand($DBConnection));

/**
 * Registering command to unset employee's details
 */
$app->add(new Acme\UnsetEmpDataCommand($DBConnection));

/**
 * Registering command to unset employee's web history details
 */
$app->add(new Acme\UnsetEmpWebHistoryCommand($DBConnection));

try {
    $app->run();
} catch (Exception $ex) {
    echo $ex->getMessage();
    exit(1);
}
