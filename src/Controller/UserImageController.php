<?php


namespace App\Controller;

use App\Entity\User;
use RuntimeException;
use Symfony\Component\HttpFoundation\Request;

class UserImageController
{
    public function __invoke(Request $request)
    {
        $user = $request->attributes->get('data');
        if (!($user instanceof User)) {
            throw new RuntimeException('Utilisateur attendu');
        }
        $user->setFile($request->files->get('file'));
        $user->setUpdatedAt(new \DateTime());
        return $user;
    }
}
