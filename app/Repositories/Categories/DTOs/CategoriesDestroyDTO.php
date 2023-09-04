<?php

namespace App\Repositories\Categories\DTOs;

class CategoriesDestroyDTO
{

    public function __construct(
        protected int $id,
    ) {
    }

    public
    function getId(): int
    {
        return $this->id;
    }
}
