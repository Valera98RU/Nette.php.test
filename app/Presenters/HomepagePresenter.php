<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;
use App\Model\EmployeeManager;



class HomepagePresenter extends Nette\Application\UI\Presenter
 {
	private     $database;
	public $paginator;
	private $employee;
	private $employeesLab;

	public function __construct(Nette\Database\Explorer $database)
	{

		$this->database = $database;
		$this->paginator = new Nette\Utils\Paginator;
        $this->employeesLab = new EmployeeManager($this->database);
	}

	public function renderDefault(int $page = 1): void
	{
	    $this->paginator->setPage($page); // the number of the current page (numbered from 1)
        $this->paginator->setItemsPerPage(10); // the number of records per page

        if (!isset($this->employee)) {

            $this->paginator->setItemCount($this->employeesLab->getEmployeeTableCount());
            $this->employee = $this->employeesLab->searchEmployee("",$this->paginator->getPage(),$this->paginator->getLength());




        }

        $this->template->employee = $this->employee;
        $this->template->paginator = $this->paginator;

	}

	public function actionDelete(int $id):void{
		$empl = $this->database->table('employee')->get($id);

		if(!$empl){
			$this->error('Работник не найден');
		}
		$empl->delete();
		$this->redirect('default');
	}
/*
	public function handleSearchEmployee(string $searchString="",int $page = 1): void{
        if($this->isAjax()){
            $this->paginator->setPage($page);
            $this->employee =  $this->database->table('employee')->where('employee.name LIKE ?', '%'.$searchString.'%')
                ->page($this->paginator->getPage(), $this->paginator->getLength());
            $this->redrawControl('table_body');
        }
    }
*/
    protected function createComponentSearchForm():Form{
	    $form = new Form();

	    $form->addText("searchString","");
	    $form->addSubmit("send", "Поиск")
            ->setHtmlAttribute('class', 'axaj');;
        $form->onSuccess[] = [$this,'searchFormSucceeded'];
        return $form;

    }

    public function searchFormSucceeded(Form $form, array $values, int $page = 1) : void{
	    $searchString = $values['searchString'];

            $this->paginator->setPage($page);

            $ListEmployees = $this->employeesLab->searchEmployee($searchString,$this->paginator->getPage());

            $this->paginator->setItemCount($this->employeesLab->Count);
            $this->employee = $ListEmployees;
            $this->redrawControl('table_body');


    }

	
}
