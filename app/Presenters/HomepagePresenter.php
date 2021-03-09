<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;


 class HomepagePresenter extends Nette\Application\UI\Presenter
 {
	private Nette\Database\Explorer $database;

	public function __construct(Nette\Database\Explorer $database)
	{

		$this->database = $database;
	}

	public function renderDefault(): void
	{
		
		$this->template->employee = $this->database->table('employee')
			->order('name')
			->limit(20);

	}

	public function actionDelete(int $id):void{
		$empl = $this->database->table('employee')->get($id);

		if(!$empl){
			$this->error('Работник не найден');
		}
		$empl->delete();
	}

	
}
