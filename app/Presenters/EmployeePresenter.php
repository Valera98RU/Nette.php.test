<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;

class EmployeePresenter extends Nette\Application\UI\Presenter
{
    private Nette\Database\Explorer $database;
    private $state = array(
        "0"=>"Работает",
        "1"=>"Уволен"
    );

    public function __construct(Nette\Database\Explorer $database)
    {
        $this->database = $database;
    }

    public function renderShow(int $id):void
    {
        $empl = $this->database->table('employee')->get($id);

        if(!$empl){
            $this->error('Работник не найден');
        }

        $this->template->empl = $empl;
    }

    public function actionEdit(int $emplId):void{
        $empl = $this->database->table('employee')->get($emplId);
        if(!$empl){
            $this->error('Работник не найден');
        }       
       $data = $empl->toArray();
       $data['date_employment']=$data['date_employment']->format('Y-m-d');
        $this['employeeForm']->setDefaults($data);
    }

    public function employeeFormSucceeded(Form $form, array $values):void{
        $emplId = $this->getParameter('emplId');

        if($emplId){
            $employee=$this->database->table('employee')->get($emplId);
            $employee->update($values);
        }else{
            $employee=$this->database->table('employee')->insert($values);
        }

        $this->flashMessage('Работник отредактирован', 'успешно');
        $this->redirect('show', $emplId);
    }
    

    
    protected function createComponentEmployeeForm():Form{
        $form = new Form;

        
        $form->addText('name','Имя:')
                ->setRequired();
        $key = 'id';
        $value = 'name_position';
        $selectPositionArray = $this->database->table('position')->fetchPairs($key, $value);
        
        
        $form->addSelect('id_position','Должность', $selectPositionArray)
                ->setPrompt('Выбирете должность');          
                
        $form->addText('date_employment','Дата трудоустройства')
                ->setHtmlType('date');
                    
        $form->addSelect('state','Статус',$this->state)
                ->setPrompt('Выбирете статус');
        $form->addSubmit('send','Сохранить изменения');
        $form->onSuccess[] = [$this,'employeeFormSucceeded'];

        return $form;
    }
    
    
}