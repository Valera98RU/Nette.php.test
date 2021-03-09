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

	
}
