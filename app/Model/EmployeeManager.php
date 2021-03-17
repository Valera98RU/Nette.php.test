<?php

declare(strict_types=1);
namespace App\Model;
use Nette;


final class EmployeeManager
{
    use Nette\SmartObject;

    private $database;
    public  $Count;


    public function __construct(Nette\Database\Explorer $database){
        $this->database = $database;
    }

    /**
     * Возвращает массив записей из таблицы employee
     * @param string $searchString Критерий поиска по полю name
     * @param int $page Номер отображаемой страницы
     * @param int $ItemsPerPage Количество записей на одной странице
     * @param array|null $whereParam параметры фильтрации
     * @return Nette\Database\Table\Selection
     */
    public function searchEmployee(string $searchString = "", int $page=1, int $ItemsPerPage, array $whereParam = null){
        $employees =  $this->database->table('employee')->where('Lower(employee.name) LIKE lower(?)', '%'.$searchString.'%');


        if(!empty($whereParam)){
            foreach ($whereParam as $key => $value){
                if(isset($value)) {
                    $employees = $employees->where($key . '=?', $value);
                }
            }
        }
        $employees->order('name ASC');
        $this->Count = $employees->count();


        return $employees;

    }

    /**
     * Возвращает количество записей в таблице employee
     * @return int
     */
    public function getEmployeeTableCount(){
        return $this->database->table('employee')->count();
    }

    /**
     * удаление записи из таблицы employee
     * @param int $id идентификатор записи
     */
    public function deleteEmployee(int $id){
        $employee = $this->database->table('employee')->get($id);
        if(!$employee){
            $this->error('Работник не найден');
        }
        $employee->delete();
    }

    /**
     * Изменяет запись в таблице employee
     * @param int $id идентификатор записи
     * @param array $value изменяемые параметры
     */
    public function editEmployee(int $id, array $value){
        $empl = $this->database->table('employee')->get($id);
        $empl->update($value);
    }

    /**
     * создание записи в таблице employee
     * @param array $values параметры новой записи
     */
    public function addEmployee(array $values){
        $this->database->table('employee')->insert($values);
    }

    /**
     * Запрашивает запись из таблицы employee по идентификатору
     * @param int $id идентификатор записи
     * @return Nette\Database\Table\ActiveRow строка записи из таблицы employee
     */
    public function getEmployee(int $id) {
        return $this->database->table('employee')->get($id);
    }



}