<?php
namespace tests\UserManager;

use App\Model\UserManager;

use Nette\Security\Passwords;


use PHPUnit\Framework\TestCase;
use tests\BaseTestClass;


class UserManagerTest extends TestCase
{

    private $data = [100,'testUser','testUser','testUaer@test.com','authenticated'];
    private static $userManager;
    private static $database;

    public static function setUpBeforeClass(): void
    {
        require __DIR__ . '/../../vendor/autoload.php';
        $configurator = \App\Bootstrap::boot();
        $container = $configurator->createContainer();
        self::$database = $container->getService('database.default.context');
        self::$userManager = new UserManager(self::$database, new Passwords());
    }

    protected function setUp(): void
    {


    }
    public function testUserAdd(){
        $this->assertSame(true,self::$userManager->add('testUser','testUaer@test.com','testUser'));
    }
    public function testUserAuthenticate(){

        $this->assertEquals('testUser', self::$userManager->authenticate('testUser','testUser')->getData()['username']);
    }



    public static function tearDownAfterClass(): void{
        self::$database->table('users')->where('username','testUser')->delete();
    }
}