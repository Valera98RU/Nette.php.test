<?php


namespace App\Forms;

use App\Model\MyAuthorization;
use Nette;
use Nette\Application\UI\Form;
use Nette\Security\User;


final class SignInFormFactory
{
	use Nette\SmartObject;

	private $factory;

	private $user;
	private $authorization;


	public function __construct(FormFactory $factory, User $user, MyAuthorization $authorization)
	{
		$this->factory = $factory;
		$this->user = $user;
		$this->authorization = $authorization;
	}


	public function create(callable $onSuccess): Form
	{
		$form = $this->factory->create();

		$form->addText('username', 'Username:')
			->setRequired('Please enter your username.');

		$form->addPassword('password', 'Password:')
			->setRequired('Please enter your password.');

		$form->addCheckbox('remember', 'Keep me signed in');

		$form->addSubmit('send', 'Sign in');

		$form->onSuccess[] = function (Form $form, \stdClass $values) use ($onSuccess): void {
			try {
				$this->user->setExpiration($values->remember ? '14 days' : '20 minutes');

				$this->user->login($values->username, $values->password);
			} catch (Nette\Security\AuthenticationException $e) {
				$form->addError('The username or password you entered is incorrect.');
				return;
			}
			$onSuccess();
		};

		return $form;
	}
}
