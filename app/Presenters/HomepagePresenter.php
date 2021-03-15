<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;
use App\Model\EmployeeManager;
use App\Model\PositionManager;



class HomepagePresenter extends Nette\Application\UI\Presenter
 {
	private $database;
	public  $paginator;
	private $employee;
	private $employeesLab;
	private $positionLab;
	private $itemPerPage = 5;
    private $state = array(
        "0"=>"Работает",
        "1"=>"Уволен"
    );

	public function __construct(Nette\Database\Explorer $database)
	{

		$this->database = $database;
		$this->paginator = new Nette\Utils\Paginator;
        $this->employeesLab = new EmployeeManager($this->database);
        $this->positionLab = new PositionManager($this->database);
        $this->paginator->setItemsPerPage($this->itemPerPage);

    }

	public function renderDefault(): void
	{




        if (!isset($this->employee)) {

            $this->paginator->setItemCount($this->employeesLab->getEmployeeTableCount());
            $this->employee = $this->employeesLab->searchEmployee("",$this->paginator->getPage(),$this->itemPerPage);

        }

        $this->template->employee = $this->employee;
        $this->template->paginator = $this->paginator;

	}
	public function handlePaginatorController(int $page=1){

        $this->paginator->setPage($page);
        $this->redrawControl('table_body');
    }

    /**
     * Удаление записи из таблицы employee
     * @param int $id идентификатор удоляемой записи
     * @throws Nette\Application\AbortException
     * @throws Nette\Application\BadRequestException
     */
	public function actionDelete(int $id):void{
		$this->employeesLab->deleteEmployee($id);
		$this->redirect('default');
	}



    /**
     * Обрабатывает post запрос от формы поиска
     * @param Form $form
     * @param array $values
     */
    public function searchFormSucceeded(Form $form, array $values) : void{

	        $searchString = $values['searchString'];
            unset($values['searchString']);
            $ListEmployees = $this->employeesLab->searchEmployee($searchString,$this->paginator->getPage(),$this->itemPerPage,$values);
            $this->paginator->setItemCount($this->employeesLab->Count);
            $this->paginator->setPage(1);
            $this->employee = $ListEmployees;
            $this->redrawControl('table_body');

    }

    /**
     * Конструирует форму фильтра
     * @return Form
     */

    protected function createComponentFilterForm():Form{
        $form = new Form();
        $selectPositionArray = $this->positionLab->getPositionToArray();

        $form->addText("searchString","Поиск")->setHtmlAttribute('placeholder','ФИО');

        $form ->addSelect('id_position','Должности', $selectPositionArray)
                ->setPrompt('Выбирете должность');

        $form->addSelect('state','Статус', $this->state)
                ->setPrompt("Выбирите статус");
        $form->addSubmit('send','Применить')
                ->setHtmlAttribute('class', 'axaj');
        $form->onSuccess[] = [$this,'searchFormSucceeded'];
        return $form;
    }


	
}
