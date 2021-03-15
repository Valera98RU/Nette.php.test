<?php
// source: C:\Users\valera\PhpstormProjects\test\Nette.php.test/config/common.neon
// source: C:\Users\valera\PhpstormProjects\test\Nette.php.test/config/local.neon
// source: array

/** @noinspection PhpParamsInspection,PhpMethodMayBeStaticInspection */

declare(strict_types=1);

class Container_82755180e9 extends Nette\DI\Container
{
	protected $tags = [
		'nette.inject' => [
			'application.1' => true,
			'application.2' => true,
			'application.3' => true,
			'application.4' => true,
			'application.5' => true,
			'application.6' => true,
		],
	];

	protected $types = ['container' => 'Nette\DI\Container'];

	protected $aliases = [
		'application' => 'application.application',
		'cacheStorage' => 'cache.storage',
		'database.default' => 'database.default.connection',
		'httpRequest' => 'http.request',
		'httpResponse' => 'http.response',
		'nette.database.default' => 'database.default',
		'nette.database.default.context' => 'database.default.context',
		'nette.httpRequestFactory' => 'http.requestFactory',
		'nette.latteFactory' => 'latte.latteFactory',
		'nette.mailer' => 'mail.mailer',
		'nette.presenterFactory' => 'application.presenterFactory',
		'nette.templateFactory' => 'latte.templateFactory',
		'nette.userStorage' => 'security.userStorage',
		'session' => 'session.session',
		'user' => 'security.user',
	];

	protected $wiring = [
		'Nette\DI\Container' => [['container']],
		'Nette\Application\Application' => [['application.application']],
		'Nette\Application\IPresenterFactory' => [['application.presenterFactory']],
		'Nette\Application\LinkGenerator' => [['application.linkGenerator']],
		'Nette\Caching\Storage' => [['cache.storage']],
		'Nette\Database\Connection' => [['database.default.connection']],
		'Nette\Database\IStructure' => [['database.default.structure']],
		'Nette\Database\Structure' => [['database.default.structure']],
		'Nette\Database\Conventions' => [['database.default.conventions']],
		'Nette\Database\Conventions\DiscoveredConventions' => [['database.default.conventions']],
		'Nette\Database\Explorer' => [['database.default.context']],
		'Nette\Http\RequestFactory' => [['http.requestFactory']],
		'Nette\Http\IRequest' => [['http.request']],
		'Nette\Http\Request' => [['http.request']],
		'Nette\Http\IResponse' => [['http.response']],
		'Nette\Http\Response' => [['http.response']],
		'Nette\Bridges\ApplicationLatte\LatteFactory' => [['latte.latteFactory']],
		'Nette\Application\UI\TemplateFactory' => [['latte.templateFactory']],
		'Nette\Mail\Mailer' => [['mail.mailer']],
		'Nette\Security\Passwords' => [['security.passwords']],
		'Nette\Security\UserStorage' => [['security.userStorage']],
		'Nette\Security\IUserStorage' => [['security.legacyUserStorage']],
		'Nette\Security\User' => [['security.user']],
		'Nette\Http\Session' => [['session.session']],
		'Tracy\ILogger' => [['tracy.logger']],
		'Tracy\BlueScreen' => [['tracy.blueScreen']],
		'Tracy\Bar' => [['tracy.bar']],
		'App\Model\UserManager' => [['01']],
		'App\Forms\FormFactory' => [['02']],
		'App\Forms\SignInFormFactory' => [['03']],
		'App\Forms\SignUpFormFactory' => [['04']],
		'Nette\Routing\RouteList' => [['05']],
		'Nette\Routing\Router' => [['05']],
		'ArrayAccess' => [2 => ['05', 'application.1', 'application.2', 'application.3', 'application.4']],
		'Countable' => [2 => ['05']],
		'IteratorAggregate' => [2 => ['05']],
		'Traversable' => [2 => ['05']],
		'Nette\Application\Routers\RouteList' => [['05']],
		'Nette\Application\UI\Presenter' => [2 => ['application.1', 'application.2', 'application.3', 'application.4']],
		'Nette\Application\UI\Control' => [2 => ['application.1', 'application.2', 'application.3', 'application.4']],
		'Nette\Application\UI\Component' => [2 => ['application.1', 'application.2', 'application.3', 'application.4']],
		'Nette\ComponentModel\Container' => [2 => ['application.1', 'application.2', 'application.3', 'application.4']],
		'Nette\ComponentModel\Component' => [2 => ['application.1', 'application.2', 'application.3', 'application.4']],
		'Nette\Application\IPresenter' => [
			2 => ['application.1', 'application.2', 'application.3', 'application.4', 'application.5', 'application.6'],
		],
		'Nette\Application\UI\StatePersistent' => [
			2 => ['application.1', 'application.2', 'application.3', 'application.4'],
		],
		'Nette\Application\UI\SignalReceiver' => [
			2 => ['application.1', 'application.2', 'application.3', 'application.4'],
		],
		'Nette\ComponentModel\IComponent' => [2 => ['application.1', 'application.2', 'application.3', 'application.4']],
		'Nette\ComponentModel\IContainer' => [2 => ['application.1', 'application.2', 'application.3', 'application.4']],
		'Nette\Application\UI\Renderable' => [2 => ['application.1', 'application.2', 'application.3', 'application.4']],
		'App\Presenters\EmployeePresenter' => [2 => ['application.1']],
		'App\Presenters\BasePresenter' => [2 => ['application.2', 'application.4']],
		'App\Presenters\Error4xxPresenter' => [2 => ['application.2']],
		'App\Presenters\HomepagePresenter' => [2 => ['application.3']],
		'App\Presenters\SignPresenter' => [2 => ['application.4']],
		'NetteModule\ErrorPresenter' => [2 => ['application.5']],
		'NetteModule\MicroPresenter' => [2 => ['application.6']],
		'Nette\Forms\FormFactory' => [['forms.factory']],
	];


