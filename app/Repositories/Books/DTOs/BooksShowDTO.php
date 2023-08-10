<?php

namespace App\Repositories\Books\DTOs;

class BooksShowDTO
{
    public function __construct(
        protected int $id,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
