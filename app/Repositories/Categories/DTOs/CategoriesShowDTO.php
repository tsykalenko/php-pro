<?php

namespace App\Repositories\Categories\DTOs;

class CategoriesShowDTO
{
    public function __construct(
        protected int $id,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }


}
