<?php

use Latte\Runtime as LR;

/** source: C:\Users\valera\PhpstormProjects\test\Nette.php.test\app\Presenters\templates\components\form.latte */
final class Templatee82cd639de extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['form' => 'blockForm', 'bootstrap-form' => 'blockBootstrap_form'],
	];


	public function main(): array
	{
		extract($this->params);
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		echo '

';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['error' => '4, 24', 'input' => '8, 27', 'name' => '27'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {define form $formName} on line 1 */
	public function blockForm(array $ʟ_args): void
	{
		extract($this->params);
		$formName = $ʟ_args[0] ?? $ʟ_args['formName'] ?? null;
		unset($ʟ_args);
		$form = $this->global->formsStack[] = is_object($formName) ? $formName : $this->global->uiControl[$formName] /* line 2 */;
		echo '	<form';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), [], false);
		echo '>
';
		ob_start(function () {});
		echo '	<ul class=error>
';
		ob_start();
		$iterations = 0;
		foreach ($form->ownErrors as $error) /* line 4 */ {
			echo '		<li>';
			echo LR\Filters::escapeHtmlText($error) /* line 4 */;
			echo '</li>
';
			$iterations++;
		}
		$ʟ_ifc = ob_get_flush();
		echo '	</ul>
';
		if (rtrim($ʟ_ifc) === "") {
			ob_end_clean();
		}
		else {
			echo ob_get_clean();
		}
		echo '
	<table>
';
		$iterations = 0;
		foreach ($form->controls as $input) /* line 8 */ {
			if (!$input->getOption('rendered') && $input->getOption('type') !== 'hidden') /* line 8 */ {
				echo '	<tr';
				echo ($ʟ_tmp = array_filter([$input->required ? 'required' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 8 */;
				echo '>

		<th>';
				$ʟ_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
				if ($ʟ_label = $ʟ_input->getLabel()) echo $ʟ_label;
				echo '</th>
		<td>';
				$ʟ_input = $_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
				echo $ʟ_input->getControl() /* line 13 */;
				echo ' ';
				ob_start(function () {});
				echo '<span class=error>';
				ob_start();
				echo LR\Filters::escapeHtmlText($input->error) /* line 13 */;
				$ʟ_ifc = ob_get_flush();
				echo '</span>';
				if (rtrim($ʟ_ifc) === "") {
					ob_end_clean();
				}
				else {
					echo ob_get_clean();
				}
				echo '</td>
	</tr>
';
			}
			$iterations++;
		}
		echo '	</table>
';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), false) /* line 2 */;
		echo '	</form>
';
	}


	/** {define bootstrap-form $formName} on line 21 */
	public function blockBootstrap_form(array $ʟ_args): void
	{
		extract($this->params);
		$formName = $ʟ_args[0] ?? $ʟ_args['formName'] ?? null;
		unset($ʟ_args);
		$form = $this->global->formsStack[] = is_object($formName) ? $formName : $this->global->uiControl[$formName] /* line 22 */;
		echo '	<form class=form-horizontal';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), ['class' => null], false);
		echo '>
';
		ob_start(function () {});
		echo '	<ul class=error>
';
		ob_start();
		$iterations = 0;
		foreach ($form->ownErrors as $error) /* line 24 */ {
			echo '		<li>';
			echo LR\Filters::escapeHtmlText($error) /* line 24 */;
			echo '</li>
';
			$iterations++;
		}
		$ʟ_ifc = ob_get_flush();
		echo '	</ul>
';
		if (rtrim($ʟ_ifc) === "") {
			ob_end_clean();
		}
		else {
			echo ob_get_clean();
		}
		echo "\n";
		$iterations = 0;
		foreach ($form->controls as $name => $input) /* line 27 */ {
			if (!$input->getOption('rendered') && $input->getOption('type') !== 'hidden') /* line 27 */ {
				echo '	<div';
				echo ($ʟ_tmp = array_filter(['form-group', $input->required ? 'required' : null, $input->error ? 'has-error' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 27 */;
				echo '>

		<div class="col-sm-2 control-label">';
				$ʟ_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
				if ($ʟ_label = $ʟ_input->getLabel()) echo $ʟ_label;
				echo '</div>

		<div class="col-sm-10">
';
				if (in_array($input->getOption('type'), ['text', 'select', 'textarea'], true)) /* line 34 */ {
					echo '				';
					$ʟ_input = $_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
					echo $ʟ_input->getControl()->addAttributes(['class' => 'form-control']) /* line 35 */;
					echo "\n";
				}
				elseif ($input->getOption('type') === 'button') /* line 36 */ {
					echo '				';
					$ʟ_input = $_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
					echo $ʟ_input->getControl()->addAttributes(['class' => "btn btn-default"]) /* line 37 */;
					echo "\n";
				}
				elseif ($input->getOption('type') === 'checkbox') /* line 38 */ {
					echo '				<div class="checkbox">';
					$ʟ_input = $_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
					echo $ʟ_input->getControl() /* line 39 */;
					echo '</div>
';
				}
				elseif ($input->getOption('type') === 'radio') /* line 40 */ {
					echo '				<div class="radio">';
					$ʟ_input = $_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
					echo $ʟ_input->getControl() /* line 41 */;
					echo '</div>
';
				}
				else /* line 42 */ {
					echo '				';
					$ʟ_input = $_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
					echo $ʟ_input->getControl() /* line 43 */;
					echo "\n";
				}
				echo "\n";
				ob_start(function () {});
				echo '			<span class=help-block>';
				ob_start();
				echo LR\Filters::escapeHtmlText($input->error ?: $input->getOption('description')) /* line 46 */;
				$ʟ_ifc = ob_get_flush();
				echo '</span>
';
				if (rtrim($ʟ_ifc) === "") {
					ob_end_clean();
				}
				else {
					echo ob_get_clean();
				}
				echo '		</div>
	</div>
';
			}
			$iterations++;
		}
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), false) /* line 22 */;
		echo '	</form>
';
	}

}
