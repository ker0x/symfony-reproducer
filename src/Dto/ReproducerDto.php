<?php

declare(strict_types=1);

namespace App\Dto;

final class ReproducerDto
{
    public function __construct(
        public ?string $firstName = null,
        public ?string $lastName = null,
        public array $suits = []
    ) {
    }
}