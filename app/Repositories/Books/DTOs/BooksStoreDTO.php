<?php

namespace App\Repositories\Books\DTOs;

use Carbon\Carbon;

class BooksStoreDTO
{
    public function __construct(
        protected string $name,
        protected int $year,
        protected string $lang,
        protected int $pages,
    ) {
    }


    public function getLang(): string
    {
        return $this->lang;
    }

    public function getPages(): int
    {
        return $this->pages;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getYear(): int
    {
        return $this->year;
    }

}
