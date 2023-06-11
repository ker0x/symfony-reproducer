<?php

namespace App\Controller;

use App\Dto\ReproducerDto;
use App\Form\ReproducerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReproducerController extends AbstractController
{
    #[Route('/', name: 'app_reproducer')]
    public function index(Request $request): Response
    {
        $dto = new ReproducerDto();

        $form = $this->createForm(ReproducerType::class, $dto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($form->getData());
        }

        return $this->render('reproducer/index.html.twig', [
            'form' => $form,
        ]);
    }
}
