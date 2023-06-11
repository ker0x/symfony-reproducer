<?php

namespace App\Twig\Components;

use App\Dto\ReproducerDto;
use App\Form\ReproducerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent()]
final class ReproducerComponent extends AbstractController
{
    use DefaultActionTrait;
    use ComponentWithFormTrait;

    #[LiveProp(writable: true, useSerializerForHydration: true)]
    public ReproducerDto $dto;

    public function mount(ReproducerDto $dto = null): void
    {
        $this->dto = $dto ?? new ReproducerDto();
    }

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(ReproducerType::class, $this->dto);
    }
}
