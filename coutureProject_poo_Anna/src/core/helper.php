<?php

use Anna\core\Autorisation;

function add_class_invalid(array $errors, string $fieldName): void
{
    echo isset($errors[$fieldName]) 
        ? "block w-full p-4 ps-10 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500" 
        : "block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500";
}


function add_placeholder_invalid(array $errors, string $fiedName, $goodValue): void
{
    echo isset($errors[$fiedName]) 
    ? $errors[$fiedName]
    : $goodValue;
}

function add_class_hidden(string $role): void {
    echo !Autorisation::hasRole($role)
    ? "invisible"
    : "";
}

function dd(mixed $data): void
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die();
}