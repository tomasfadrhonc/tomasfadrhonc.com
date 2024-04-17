<?php

declare(strict_types=1);

namespace App\Modules\Admin\Presenters;

use Nette;


final class AdminPresenter extends Nette\Application\UI\Presenter
{
    private $database;
    public function __construct(Nette\Database\Connection $database)
    {
        $this->database = $this->database;
    }
}