	public function __construct(array $params = [])
	{
		parent::__construct($params);
		$this->parameters += [
			'appDir' => 'C:\Users\valera\PhpstormProjects\test\Nette.php.test\app',
			'wwwDir' => 'C:\Users\valera\PhpstormProjects\test\Nette.php.test\www',
			'vendorDir' => 'C:\Users\valera\PhpstormProjects\test\Nette.php.test\vendor',
			'debugMode' => true,
			'productionMode' => false,
			'consoleMode' => false,
			'tempDir' => 'C:\Users\valera\PhpstormProjects\test\Nette.php.test/temp',
		];
	}


	public function createService01(): App\Model\UserManager
	{
		return new App\Model\UserManager($this->getService('database.default.context'), $this->getService('security.passwords'));
	}


	public function createService02(): App\Forms\FormFactory
	{
		return new App\Forms\FormFactory;
	}


	public function createService03(): App\Forms\SignInFormFactory
	{
		return new App\Forms\SignInFormFactory($this->getService('02'), $this->getService('security.user'));
	}


	public function createService04(): App\Forms\SignUpFormFactory
	{
		return new App\Forms\SignUpFormFactory($this->getService('02'), $this->getService('01'));
	}


	public function createService05(): Nette\Application\Routers\RouteList
	{
		return App\Router\RouterFactory::createRouter();
	}


