<?php


namespace tests\UserManager;


use App\Model\PositionManager;
use PHPUnit\Framework\TestCase;


class PositionManagerTest extends TestCase
{
    private static $database;
    private static $position;
    const
        TABLE_NAME='position',
        COL_ID = 'id',
        COL_NAME = 'name_position';

    public static function setUpBeforeClass(): void{
        require __DIR__ . '/../../vendor/autoload.php';
        $configurator = \App\Bootstrap::boot();
        $container = $configurator->createContainer();
        self::$database = $container->getService('database.default.context');
        self::$position = new PositionManager(self::$database);
    }


    public function testGetPositionList(){
        $positionList = self::$position->getPositionList();
        $this->assertTrue($positionList->count()>0);
    }


    public function testGetPositionToArray(){
        $positionArray = self::$position->getPositionToArray();
        $this->assertIsArray($positionArray);
        $this->assertTrue(count($positionArray)>0);
        $this->assertIsString($positionArray[1][self::COL_NAME]);

    }


}