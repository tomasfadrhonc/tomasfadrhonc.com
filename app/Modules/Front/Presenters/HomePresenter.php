<?php

declare(strict_types=1);

namespace App\Modules\Front\Presenters;

use Nette;


final class HomePresenter extends Nette\Application\UI\Presenter
{
    private $database;
    public function __construct(Nette\Database\Connection $database)
    {
        $this->database = $this->database;
    }
}
