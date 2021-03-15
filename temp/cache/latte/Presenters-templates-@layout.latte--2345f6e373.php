<?php

use Latte\Runtime as LR;

/** source: C:\Users\valera\PhpstormProjects\test\Nette.php.test\app\Presenters/templates/@layout.latte */
final class Template2345f6e373 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['head' => 'blockHead', 'scripts' => 'blockScripts'],
	];


	public function main(): array
	{
		extract($this->params);
		echo '
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>';
		if ($this->hasBlock("title")) /* line 13 */ {
			$this->renderBlock($ʟ_nm = 'title', [], function ($s, $type) {
				$ʟ_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('striphtml', $ʟ_fi, $s));
			}) /* line 13 */;
			echo ' | ';
		}
		echo 'Nette Sandbox</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 17 */;
		echo '/css/style.css">
	';
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('head', get_defined_vars()) /* line 18 */;
		echo '
</head>

<body>
	<div class="container">
';
		$iterations = 0;
		foreach ($flashes as $flash) /* line 23 */ {
			echo '		<div';
			echo ($ʟ_tmp = array_filter(['alert', 'alert-' . $flash->type])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 23 */;
			echo '>';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 23 */;
			echo '</div>
';
			$iterations++;
		}
		echo "\n";
		$this->renderBlock($ʟ_nm = 'content', [], 'html') /* line 25 */;
		echo '	</div>

';
		$this->renderBlock('scripts', get_defined_vars()) /* line 28 */;
		echo '
</body>
</html>
';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['flash' => '23'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		$this->createTemplate('components/form.latte', $this->params, "import")->render() /* line 6 */;
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block head} on line 18 */
	public function blockHead(array $ʟ_args): void
	{
		
	}


	/** {block scripts} on line 28 */
	public function blockScripts(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://nette.github.io/resources/js/3/netteForms.min.js"></script>

		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 32 */;
		echo '/js/jquery.js"></script>
		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 33 */;
		echo '/js/netteForms.js"></script>
		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 34 */;
		echo '/js/nette.ajax.js"></script> 
		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 35 */;
		echo '/js/main.js"></script>

		<script>

		</script>
';
	}

}