	public function createServiceApplication__1(): App\Presenters\EmployeePresenter
	{
		$service = new App\Presenters\EmployeePresenter($this->getService('database.default.context'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('05'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__2(): App\Presenters\Error4xxPresenter
	{
		$service = new App\Presenters\Error4xxPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('05'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__3(): App\Presenters\HomepagePresenter
	{
		$service = new App\Presenters\HomepagePresenter($this->getService('database.default.context'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('05'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__4(): App\Presenters\SignPresenter
	{
		$service = new App\Presenters\SignPresenter($this->getService('03'), $this->getService('04'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('05'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__5(): NetteModule\ErrorPresenter
	{
		return new NetteModule\ErrorPresenter($this->getService('tracy.logger'));
	}


	public function createServiceApplication__6(): NetteModule\MicroPresenter
	{
		return new NetteModule\MicroPresenter($this, $this->getService('http.request'), $this->getService('05'));
	}


	public function createServiceApplication__application(): Nette\Application\Application
	{
		$service = new Nette\Application\Application(
			$this->getService('application.presenterFactory'),
			$this->getService('05'),
			$this->getService('http.request'),
			$this->getService('http.response')
		);
		$service->catchExceptions = null;
		$service->errorPresenter = 'Error';
		Nette\Bridges\ApplicationDI\ApplicationExtension::initializeBlueScreenPanel(
			$this->getService('tracy.blueScreen'),
			$service
		);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\ApplicationTracy\RoutingPanel(
			$this->getService('05'),
			$this->getService('http.request'),
			$this->getService('application.presenterFactory')
		));
		return $service;
	}


	public function createServiceApplication__linkGenerator(): Nette\Application\LinkGenerator
	{
		return new Nette\Application\LinkGenerator(
			$this->getService('05'),
			$this->getService('http.request')->getUrl()->withoutUserInfo(),
			$this->getService('application.presenterFactory')
		);
	}


	public function createServiceApplication__presenterFactory(): Nette\Application\IPresenterFactory
	{
		$service = new Nette\Application\PresenterFactory(new Nette\Bridges\ApplicationDI\PresenterFactoryCallback(
			$this,
			5,
			'C:\Users\valera\PhpstormProjects\test\Nette.php.test/temp/cache/nette.application/touch'
		));
		$service->setMapping(['*' => 'App\*Module\Presenters\*Presenter']);
		return $service;
	}


	public function createServiceCache__storage(): Nette\Caching\Storage
	{
		return new Nette\Caching\Storages\FileStorage('C:\Users\valera\PhpstormProjects\test\Nette.php.test/temp/cache');
	}


	public function createServiceContainer(): Container_82755180e9
	{
		return $this;
	}


	public function createServiceDatabase__default__connection(): Nette\Database\Connection
	{
		$service = new Nette\Database\Connection('pgsql:host=127.0.0.1; dbname=test', 'postgres', 'admin', ['lazy' => true]);
		$this->getService('tracy.blueScreen')->addPanel(['Nette\Bridges\DatabaseTracy\ConnectionPanel', 'renderException']);
		Nette\Database\Helpers::createDebugPanel(
			$service,
			true,
			'default',
			$this->getService('tracy.bar'),
			$this->getService('tracy.blueScreen')
		);
		return $service;
	}


	public function createServiceDatabase__default__context(): Nette\Database\Explorer
	{
		return new Nette\Database\Explorer(
			$this->getService('database.default.connection'),
			$this->getService('database.default.structure'),
			$this->getService('database.default.conventions'),
			$this->getService('cache.storage')
		);
	}


	public function createServiceDatabase__default__conventions(): Nette\Database\Conventions\DiscoveredConventions
	{
		return new Nette\Database\Conventions\DiscoveredConventions($this->getService('database.default.structure'));
	}


	public function createServiceDatabase__default__structure(): Nette\Database\Structure
	{
		return new Nette\Database\Structure($this->getService('database.default.connection'), $this->getService('cache.storage'));
	}


	public function createServiceForms__factory(): Nette\Forms\FormFactory
	{
		return new Nette\Forms\FormFactory($this->getService('http.request'));
	}


	public function createServiceHttp__request(): Nette\Http\Request
	{
		return $this->getService('http.requestFactory')->fromGlobals();
	}


	public function createServiceHttp__requestFactory(): Nette\Http\RequestFactory
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy([]);
		return $service;
	}


	public function createServiceHttp__response(): Nette\Http\Response
	{
		$service = new Nette\Http\Response;
		$service->cookieSecure = $this->getService('http.request')->isSecured();
		return $service;
	}


	public function createServiceLatte__latteFactory(): Nette\Bridges\ApplicationLatte\LatteFactory
	{
		return new class ($this) implements Nette\Bridges\ApplicationLatte\LatteFactory {
			private $container;


			public function __construct(Container_82755180e9 $container)
			{
				$this->container = $container;
			}


			public function create(): Latte\Engine
			{
				$service = new Latte\Engine;
				$service->setTempDirectory('C:\Users\valera\PhpstormProjects\test\Nette.php.test/temp/cache/latte');
				$service->setAutoRefresh();
				$service->setContentType('html');
				Nette\Utils\Html::$xhtml = false;
				return $service;
			}
		};
	}


	public function createServiceLatte__templateFactory(): Nette\Application\UI\TemplateFactory
	{
		$service = new Nette\Bridges\ApplicationLatte\TemplateFactory(
			$this->getService('latte.latteFactory'),
			$this->getService('http.request'),
			$this->getService('security.user'),
			$this->getService('cache.storage')
		);
		Nette\Bridges\ApplicationDI\LatteExtension::initLattePanel($service, $this->getService('tracy.bar'));
		return $service;
	}


	public function createServiceMail__mailer(): Nette\Mail\Mailer
	{
		return new Nette\Mail\SendmailMailer;
	}


	public function createServiceSecurity__legacyUserStorage(): Nette\Security\IUserStorage
	{
		return new Nette\Http\UserStorage($this->getService('session.session'));
	}


	public function createServiceSecurity__passwords(): Nette\Security\Passwords
	{
		return new Nette\Security\Passwords;
	}


	public function createServiceSecurity__user(): Nette\Security\User
	{
		$service = new Nette\Security\User(
			$this->getService('security.legacyUserStorage'),
			null,
			null,
			$this->getService('security.userStorage')
		);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\SecurityTracy\UserPanel($service));
		return $service;
	}


	public function createServiceSecurity__userStorage(): Nette\Security\UserStorage
	{
		return new Nette\Bridges\SecurityHttp\SessionStorage($this->getService('session.session'));
	}


	public function createServiceSession__session(): Nette\Http\Session
	{
		$service = new Nette\Http\Session($this->getService('http.request'), $this->getService('http.response'));
		$service->setExpiration('14 days');
		$service->setOptions(['cookieSamesite' => 'Lax']);
		return $service;
	}


	public function createServiceTracy__bar(): Tracy\Bar
	{
		return Tracy\Debugger::getBar();
	}


	public function createServiceTracy__blueScreen(): Tracy\BlueScreen
	{
		return Tracy\Debugger::getBlueScreen();
	}


	public function createServiceTracy__logger(): Tracy\ILogger
	{
		return Tracy\Debugger::getLogger();
	}


	public function initialize()
	{
		// di.
		(function () {
			$this->getService('tracy.bar')->addPanel(new Nette\Bridges\DITracy\ContainerPanel($this));
		})();
		// http.
		(function () {
			$response = $this->getService('http.response');
			$response->setHeader('X-Powered-By', 'Nette Framework 3');
			$response->setHeader('Content-Type', 'text/html; charset=utf-8');
			$response->setHeader('X-Frame-Options', 'SAMEORIGIN');
			Nette\Http\Helpers::initCookie($this->getService('http.request'), $response);
		})();
		// session.
		(function () {
			$this->getService('session.session')->exists() && $this->getService('session.session')->start();
		})();
		// tracy.
		(function () {
			if (!Tracy\Debugger::isEnabled()) { return; }
			Tracy\Debugger::getLogger()->mailer = [new Tracy\Bridges\Nette\MailSender($this->getService('mail.mailer')), 'send'];
			$this->getService('session.session')->start();
			Tracy\Debugger::dispatch();
		})();
	}
}
