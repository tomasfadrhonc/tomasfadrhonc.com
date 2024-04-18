<?php

declare(strict_types=1);

namespace App\Modules\Auth\Presenters;

use App\Modules\Auth\Model\SimpleAuthenticator;
use Nette;
use Nette\Application\UI\Form;

final class AuthPresenter extends Nette\Application\UI\Presenter
{
    private $database;
    private $auth;

    public function __construct(Nette\Database\Connection $database, SimpleAuthenticator $auth)
    {
        $this->database = $this->database;
        $this->auth = $auth;
    }

    public function renderLogin(){

    }

    public function createComponentLoginForm(): Form
    {
        $form = new Form();
        $form->addEmail("email", "Email");
        $form->addPassword("password", "Password");
        $form->addSubmit("signIn", "Sign in");
        $form->onSuccess[] = [$this, 'formLoginSucceeded'];

        return $form;
    }

    public function formLoginSucceeded(Form $form, $data): void
    {
        try {
            $this->user->login($data->email, $data->password);
            $this->flashMessage('Logged in!', 'success');
            $this->redirect(':Front:Home:default');
        } catch(Nette\Security\AuthenticationException $e) {
            $this->flashMessage($e->getMessage(), 'danger');
        }
    }

    public function renderRegister(){

    }
}
