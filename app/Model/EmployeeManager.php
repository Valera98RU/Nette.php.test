<?php

declare(strict_types=1);
namespace App\Model;
use Nette;
use Tracy\Debugger;


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
    public function getEmployeeTableCount(): int
    {
        return $this->database->table('employee')->count();
    }

    /**
     * удаление записи из таблицы employee
     * @param int $id идентификатор записи
     * @return bool
     */
    public function deleteEmployee(?int $id): bool{
        try {
            $employee = $this->database->table('employee')->get($id);
            if (!$employee) {
                $this->error('Работник не найден');
            }
            $employee->delete();
            return true;
        }catch (\PDOException $e){
            return false;
        }

    }

    /**
     * Изменяет запись в таблице employee
     * @param int $id идентификатор записи
     * @param array $value изменяемые параметры
     * @return bool
     */
    public function editEmployee(int $id, array $value): bool{
        try {

            $employee = $this->database->table('employee')->get($id);
            return  $employee->update($value);
        }catch (\PDOException $e){
            return false;
        }
    }

    /**
     * создание записи в таблице employee
     * @param array $values параметры новой записи
     * @return int|null
     */
    public function addEmployee(array $values): ?int{
        try {
           $id = $this->database->table('employee')->insert($values)['id'];
            return  $id;
        }catch (\PDOException $e){
            return null;
        }
    }

    /**
     * Запрашивает запись из таблицы employee по идентификатору
     * @param int $id идентификатор записи
     * @return Nette\Database\Table\ActiveRow строка записи из таблицы employee
     */
    public function getEmployee(?int $id)
    {

        return $this->database->table('employee')->get($id);
    }



}