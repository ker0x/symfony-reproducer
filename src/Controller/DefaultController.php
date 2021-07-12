<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'default')]
    public function index(Request $request): Response {
        $form = $this->buildForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('default');
        }

        return $this->renderForm('default/index.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/workaround', name: 'workaround')]
    public function workaround(Request $request): Response {
        $form = $this->buildForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($form->getData());
        }

        return $this->renderForm('default/workaround.html.twig', [
            'form' => $form,
        ]);
    }

    private function buildForm(): FormInterface
    {
        return $this->createFormBuilder()
            ->add('input', TextType::class, [
                'label' => 'Input 1',
                'data' => 'Simple input'
            ])
            ->add('input_with_form_attr_true', TextType::class, [
                'label' => 'Input 2',
                'form_attr' => true,
                'data' => 'Input with form_attr set to true',
                'help' => 'This field <strong>will not</strong> be submit because "form_attr" is set to "true"',
                'help_html' => true
            ])
            ->add('input_with_form_attr_defined', TextType::class, [
                'label' => 'Input 3',
                'form_attr' => 'formWorkaround',
                'data' => 'Input with form_attr defined',
                'help' => 'This field <strong>should</strong> be submit because "form_attr" has the proper form ID',
                'help_html' => true
            ])
            ->add('input_with_attr_form', TextType::class, [
                'label' => 'Input 4',
                'attr' => [
                    'form' => 'formWorkaround'
                ],
                'data' => 'Input with attr => form defined',
                'help' => 'This field <strong>will</strong> be submit because "form" attribute is set through "attr"',
                'help_html' => true
            ])
            ->getForm()
        ;
    }
}
