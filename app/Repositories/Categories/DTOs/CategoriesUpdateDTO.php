<?php

namespace App\Repositories\Categories\DTOs;

class CategoriesUpdateDTO
{

    public function __construct(
        protected int $id,
        protected string $name,
    ) {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
