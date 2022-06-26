<?php

namespace App\controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class MailerController extends AbstractController
{
    #[Route('/emailBuyeur')]
    public function sendEmailBuyeur(MailerInterface $mailer, Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $email = (new TemplatedEmail())

            ->from('johanna.dezarnaud@orange.fr')
            ->to($data['user']['email'])
            ->subject('Votre commande VID\'Dev')
            ->htmlTemplate('mail/buyeur.html.twig')
            ->context([
                'order' => $data['order'],
                'user' => $data['user'],
                'article' => $data['article'],

            ]);

        $mailer->send($email);



        $mailer->send($email);

        return new Response(
            Response::HTTP_OK
        );;
    }


    #[Route('/emailSeller')]
    public function sendEmailSeller(MailerInterface $mailer, Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $email = (new TemplatedEmail())

            ->from('johanna.dezarnaud@orange.fr')
            ->to($data['user']['email'])
            ->subject('Un de vos articles vendu sur VID\'Dev')
            ->htmlTemplate('mail/seller.html.twig')
            ->context([
                'user' => $data['user'],
                'article' => $data['article'],
                'buyeur' => $data['buyeur'],
            ]);

        $mailer->send($email);



        $mailer->send($email);

        return new Response(
            Response::HTTP_OK
        );;
    }
}
