<?php

declare(strict_types=1);

namespace App\Modules\Auth\Model;

use Nette;
use Nette\Security\SimpleIdentity;

class SimpleAuthenticator implements Nette\Security\Authenticator
{
    public function __construct(
        private Nette\Database\Explorer $database,
        private Nette\Security\Passwords $passwords,
    ) {
}

public function authenticate(string $email, string $password): SimpleIdentity
{
    $row = $this->database->table('users')
    ->where('email', $email)
    ->fetch();

    if (!$row) {
        throw new Nette\Security\AuthenticationException('User not found.');

    }

    if (!$this->passwords->verify($password, $row->password)) {
        throw new Nette\Security\AuthenticationException('Invalid password.');
    }

    return new SimpleIdentity(
        $row->id,
        $row->role, // nebo pole více rolí
        ['name' => $row->username],
    );
    }
}
