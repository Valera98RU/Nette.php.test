<?php

use Latte\Runtime as LR;

/** source: W:\domains\nette.test.php\app\Presenters/templates/Employee/show.latte */
final class Template46ca60ada4 extends Latte\Runtime\Template
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
		echo '    <p><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) /* line 2 */;
		echo '">вернуться к таблице</a></p>
    <table>
        <tbody>
            <tr>
                <td><p>';
		echo LR\Filters::escapeHtmlText($empl->name) /* line 6 */;
		echo '</p></td>
            </tr>
            <tr>
                <td><p>';
		echo LR\Filters::escapeHtmlText($empl->position->name_position) /* line 9 */;
		echo '</p></td>
            </tr>
            <tr>
                <td>';
		if ($empl->state==0) /* line 12 */ {
			echo '<p>';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($empl->date_employment, "j F, Y" )) /* line 12 */;
			echo '</p>';
		}
		echo '</td>
            </tr>
            <tr>
                <td><p >';
		if ($empl->state==0) /* line 15 */ {
			echo 'Работает';
		}
		else /* line 15 */ {
			echo 'Уволен';
		}
		echo '</p></td>
            </tr>
            <tr>
                <td><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("edit", [$empl->id])) /* line 18 */;
		echo '">Редактировать</a></td>
            </tr>
            
        </tbody>
    </table>
';
	}

}
