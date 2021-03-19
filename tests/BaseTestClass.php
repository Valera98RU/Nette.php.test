<?php

namespace tests;

use PHPUnit\Framework\TestCase;


class BaseTestClass extends TestCase
{
    protected static $database;

    protected static function initDb()
    {
        require __DIR__ . '/../vendor/autoload.php';
        $configurator = \App\Bootstrap::boot();
        $container = $configurator->createContainer();
        self::$database = $container->getService('database.default.context');
    }
}