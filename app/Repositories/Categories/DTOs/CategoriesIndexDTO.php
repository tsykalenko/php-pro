<?php

namespace App\Repositories\Categories\DTOs;

class CategoriesIndexDTO
{
    public function __construct(

        protected string $name,
    ) {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
