<?php

namespace App\Controller;

use App\Form\DefaultType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(DefaultType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('app_default');
        }

        return $this->render('default/index.html.twig', [
            'form' => $form,
        ]);
    }
}
