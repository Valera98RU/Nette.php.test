<?php

use Latte\Runtime as LR;

/** source: C:\Users\valera\PhpstormProjects\test\Nette.php.test\app\Presenters/templates/Homepage/default.latte */
final class Templated8f6a5e090 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		0 => ['script' => 'blockScript', 'content' => 'blockContent', 'title' => 'blockTitle'],
		'snippet' => ['table_body' => 'blockTable_body'],
	];


	public function main(): array
	{
		extract($this->params);
		echo "\n";
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('script', get_defined_vars()) /* line 2 */;
		echo '
}
';
		$this->renderBlock('content', get_defined_vars()) /* line 6 */;
		echo '


';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['empl' => '47'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block script} on line 2 */
	public function blockScript(array $ʟ_args): void
	{
		
	}


	/** {block content} on line 6 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->renderBlock('title', get_defined_vars()) /* line 7 */;
		echo '	<div>

';
		$form = $this->global->formsStack[] = $this->global->uiControl["filterForm"] /* line 10 */;
		echo '		<form class=form';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), ['class' => null], false);
		echo '>
			<table class=" filterFormTable container" >
				<thead >
					<tr  class="">
						<td class="col-4">
							<input class="form-control"';
		$ʟ_input = $_input = end($this->global->formsStack)["searchString"];
		echo $ʟ_input->getControlPart()->addAttributes(['class' => null])->attributes() /* line 15 */;
		echo '>

						</td>
						<td class="col">
							<select class="form-control"';
		$ʟ_input = $_input = end($this->global->formsStack)["id_position"];
		echo $ʟ_input->getControlPart()->addAttributes(['class' => null])->attributes() /* line 19 */;
		echo '>';
		echo $ʟ_input->getControl()->getHtml() /* line 19 */;
		echo '</select>
						</td>
						<td class="col">
							<select class="form-control"';
		$ʟ_input = $_input = end($this->global->formsStack)["state"];
		echo $ʟ_input->getControlPart()->addAttributes(['class' => null])->attributes() /* line 22 */;
		echo '>';
		echo $ʟ_input->getControl()->getHtml() /* line 22 */;
		echo '</select>
						</td>
						<td class="col">
							<input class="btn btn-default"';
		$ʟ_input = $_input = end($this->global->formsStack)["send"];
		echo $ʟ_input->getControlPart()->addAttributes(['class' => null])->attributes() /* line 25 */;
		echo '>
						</td>
					</tr>
				</thead>
			</table>
';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), false) /* line 10 */;
		echo '		</form>
	</div>

<div id="';
		echo htmlspecialchars($this->global->snippetDriver->getHtmlId('table_body'));
		echo '">';
		$this->renderBlock('table_body', [], null, 'snippet') /* line 33 */;
		echo '</div>

';
	}


	/** {block title} on line 7 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '	<h1>Таблица сотрудников</h1>
';
	}


	/** {snippet table_body} on line 33 */
	public function blockTable_body(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("table_body", 'static');
		try {
			echo '			<table class="table">
			<thead class="thead-dark">
			<tr>
				<td>ФИО </td>
				<td>Должность</td>
				<td>Дата трудоустройства</td>
				<td>Статус</td>
			</tr>
			</thead>


			<tbody id="table_body" >

';
			$iterations = 0;
			foreach ($employee as $empl) /* line 47 */ {
				echo '			<tr >
				<td><a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Employee:show", [$empl->id])) /* line 48 */;
				echo '">';
				echo LR\Filters::escapeHtmlText($empl->name) /* line 48 */;
				echo '</a></td>
			
				<td><p>';
				echo LR\Filters::escapeHtmlText($empl->position->name_position) /* line 50 */;
				echo '</p></td>
			
				<td>';
				if ($empl->state==0) /* line 52 */ {
					echo '<p>';
					echo LR\Filters::escapeHtmlText(($this->filters->date)($empl->date_employment, 'j F, Y')) /* line 52 */;
					echo '</p>';
				}
				echo '</td>
			
				<td><p>';
				if ($empl->state==0) /* line 54 */ {
					echo 'Работает';
				}
				else /* line 54 */ {
					echo 'Уволен';
				}
				echo '</p></td>		
				<td><p><a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Employee:edit", [$empl->id])) /* line 55 */;
				echo '">Редактировать</a></p></td>	
				<td><p><a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete", [$empl->id])) /* line 56 */;
				echo '">Удалить</a></p></td>
			</tr>
';
				$iterations++;
			}
			echo '
		</tbody>

	</table>



	<div class="pagination ajax">
';
			if (!$paginator->isFirst()) /* line 66 */ {
				echo '			<a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("PaginatorController!", [1])) /* line 67 */;
				echo '">Первый</a>
			&nbsp;|&nbsp;
			<a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("PaginatorController!", [$paginator->getPage()-1])) /* line 69 */;
				echo '">Предидущий</a>
			&nbsp;|&nbsp;
';
			}
			echo '
			Страница ';
			echo LR\Filters::escapeHtmlText($paginator->getPage()) /* line 73 */;
			echo ' из ';
			echo LR\Filters::escapeHtmlText($paginator->getPageCount()) /* line 73 */;
			echo '

';
			if (!$paginator->isLast()) /* line 75 */ {
				echo '			&nbsp;|&nbsp;
			<a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("PaginatorController!", [$paginator->getPage() + 1])) /* line 77 */;
				echo '">Далее</a>
			&nbsp;|&nbsp;
			<a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("PaginatorController!", [$paginator->getPageCount()])) /* line 79 */;
				echo '">Последний</a>
';
			}
			echo '	</div>
';
		}
		finally {
			$this->global->snippetDriver->leave();
		}
		
	}

}
