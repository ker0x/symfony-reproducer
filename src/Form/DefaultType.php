<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class DefaultType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('choice', ChoiceType::class, [
                'choices' => [
                    'Foo' => 'foo',
                    'Bar' => 'bar',
                    'Baz' => 'baz',
                ],
                'constraints' => new Assert\EqualTo('baz'),
            ])
            ->add('choice_checkbox', ChoiceType::class, [
                'choices' => [
                    'Foo' => 'foo',
                    'Bar' => 'bar',
                    'Baz' => 'baz',
                ],
                'expanded' => true,
                'multiple' => true,
                'constraints' => new Assert\EqualTo('baz'),
            ])
            ->add('choice_radio', ChoiceType::class, [
                'choices' => [
                    'Foo' => 'foo',
                    'Bar' => 'bar',
                    'Baz' => 'baz',
                ],
                'constraints' => new Assert\EqualTo('baz'),
                'expanded' => true,
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
