<?php


namespace App\controller;

use Symfony\Component\Security\Core\Security;

class ProfilController
{

    public function __construct(private Security $security)
    {
    }

    public function __invoke()
    {
        $user = $this->security->getUser();
        return $user;
    }
}
