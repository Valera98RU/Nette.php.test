<?php

use Latte\Runtime as LR;

/** source: C:\Users\valera\PhpstormProjects\test\Nette.php.test\app\Presenters/templates/Employee/show.latte */
final class Template0d7ebde9c3 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['content' => 'blockContent'],
	];


	public function main(): array
	{
		extract($this->params);
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '    <h1>Карточка сотрудника</h1>
    <p><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) /* line 3 */;
		echo '">вернуться к таблице</a></p>
    <div>
    <table >
        <tbody>
            <tr>
                <td><p>';
		echo LR\Filters::escapeHtmlText($empl->name) /* line 8 */;
		echo '</p></td>
            </tr>
            <tr>
                <td><p>';
		echo LR\Filters::escapeHtmlText($empl->position->name_position) /* line 11 */;
		echo '</p></td>
            </tr>
            <tr>
                <td>';
		if ($empl->state==0) /* line 14 */ {
			echo '<p>';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($empl->date_employment, "j F, Y" )) /* line 14 */;
			echo '</p>';
		}
		echo '</td>
            </tr>
            <tr>
                <td><p >';
		if ($empl->state==0) /* line 17 */ {
			echo 'Работает';
		}
		else /* line 17 */ {
			echo 'Уволен';
		}
		echo '</p></td>
            </tr>
            <tr>
                <td><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("edit", [$empl->id])) /* line 20 */;
		echo '">Редактировать</a></td>
            </tr>
            
        </tbody>
    </table>
    </div>
';
	}

}
