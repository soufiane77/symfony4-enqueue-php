<?php 

namespace App\Controller;

use App\Message\SmsNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\HandleTrait;

class DefaultController extends AbstractController
{
     /**
     *
     * @Route("/", name="home")
     */
    public function index(MessageBusInterface $bus, Request $request)
    {
        $envlope = $bus->dispatch(new SmsNotification($request->query->get('message', 'Hello Symfony 4')));
        return new Response('message envoyer');
    }


}