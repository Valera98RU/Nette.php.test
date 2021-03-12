<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;
use App\Model\EmployeeManager;
use App\Model\PositionManager;

class EmployeePresenter extends Nette\Application\UI\Presenter
{
    private  $database;
    private $EmployeeLab;
    private $PositionLab;
    private  $errorMessage = "Работник не найден";
    private $state = array(
        "0"=>"Работает",
        "1"=>"Уволен"
    );

    public function __construct(Nette\Database\Explorer $database)
    {
        $this->database = $database;
        $this->EmployeeLab = new EmployeeManager($this->database);
        $this->PositionLab = new PositionManager($this->database);
    }

    public function renderShow(int $id):void
    {
        $empl = $this->EmployeeLab->getEmployee($id);

        if(!$empl){
            $this->error($this->errorMessage);
        }

        $this->template->empl = $empl;
    }

    /**
     * Получает данные из таблицы employee и заполняет ими форму
     * @param int $id Идентификатор записи
     * @throws Nette\Application\BadRequestException
     */
    public function actionEdit(int $id): void
    {
        $employee = $this->EmployeeLab->getEmployee($id);
        if (!$employee) {
            $this->error($this->errorMessage);
        }
        $data = $employee->toArray();
        $data['date_employment'] = $data['date_employment']->format('Y-m-d');
        $this['employeeForm']->setDefaults($data);
    }

    /**
     * Обрабатывает post запрос от вормы редактирования
     * @param Form $form
     * @param array $values
     * @throws Nette\Application\AbortException
     */
    public function employeeFormSucceeded(Form $form, array $values):void{
        $id = $values['id'];

        if($id){
            $this->EmployeeLab->editEmployee($id,$values);
        }else{
            $this->EmployeeLab->addEmployee($values);
        }

        $this->flashMessage('Работник отредактирован', 'успешно');
        $this->redirect('show', $id);
    }


    /**
     * СОздает форму редактирования записи из таблицы employee
     * @return Form
     */
    protected function createComponentEmployeeForm():Form{
        $form = new Form;

        
        $form->addText('name','Имя:')
                ->setRequired();
        $selectPositionArray = $this->PositionLab->getPositionToArray();

        $form->addSelect('id_position','Должность', $selectPositionArray)
                ->setPrompt('Выбирете должность');          
                
        $form->addText('date_employment','Дата трудоустройства')
                ->setHtmlType('date');
                    
        $form->addSelect('state','Статус',$this->state)
                ->setPrompt('Выбирете статус');
        $form->addHidden("id");
        $form->addSubmit('send','Сохранить изменения');
        $form->onSuccess[] = [$this,'employeeFormSucceeded'];

        return $form;
    }
    
    
}