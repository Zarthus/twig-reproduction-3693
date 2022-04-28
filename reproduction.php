<?php

require __DIR__ . '/vendor/autoload.php';

$fsLoader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates', __DIR__ . '/templates');
$twig = new \Twig\Environment($fsLoader, ['debug' => true, 'auto_reload' => true, 'cache' => false, 'optimizations' => 0]);

if (test($twig)) {
    echo "Assertion failed: Since template's contents have modified the expectation is that the output is different";
    exit(1);
} else {
    echo "All is good :)";
}
