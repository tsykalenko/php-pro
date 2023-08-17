<?php

namespace App\Repositories\Categories\DTOs;

class CategoriesStoreDTO
{
    public function __construct(
        protected string $name,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }
}
