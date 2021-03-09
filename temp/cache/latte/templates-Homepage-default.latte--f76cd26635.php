<?php

use Latte\Runtime as LR;

/** source: W:\domains\nette.test.php\app\Presenters/templates/Homepage/default.latte */
final class Templatef76cd26635 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['content' => 'blockContent', 'title' => 'blockTitle'],
	];


	public function main(): array
	{
		extract($this->params);
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
		echo '

';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['empl' => '6'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->renderBlock('title', get_defined_vars()) /* line 4 */;
		echo '	<table>
';
		$iterations = 0;
		foreach ($employee as $empl) /* line 6 */ {
			echo '		<tbody>
			<tr>
				<td><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Employee:edit", [$empl->id])) /* line 8 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($empl->name) /* line 8 */;
			echo '</a></td>	
			
				<td><p>';
			echo LR\Filters::escapeHtmlText($empl->position->name_position) /* line 10 */;
			echo '</p></td>
			
				<td>';
			if ($empl->state==0) /* line 12 */ {
				echo '<p>';
				echo LR\Filters::escapeHtmlText(($this->filters->date)($empl->date_employment, 'j F, Y')) /* line 12 */;
				echo '</p>';
			}
			echo '</td>
			
				<td><p>';
			if ($empl->state==0) /* line 14 */ {
				echo 'Работает';
			}
			else /* line 14 */ {
				echo 'Уволен';
			}
			echo '</p></td>		
				<td><p><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Employee:edit", [$empl->id])) /* line 15 */;
			echo '">Редактировать</a></p></td>	
				<td><p><a href="#">Удалить</a></p></td>
			</tr>	
		</tbody>
';
			$iterations++;
		}
		echo '	</table>
';
	}


	/** {block title} on line 4 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '	<h1>Таблица сотрудников</h1>
';
	}

}
