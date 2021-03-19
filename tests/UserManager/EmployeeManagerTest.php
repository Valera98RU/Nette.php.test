<?php


namespace tests\UserManager;


use App\Model\EmployeeManager;
use App\Model\UserManager;
use Nette\Security\Passwords;
use PHPStan\Testing\TestCase;


class EmployeeManagerTest extends  TestCase
{
    const
        TABLE_NAME = 'employee',
        COL_ID = 'id',
        COL_NAME = 'name',
        COL_POSITION = 'id_position',
        COL_DATE = 'date_employment',
        COL_STATE = 'state';

    private static $database;
    private static $employeeManager;
    private static $data = [
        self::COL_ID        =>  '100',
        self::COL_NAME      =>  'testEmployee',
        self::COL_POSITION  =>  '1',
        self::COL_DATE      =>  '11.11.1111',
        self::COL_STATE     =>  '0'
    ];
    private static $edit_data=[
        self::COL_ID        =>  '100',
        self::COL_NAME      =>  'employeeTest',
        self::COL_POSITION  =>  '1',
        self::COL_DATE      =>  '11.11.1111',
        self::COL_STATE     =>  '1'
    ];
    private $id;

    public static function setUpBeforeClass(): void
    {
        require __DIR__ . '/../../vendor/autoload.php';
        $configurator = \App\Bootstrap::boot();
        $container = $configurator->createContainer();
        self::$database = $container->getService('database.default.context');
        self::$employeeManager = new EmployeeManager(self::$database);
    }


    public function testAddEmployee()
    {
        $this->id = self::$employeeManager->addEmployee(self::$data);
        $this->assertTrue($this->id!=null);
        return $this->id;
    }

    /**
     * @depends testAddEmployee
     * @param $id
     */
    public function testGetEmployee($id){
        $employee = self::$employeeManager->getEmployee($id);
        $this->assertEquals(self::$data[self::COL_NAME],$employee->name);
        return $id;
    }




    public function testGetEmployeeTableCount(){
        $this->assertTrue(self::$employeeManager->getEmployeeTableCount()>0);
    }

    /**
     * @depends testGetEmployee
     */
    public function testEditEmployee($id){

        $this->assertIsInt($id);
        $this->assertTrue(self::$employeeManager->editEmployee($id,self::$edit_data));
    }

    public function testSearchEmployee(){

        $this->assertTrue(self::$employeeManager->searchEmployee(self::$data[self::COL_NAME],1,10)->count()>0);
        $this->assertTrue(self::$employeeManager->searchEmployee("",1,10,[self::COL_STATE=>self::$data[self::COL_STATE]])->count()>0);
        $this->assertTrue(self::$employeeManager->searchEmployee("",1,10,[self::COL_DATE=>self::$data[self::COL_DATE]])->count()>0);
        $this->assertTrue(self::$employeeManager->searchEmployee("",1,10,[self::COL_POSITION=>self::$data[self::COL_POSITION]])->count()>0);


    }
    /**
     * @depends testAddEmployee
     * @param $id
    */
    public function testDeleteEmployee($id){
        $this->assertTrue(self::$employeeManager->deleteEmployee($id));
    }




    public static function tearDownAfterClass(): void{
       self::$database->table(self::TABLE_NAME)->where(self::COL_NAME,self::$data[self::COL_NAME])->delete();
    }

}