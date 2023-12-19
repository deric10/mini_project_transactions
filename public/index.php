<?php

declare(strict_types = 1);
// register the root directory
$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

// Constants for directory path
define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

// Importing the require files
require APP_PATH . "App.php";
require APP_PATH . 'helpers.php';

// Getting files of the provided directory
$files = getTransactionFiles(FILES_PATH);

// Initialize transactions array
$transactions = [];

// Looping through the files to get the transactions
foreach($files as $file) {
    $transactions = array_merge($transactions, getTransactions($file, 'extractTransaction'));
}

// Calculate the transactions
$totals = calculateTotals($transactions);

require VIEWS_PATH . 'transaction.php';