<?php

declare(strict_types=1);
namespace App\Model;

use Nette;


final class PositionManager
{
    use Nette\SmartObject;

    private $database;

    public function __construct(Nette\Database\Explorer $database){
        $this->database = $database;

    }

    /**
     * Возвражает саписи из таблицы position
     * @return Nette\Database\Table\Selection
     */
    public function getPositionList(): Nette\Database\Table\Selection
    {
        return $this->database->table('position');
    }

    /**
     * Возвращает записи из таблицы position в виде массива
     * @return array('id'=>'name_position')
     */
    public function getPositionToArray(): array
    {
        return $this->database->table('position')->fetchPairs('id', 'name_position');
    }



}