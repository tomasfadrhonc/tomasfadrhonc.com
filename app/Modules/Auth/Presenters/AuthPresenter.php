<?php

declare(strict_types=1);

namespace App\Modules\Auth\Presenters;

use Nette;


final class AuthPresenter extends Nette\Application\UI\Presenter
{
    private $database;
    public function __construct(Nette\Database\Connection $database)
    {
        $this->database = $this->database;
    }

    public function renderLogin(){

    }

    public function renderRegister(){

    }
}
