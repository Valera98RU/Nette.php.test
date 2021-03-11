<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;


 class HomepagePresenter extends Nette\Application\UI\Presenter
 {
	private     $database;
	public $paginator;

	public function __construct(Nette\Database\Explorer $database)
	{

		$this->database = $database;
		$this->paginator = new Nette\Utils\Paginator;
	}

	public function renderDefault(int $page = 1): void
	{

        $this->paginator->setPage($page); // the number of the current page (numbered from 1)
        $this->paginator->setItemsPerPage(10); // the number of records per page
        $this->paginator->setItemCount($this->database->table('employee')->count());
		$this->template->employee = $this->database->table('employee')
            ->page($this->paginator->getPage(),$this->paginator->getLength());


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

	
}
