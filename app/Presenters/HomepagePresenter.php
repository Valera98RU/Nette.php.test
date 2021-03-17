<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;
use App\Model\EmployeeManager;
use App\Model\PositionManager;
use Tracy\Debugger;


/**
 * Class HomepagePresenter
 * @package App\Presenters
 */
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
    private $cache;

	public function __construct(Nette\Database\Explorer $database)
	{
		$this->database = $database;
		$this->paginator = new Nette\Utils\Paginator;
        $this->employeesLab = new EmployeeManager($this->database);
        $this->positionLab = new PositionManager($this->database);
        $this->paginator->setItemsPerPage($this->itemPerPage);
        $storage = new Nette\Caching\Storages\FileStorage('../temp');
    }

	public function renderDefault(): void
	{
        if (!isset($this->employee)) {
            $this->paginator->setItemCount($this->employeesLab->getEmployeeTableCount());
            $this->employee = $this->employeesLab->searchEmployee("",$this->paginator->getPage(),$this->itemPerPage);
        }
        $this->employee->page($this->paginator->getPage(),$this->itemPerPage);

        $this->template->employees = $this->employee;

        $this->template->title = "Таблицы сотрудников";
        $this->template->paginator = $this->paginator;

	}

	public function handleRedraw(array $ids){

	    $this->redrawView();

    }

	public function handlePaginatorController(int $page=1){
        $this->paginator->setPage($page);
        $this->redrawView();
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
     * Удаление нескольких сотрудников
     * @param array $ids
     * @throws Nette\Application\AbortException
     */
	public function handleDelete(array $ids){
        for($i=0;$i<count($ids);$i++){
            $this->employeesLab->deleteEmployee(intval($ids[$i]));
        }
        $this->renderDefault();
    }


    public function createComponentTableForm():Form{
	    $form = new Form();

        $form->addCheckboxList('DeleteCheckbox','',[1=>1]);
        $form->addSubmit('send','Удалить выбранное');
        $form->onSuccess[] = [$this,'tableFormSucceeded'];
        return $form;
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
        $this->redrawView();
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
                ->setHtmlAttribute('class', 'ajax');

        $form->onSuccess[] = [$this,'searchFormSucceeded'];
        return $form;
    }
    protected function redrawView(){
        $this->redrawControl('table_body');
        $this->redrawControl('paginator');
    }
}
