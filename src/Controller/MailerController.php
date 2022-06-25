<?php

namespace App\controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class MailerController extends AbstractController
{
    #[Route('/email')]
    public function sendEmail(MailerInterface $mailer, Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $email = (new Email())
            ->from('johanna.dezarnaud@orange.fr')
            ->to($data['email'])
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for ' . $data['email'] . ' HTML integration!</p>');

        $mailer->send($email);

        return new Response(
            Response::HTTP_OK
        );;
    }
}
